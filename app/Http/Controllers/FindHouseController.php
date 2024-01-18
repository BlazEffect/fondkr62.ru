<?php

namespace App\Http\Controllers;

use App\Helpers\HouseHelper;
use App\Models\Act;
use App\Models\ContractsElementsHouse;
use App\Models\DocumentsWriteOff;
use App\Models\ElementsHouse;
use App\Models\House;
use App\Models\Lot;
use App\Models\Offer;
use App\Models\RepairReturn;
use App\Models\Street;
use Illuminate\Support\Facades\DB;

class FindHouseController extends Controller
{

    public function index()
    {
        $this->vars['arrMunicipalities'] = HouseHelper::getMunicipalities();

        $this->vars['countHouseOnShetRegionOperator'] = 0;
        $this->vars['countCommonAreaMKD'] = 0;
        $this->vars['countHouseOnSpecShetOwnerRegionOperator'] = 0;
        $this->countHouseTypeFormingFond();

        return view('pages.find-house', $this->vars);
    }

    public function getStreets($codeMunicipality)
    {
        $streets = Street::all(['Id', 'Pid', 'Type', 'Name', 'DopNumber'])
            ->sortBy('Id')
            ->keyBy('Id')
            ->toArray();

        $houses = House::all()
            ->sortBy('IdStreet')
            ->toArray();

        $arrNavigation = array();

        foreach ($houses as $house) {
            $arrNavigation = $this->recursiveSearchParent($streets, $house['IdStreet'], $house, $arrNavigation);
        }

        $this->vars['codeMunicipality'] = $codeMunicipality;

        foreach ($arrNavigation as $key => $item) {
            usort($arrNavigation[$key], [$this::class, 'filtrStreets']);
        }

        $municipalities = HouseHelper::getMunicipalities();

        return [
            'id' => $municipalities[$codeMunicipality]['Id'],
            'streets_and_houses' => $arrNavigation
        ];
    }

    public function getHouse($codeHouse)
    {
        $codeHouse -= 909132453675;

        $house = House::query()
            ->where('houses.CodeHouse', $codeHouse)
            ->leftJoin('debit_and_credit', 'debit_and_credit.CodeHouse', '=', 'houses.CodeHouse')
            ->select([
                'houses.CodeHouse',
                'Region',
                'OfficialAddress',
                'TypeFormationFund',
                'YearStartExploitation',
                'Area',
                'RegionalProgram',
                'Order965',
                'debit_and_credit.Debit',
                'debit_and_credit.Credit'
            ])
            ->first();

        $offers = Offer::query()
            ->where('CodeHouse', $codeHouse)
            ->get();

        $arrElementsHouse = ElementsHouse::query()
            ->select([
                'Oid as OidElementHouse',
                'Name as NameElementHouse',
                'TypeRepairs',
                'Period as PeriodRepairs',
                'TermRealization',
                'YearWorks',
                'Update as UpdateEH',
                'NoteForSite as NoteForSiteEH'
            ])
            ->where('CodeHouse', $codeHouse)
            ->where('Update', 'not like', 'исключен%')
            ->whereNot('Update', '')
            ->orderBy('Period')
            ->orderBy('Name')
            ->orderBy('YearWorks')
            ->get()
            ->toArray();

        $LEH = $this->ArrWorksByHouse($codeHouse);
        $arrEHJoinLEH = [];

        foreach($arrElementsHouse as $eh)
        {
            ///-Добавляем элемент, по которому нет данных (единоразово)
            if(!array_key_exists($eh["OidElementHouse"], $arrEHJoinLEH))
                $arrEHJoinLEH[$eh["OidElementHouse"]][] = $eh;
            ///-Перебираем данные по работам Lots Elements House
            foreach($LEH as $len)
            {
                ///-Отбираем конструктивные элементы по Oid
                if($eh["OidElementHouse"] == $len["OidElementHouse"])
                {
                    ///-В итогов массив добавляем данные
                    $arrEHJoinLEH[$eh["OidElementHouse"]][] = $len;
                }
            }
        }
        ///-Создаем массив с результатом
        $structuralElements = array();
        ///-Перебираем список соединенных конструктивных элемнетов
        foreach($arrEHJoinLEH as $item)
        {
            $i = $item[0];
            ///-Проверяем, содержит ли строка несколько подстрок данных
            if(Count($item) > 1)
            {
                ///-Объединяем все подстроки в строку
                foreach($item as $v)
                {
                    ///-По типу отбираем только монтажные работы,
                    ///-И если есть проет то говорил что работа началась
                    ///-Создавая дополнительный ключ $i["Project"]
                    switch($v["TypeWork"])
                    {
                        case "Монтажные работы": $i = $v; break;
                        case "Проектная документация": $i["Project"] = true; break;
                    }
                }
            }
            ///-Создаем и заполняем полями вывода массив строки данных
            $arr = array();
            $arr["NameElementHouse"] = $i["NameElementHouse"];
            $arr["TypeRepairs"] = $i["TypeRepairs"];
            $arr["PeriodRepairs"] = $i["PeriodRepairs"];
            $arr["TermRealization"] = str_replace("КП", "Краткосрочный план", $i["TermRealization"]);
            $arr["YearWorks"] = $i["YearWorks"];
            $arr["UpdateEH"] = $i["UpdateEH"];
            $arr["NoteForSiteEH"] = $i["NoteForSiteEH"];
            $arr["DateStartCEH"] = (!isset($i["DateStartCEH"])) ? "" : date ("d.m.Y", strtotime($i["DateStartCEH"]));
            $arr["PeriodExecutionContract"] = (!isset($i["PeriodExecutionContract"])) ? "" : date ("d.m.Y", strtotime($i["PeriodExecutionContract"]));
            $arr["NameContractor"] = (!isset($i["NameContractor"])) ? "" : $i["NameContractor"];
            $arr["StatusWork"] = "";
            if($i["IdSelection"] < 144)
            {
                $arr["UrlSelection"] = "/team/selection/".$i["IdSelection"];
                $arr["TitleSelection"] = "По итогам отбора № ".$i["IdSelection"]." (лот № ".$i["IdLot"].")";
            }
            else
            {
                $arr["UrlSelection"] = "https://223.rts-tender.ru/supplier/auction/Trade/View.aspx?Id=".$i["Url"]."#BaseMainContent_MainContent_documentPanel";
                $arr["TitleSelection"] = "По итогам аукциона № ".$i["IdContract"];
            }
            if(!empty($i["DateAct"]) & $i["StatusContract"] == "Заключен")
            {
                $arr["StatusWork"] = "Работы выполнены";
                $arr["PeriodExecutionContract"] = date ("d.m.Y", strtotime($i["DateAct"]));
            }
            else if(empty($i["DateAct"]) & $i["StatusContract"] == "Заключен")
            {
                if ($i["DateStartCEH"] != '')
                    $arr["StatusWork"] = "Работы ведутся";
                else
                    $arr["StatusWork"] = "Работы запланированы";

            }
            else if(array_key_exists("Project", $i))
                $arr["StatusWork"] = "Отбор состоялся";
            ///-Записываем массив строки данных в возвращаемый массив строк
            $structuralElements[] = $arr;
        }

        $arrCosts = array();
        $html = '';
        if ($house["TypeFormationFund"] != "на счете регионального оператора") {
            foreach($arrEHJoinLEH as $item)
            {
                ///-Перебираем список работ по конструктивному элементу
                foreach($item as $i)
                {
                    if(array_key_exists("SumAct", $i) && $i["SumAct"] != 0)
                    {
                        $htmlCosts = "<tr>";
                        $htmlCosts .= "<td>".$i["NameElementHouse"]." ";
                        if(!empty($i["TypeRepairs"]))
                            $htmlCosts .= (strpos($i["TypeRepairs"], "Ремонт") === false) ? "(".$i["TypeRepairs"].")" : "(Кап. ремонт)";
                        $htmlCosts .= "</td>";
                        $htmlCosts .= "<td>";
                        $htmlCosts .= ($i["TypeWork"] == "Монтажные работы") ? "Строительно-монтажные работы" : $i["TypeWork"];
                        $htmlCosts .= "</td>";
                        $htmlCosts .= "<td>".$this->sum($i["SumAct"])."</td>";
                        $htmlCosts .= "<td>";
                        $urlSelection = "/team/selection/".$i["IdSelection"];
                        $titleSelection = "По итогам отбора № ".$i["IdSelection"]." (лот № ".$i["IdLot"].")";
                        if($i["IdSelection"] >= 144)
                        {
                            $urlSelection = "https://223.rts-tender.ru/supplier/auction/Trade/View.aspx?Id=".$i["Url"]."#BaseMainContent_MainContent_documentPanel";
                            $titleSelection = "По итогам аукциона № ".$i["IdContract"];
                        }
                        $htmlCosts .= "<a href=\"$urlSelection\" title=\"$titleSelection\" target=\"_blank\">";
                        $htmlCosts .= $i["NameContractor"];
                        $htmlCosts .= "</a>";
                        $htmlCosts .= "</td>";
                        $htmlCosts .= "</tr>";
                        switch($i["TypeWork"])
                        {
                            case "Оценка соответствия отработавших нормативный срок службы лифтовое оборудование": $sort = "1"; break;
                            case "Проектная документация": $sort = "2"; break;
                            case "Монтажные работы": $sort = "3"; break;
                            case "Строительный контроль": $sort = "4"; break;
                            default: $sort = "5"; break;
                        }
                        $arrCosts[$i["OidElementHouse"].$i["NameElementHouse"].$i["TypeRepairs"].$i["NameContractor"].$i["SumAct"].$sort] = $htmlCosts;
                        ///-Считаем общюю сумму актов выполненных работ по МКД
                        $sumActs = $sumActs + $i["SumAct"];
                    }
                }
            }
            ///-Начисления/Поступления
            if(($house["Credit"] != "" & $house["Debit"] != "" & $house["TypeFormationFund"] == 'на счете регионального оператора') && $house["Debit"] > 0)	{
                $ss = array(
                    '621200151' => 958431,
                    '621200152' => 1435140,
                    '622700135' => 1132968.76,
                    '622600407' => 95270,
                    '622600406' => 221000,
                    '621200154' => 314722.55,
                    '622600087' => 416117,
                    '622600404' => 1643298,
                    '622600392' => 14086,
                    '622600393' => 517369,
                    '622602085' => 54235,
                    '622600509' => 7182572.73,
                    '622600521' => 2366143.8,
                    '622601256' => 347354.2,
                    '622600536' => 210032);

                $html .= "<br/>";
                $html .= "<h3>Средства на капитальный ремонт**</h3>";
                $html .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"money_grid\">";
                $html .= "<tr>";
                $html .= "<th>Операция</th>";
                $html .= "<th>Сумма (руб.)</th>";
                $html .= "</tr>";
                $html .= "<tr>";
                $html .= "<td>Начислено</td>";
                $html .= "<td><strong>".$this->sum($house["Debit"])."</strong></td>";
                $html .= "</tr>";
                $html .= "<tr>";
                $html .= "<td>Оплачено</td>";
                $html .= "<td><strong>".$this->sum($house["Credit"] + $ss[$house["CodeHouse"]])."</strong></td>";
                $html .= "</tr>";
                $html .= "<tr class=\"percent_tr\">";
                $html .= "<td>Процент собираемости</td>";
                $html .= "<td><strong>".$this->sum(round((doubleval($house["Credit"] + $ss[$house["CodeHouse"]]) * 100) / doubleval($house["Debit"]), 2))."%</strong></td>";
                $html .= "</tr>";
                if(isset($sumActs) && !empty($sumActs))
                {
                    $html .= "<tr>";
                    $html .= "<td>Выполнено работ на сумму</td>";
                    $html .= "<td><strong>".$this->sum($sumActs)."</strong></td>";
                    $html .= "</tr>";
                }
                $html .= "</table>";
            }
            ///-Сортируем массив данных
            ksort($arrCosts);
            ///-Если имеется развернутая информация о расходах
            if(Count($arrCosts) != 0)
            {
                $html .= "<br/>";
                $html .= "<h3>Выполненные работы</h3>";
                $html .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">";
                $html .= "<tr>";
                $html .= "<th>Конструктивный элемент</th>";
                $html .= "<th>Тип работы</th>";
                $html .= "<th>Сумма (руб.)</th>";
                $html .= "<th>Подрядчик</th>";
                $html .= "</tr>";
                $html .= implode(" ", $arrCosts);
                $html .= "</table>";
            }
        }

        return [
            'area' => $this->sum($house->Area),
            'house' => $house,
            'offers' => $offers,
            'structuralElements' => $structuralElements,
            'html' => $html
        ];
    }

    private function getLotsByElementsHouse()
    {
        return Lot::query()
            ->select(
                'lots.Oid as OidLot',
                'lots.IdSelection',
                'lots.Id as IdLot',
                'lots.TypeWork',
                'lots.ResultSelectionByLot',
                'selections_lots.Winner',
                'selections_lots.StatusSelection',
                'selections.DatePublic',
                'selections.DateOpening',
                'selections.DateEnd',
                'selections.OnlyContractor',
                'selections.Url',
                'contracts.Id as IdContract',
                'contracts.NameContractor',
                'contracts.DateSigningContract',
                'contracts.PeriodExecutionContract',
                'contracts.StatusContract',
                'elements_house.Oid as OidElementHouse',
                'elements_house.CodeHouse',
                'elements_house.Name as NameElementHouse',
                'elements_house.TypeRepairs',
                'elements_house.Period as PeriodRepairs',
                'elements_house.TermRealization',
                'elements_house.YearWorks',
                'elements_house.Update as UpdateEH',
                'elements_house.NoteForSite as NoteForSiteEH',
                'houses.Region',
                'houses.OfficialAddress'
            )
            ->leftJoin('selections_lots', 'lots.IdSelection', '=', 'selections_lots.IdSelection')
            ->leftJoin('selections', function ($join) {
                $join->on(DB::raw("split_part(\"lots\".\"Link\", '/O:', 2)"), '=', 'selections.Oid');
            })
            ->leftJoin('contracts', function ($join) {
                $join->on('lots.Oid', '=', DB::raw("split_part(\"contracts\".\"Link\", '/O:', 2)"));
            })
            ->leftJoin('lots_elements_house', 'lots.Oid', '=', 'lots_elements_house.OidLot')
            ->leftJoin('elements_house', function ($join) {
                $join->on(DB::raw("split_part(\"lots_elements_house\".\"Link\", '/O:', 2)"), '=', 'elements_house.Oid');
            })
            ->leftJoin('houses', 'elements_house.CodeHouse', '=', 'houses.CodeHouse')
            ->orderByRaw("\"houses\".\"Region\" || ', ' || \"houses\".\"OfficialAddress\"")
            ->get()
            ->toArray();
    }
    ///-Метод получения данных о контрактах по кэ
    private function getContractByElementsHouse()
    {
        $ceh = ContractsElementsHouse::query()
            ->select([
                'IdContract',
                'OidElementHouse',
                'Sum as SumCEH',
                'DateStart as DateStartCEH',
                'DateEnd as DateEndCEH',
                'TermPayment as TermPaymentCEH'
            ])
            ->get()
            ->toArray();

        $arr = array();
        //-Собираем уникальный список договоров по кэ
        for($i = 0; $i < Count($ceh); $i++)
        {
            $key = $ceh[$i]["IdContract"]."_".$ceh[$i]["OidElementHouse"];
            if(!array_key_exists($key, $arr))
                $arr[$key] = $ceh[$i];
            else
            {
                //-складываем суммы
                $ceh[$i]["SumCEH"] = $ceh[$i]["SumCEH"] + $arr[$key]["SumCEH"];
                $arr[$key] = $ceh[$i];
            }
        }
        return $arr;
    }
    ///-Метод получения данных об актах
    private function getActs()
    {
        $acts = Act::query()
            ->select([
                'IdContract',
                'Sum as SumAct',
                'CodeHouse',
                'Date as DateAct',
                'NameElementHouse',
                'Conducted as ConductedAct'
            ])
            ->get()
            ->toArray();

        return $this->mergeRowsAndCheckConducted($acts, "Act");
    }
    ///-Метод получения данных об документах списания
    private function getDocumentsWriteOff()
    {
        $docs = DocumentsWriteOff::query()
            ->select([
                'IdContract',
                'Sum as SumDWO',
                'CodeHouse',
                'NameElementHouse',
                'Conducted as ConductedDWO',
                'DateWriteOff as DateDWO'
            ])
            ->get()
            ->toArray();

        return $this->mergeRowsAndCheckConducted($docs, "DWO");
    }
    ///-Метод получения данных о возвратах
    private function getRepairReturn()
    {
        $repairReturn = RepairReturn::query()
            ->select([
                'IdContract',
                'Sum as SumRR',
                'CodeHouse',
                'NameElementHouse',
                'Conducted as ConductedRR',
                'DateReturn as DateRR'
            ])
            ->get()
            ->toArray();

        return $this->mergeRowsAndCheckConducted($repairReturn, "RR");
    }

    private function mergeRowsAndCheckConducted($data, $param)
    {
        $arr = array();
        $conducted = "Conducted".$param;
        $sum = "Sum".$param;
        $date = "Date".$param;
        //-Собираем уникальный список договоров по кэ
        for($i = 0; $i < Count($data); $i++)
        {
            //-Создаем ключ для актов
            $key = $data[$i]["CodeHouse"]."_".$data[$i]["NameElementHouse"]."_".$data[$i]["IdContract"];
            //-Отбираем из всего списка актов только проведенные акты
            if($data[$i][$conducted] =="t")
            {
                if(!array_key_exists($key, $arr))
                    $arr[$key] = $data[$i];
                else
                {
                    //-складываем суммы
                    $data[$i][$sum] = $arr[$key][$sum] + $data[$i][$sum];
                    //-Заменяем дату акта на большую
                    $data[$i][$date] = (strtotime($arr[$key][$date]) < strtotime($data[$i][$date])) ? $data[$i][$date] : $arr[$key][$date];
                    $arr[$key] = $data[$i];
                }
            }
        }
        return $arr;
    }

    private function joinAllTables($leh, $ceh, $act, $dwo, $rr)
    {
        $arr = array();
        for($i = 0; $i < Count($leh); $i++)
        {
            ///-Добавляем Договора по КЭ
            $keyCEH = $leh[$i]["IdContract"]."_".$leh[$i]["OidElementHouse"];
            $arrDefaultCEH = array("SumCEH" => 0.00, "DateStartCEH" => null, "DateEndCEH" => null, "TermPaymentCEH" => null);
            $arrWithCEH [] = array_merge($leh[$i], array_key_exists($keyCEH, $ceh) ? $ceh[$keyCEH] : $arrDefaultCEH);
            ///-Создаем общий ключ для Актов Документов списания и Возвратов
            $key = $leh[$i]["CodeHouse"]."_".$leh[$i]["NameElementHouse"]."_".$leh[$i]["IdContract"];
            ///-Добавляем Акты
            $arrWithACT [] = array_merge($arrWithCEH[$i], array_key_exists($key, $act) ? $act[$key] : array("SumAct" => 0.00, "ConductedAct" => null, "DateAct" => null));
            ///-Добавляем документы списания
            $arrWithDWO [] = array_merge($arrWithACT[$i], array_key_exists($key, $dwo) ? $dwo[$key] : array("SumDWO" => 0.00, "ConductedDWO" => null, "DateDWO" => null));
            ///-Добавляем возвраты
            $arr [] = array_merge($arrWithDWO[$i], array_key_exists($key, $rr) ? $rr[$key] : array("SumRR" => 0.00, "ConductedRR" => null, "DateRR" => null));
        }
        return $arr;
    }

    private function getAllTables()
    {
        $LEH = $this->getLotsByElementsHouse();
        $CEH = $this->getContractByElementsHouse();
        $ACT = $this->getActs();
        $DWO = $this->getDocumentsWriteOff();
        $RR = $this->getRepairReturn();
        //-Соединяем таблицы воедино
        return $this->joinAllTables($LEH, $CEH, $ACT, $DWO, $RR);
    }

    private function ArrWorksByHouse($codeHouse)
    {
        $arr = array();

        $allTables = $this->getAllTables();

        foreach($allTables as $i)
        {
            //-Отбираем список по коду дома и статусу отбора
            if($i["CodeHouse"] == $codeHouse && ($i["StatusContract"] == "Заключен" | $i["StatusContract"] == "Отбор состоялся") && ($i["SumCEH"] != 0))
                $arr[] = $i;
        }
        return $arr;
    }

    private function recursiveSearchParent($arrStreets, $id, $house, $arrWork = array())
    {
        $street = $arrStreets[$id];

        $arrWork[$street['Pid']][$street['Id']] = $street;
        if ($id == $house['IdStreet'])
            $arrWork[$house['IdStreet']][$house['CodeHouse']] = $house;

        if ($street['Pid'] == 0)
            return $arrWork;

        return $this->recursiveSearchParent($arrStreets, $street['Pid'], $house, $arrWork);
    }

    private function countHouseTypeFormingFond()
    {
        $houses = House::query()
            ->select('TypeFormationFund', 'Area', 'RegionalProgram')
            ->get();

        foreach ($houses as $house) {
            if ($house->RegionalProgram === null) {
                if ($house->TypeFormationFund === 'на счете регионального оператора') {
                    $this->vars['countHouseOnShetRegionOperator']++;
                    $this->vars['countCommonAreaMKD'] += $house->Area;
                } elseif ($house->TypeFormationFund === 'на специальном счете регионального оператора') {
                    $this->vars['countHouseOnSpecShetOwnerRegionOperator']++;
                }
            }
        }

        $this->vars['countCommonAreaMKD'] = $this->sum($this->vars['countCommonAreaMKD']);
    }

    private function sum($string): string
    {
        $local = str_replace(",", ".", $string);
        $pub_kop = explode(".", $local);
        $pub = "";
        for ($i = 0; $i < (count($pub_kop) - 1); $i++)
            $pub .= $pub_kop[$i];
        if ($pub == "")
            $pub = $pub_kop[0];
        $pub = explode("|", number_format($pub, 2, '|', ' '));
        if (count($pub_kop) > 1) {
            $kop = end($pub_kop);
            $kop = (strlen($kop) == 0) ? "00" : ((strlen($kop) == 1) ? $kop . "0" : $kop);
        } else
            $kop = "00";
        if (strlen($kop) > 2)
            $kop = $kop[0] . $kop[1];
        return $pub[0] . "," . $kop;
    }

    private function filtrStreets($a, $b)
    {
        $municipalities = HouseHelper::getMunicipalities();

        $typeA = $a['Type'] ?? '';
        $typeB = $b['Type'] ?? '';

        $typeComparison = strcmp($typeA, $typeB);

        if (
            isset($municipalities[$this->vars['codeMunicipality']]['Type']) &&
            $municipalities[$this->vars['codeMunicipality']]['Type'] !== "G"
        ) {
            return $typeComparison ?:
                strcmp($a['Name'] ?? '', $b['Name'] ?? '') ?:
                    ($a['DopNumber'] ?? '') <=> ($b['DopNumber'] ?? '') ?:
                        ($a['NumberHouse'] ?? '') <=> ($b['NumberHouse'] ?? '') ?:
                            strcmp($a['Litera'] ?? '', $b['Litera'] ?? '') ?:
                                strcmp($a['KorpType'] ?? '', $b['KorpType'] ?? '') ?:
                                    ($a['NumKorp'] ?? '') <=> ($b['NumKorp'] ?? '');
        } else {
            return strcmp($a['Name'] ?? '', $b['Name'] ?? '') ?:
                ($a['DopNumber'] ?? '') <=> ($b['DopNumber'] ?? '') ?:
                    ($a['NumberHouse'] ?? '') <=> ($b['NumberHouse'] ?? '') ?:
                        strcmp($a['Litera'] ?? '', $b['Litera'] ?? '') ?:
                            strcmp($a['KorpType'] ?? '', $b['KorpType'] ?? '') ?:
                                ($a['NumKorp'] ?? '') <=> ($b['NumKorp'] ?? '');
        }
    }
}
