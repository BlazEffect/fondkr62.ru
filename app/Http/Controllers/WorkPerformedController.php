<?php

namespace App\Http\Controllers;

use App\Models\Act;
use App\Models\ContractsElementsHouse;
use App\Models\DocumentsWriteOff;
use App\Models\ElementsHouse;
use App\Models\Lot;
use App\Models\RepairReturn;
use Illuminate\Support\Facades\DB;

class WorkPerformedController extends Controller
{
    public function index()
    {
        $sh = 909132453675;
        //-Поля суммирования
        $CountHouses = array();
        $CountWorks = 0;
        $CountDoneWork = 0;
        //-Добавляем JS/NOSCRIPT
        $js = "<script type=\"text/javascript\">";
        //-Собираем "wpBaseArr"
        $wpitem = array();

        $allTables = $this->getAllTables();

        foreach($allTables as $i)
        {
            if($i["TypeWork"]=="Монтажные работы" & $i["StatusContract"]=="Заключен" & $i["SumCEH"] != 0)
            {
                $code = $i["CodeHouse"] + 909132453675;
                $podrjdchik = ($i["NameContractor"] != "") ? $i["NameContractor"] : $i["Winner"];
                $wp = "['$code','$i[OidElementHouse]','','','$i[NameElementHouse]','$i[TypeRepairs]','$podrjdchik',";
                $wp .= "'$i[IdSelection]','$i[IdLot]','$i[Url]','$i[IdContract]',";
                $wp .= "'".$this->date($i["DateStartCEH"])."',";
                $wp .= "'".$this->date($i["PeriodExecutionContract"])."',";
                $wp .= "'".$this->date($i["DateAct"])."',";
                $wp .= "'".$this->sum($i["SumAct"])."']";
                array_push($wpitem, $wp);
            }
        }
        //-Собираем "keArr"
        $keitem = array();

        $elementsHouses = $this->getElementsHouses();

        foreach($elementsHouses as $i)
            array_push($keitem, "['".$i["Oid"]."','".$i["TermRealization"]."','".$i["YearWorks"]."']");
        //-Добавляем js array в html
        $js .= "var wpBaseArr = [";
        $js .= implode(",\n", $wpitem);
        $js .= "];\n";
        $js .= "var keArr = [";
        $js .= implode(",\n", $keitem);
        $js .= "];";
        $js .= "</script>";
        //-Формируем html code
        $table = "<table class=\"report_table\">";
        $table .= "<tr>";
        $table .= "<th>Адрес МКД</th>";
        $table .= "<th>Конструктивный элемент</th>";
        $table .= "<th>Подрядная организация</th>";
        $table .= "<th>Начало работ</th>";
        $table .= "<th>Срок исполнения контракта</th>";
        $table .= "<th>Дата подписания <nobr>акта вып. работ</nobr><br>(КС-2)</th>";
        $table .= "</tr>";
        //-Динамическая генерация строк и столбцов
        foreach($allTables as $i)
        {
            ///-Отбираем только монтажные работы со статусок договора заключе и суммой не равной 0
            if($i["TypeWork"]=="Монтажные работы" & $i["StatusContract"]=="Заключен" & $i["SumCEH"] != 0)
            {
                $table .= "<tr>";
                $table .= "<td style=\"font-size: 0.9em\">";
                $table .= "<a id=\"".($i["CodeHouse"] + $sh)."\" href=\"/base/house/".($i["CodeHouse"] + $sh)."\">";
                $table .= $i["Region"].", ".$i["OfficialAddress"];
                $table .= "</a>";
                $table .="</td>";
                $table .="<td>".$i["NameElementHouse"]."</td>";
                $table .="<td>";
                $table .="<a target=\"_blank\" title=\"По итогам ";
                //-свыше 144 отбора ссылка на RTS TENDER
                if($i["IdSelection"] < 144)
                    $table .= "Отбора № ".$i["IdSelection"]." (лот № ".$i["IdLot"].")\" href=\"/team/selection/".$i["IdSelection"]."\">";
                else
                    $table .= "Аукциона № ".$i["IdContract"]."\" href=\"https://223.rts-tender.ru/supplier/auction/Trade/View.aspx?Id=".$i["Url"]."#BaseMainContent_MainContent_documentPanel\">";
                $table .= ($i["NameContractor"] != "") ? $i["NameContractor"] : $i["Winner"];
                $table .="</a>";
                $table .="</td>";
                $table .="<td>".$this->dateFormat($i["DateStartCEH"])."</td>";
                $table .="<td>".$this->dateFormat($i["DateEndCEH"])."</td>";
                $table .="<td>".$this->dateFormat($i["DateAct"])."</td>";
                $table .= "</tr>";
                //-Суммируем колличество работ в уникальных домах
                if(!array_key_exists($i["CodeHouse"], $CountHouses))
                    $CountHouses[$i["CodeHouse"]] = $i["CodeHouse"];
                $CountWorks++;
                if(!empty($i["DateAct"]))
                    $CountDoneWork++;
            }
        }

        //$html .= 'Раздел на техническом обслуживании. Скоро он заработает вновь. Благодарим вас за терпение.';

        $table .= "</table>";
        $table .= "<br><br>";
        //-Создаем информационный контент
        $info = "В данном списке приведено ".$CountWorks." работ в ".Count($CountHouses)." многоквартирных домах:<br>- ";
        $info .= "<span id=\"doneWorks\">".$CountDoneWork." работ – выполнено;</span><br>- ".($CountWorks - $CountDoneWork)." – в процессе выполнения.<br><br>";
        //-Возвращаем результат html кода
        $html = $js;
        $html .=  "<noscript>";
        $html .= "<div>";
        $html .= "<div class=\"wpWarning\">Чтобы просматривать фильтруемый список, Вам необходимо активировать <b>JavaScript</b> в своем браузере.</div>";
        $html .= $info;
        $html .= "</div>";
        $html .= "</noscript>";
        $html .= "<div id=\"wp_top_preloader\"><img src=\"/pages/fondkr62/img/preloader.gif\" /></div>";
        $html .= "<div id=\"wp_top_wrap\">";
        $html .= "<div id=\"wp_stat_total\" class=\"wp_stat\"></div>";
        $html .= "<div id=\"wpTab\" class=\"tgl_content tgс_shown\">";
        $html .= "<h3>Форма поиска</h3>";
        $html .= "<div id=\"wt_year_block\" class=\"wt_block\"><label for=\"wt_year\">Год по краткосрочным планам: </label><select name=\"wt_year\" id=\"wt_year\"></select></div>";
        $html .= "<div id=\"wt_mo_block\" class=\"wt_block\"><label for=\"wt_mo\">Муниципальное образование: </label><select name=\"wt_mo\" id=\"wt_mo\"></select></div>";
        $html .= "<div id=\"wt_ke_block\" class=\"wt_block\"><label for=\"wt_ke\">Конструктивный элемент: </label><select name=\"wt_ke\" id=\"wt_ke\"></select></div>";
        $html .= "<div id=\"wt_stage_block\" class=\"wt_block\"><label for=\"wt_stage\">Стадия: </label><select name=\"wt_stage\" id=\"wt_stage\"></select></div>";
        $html .= "</div>";
        $html .= "</div>";
        $html .= "<div id=\"wp_stat_year\" class=\"wp_stat\"></div>";
        $html .="<div id=\"wp_result\">";
        $html .="<noscript>";
        $html .= $table;
        $html .="</noscript>";
        $html .="</div>";
        $html .= "<div id=\"wp_stat_total_low\" class=\"wp_stat\"></div>";
        $html .= "<noscript>";
        $html .= $info;
        $html .= "</noscript>";

        $this->vars["html"] = $html;

        return view('pages.major-repairs.work-performed', $this->vars);
    }

    private function getElementsHouses()
    {
        return ElementsHouse::query()
            ->select([
                'Oid',
                'TermRealization',
                'YearWorks'
            ])
            ->where('TermRealization', '!=', '')
            ->get();
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

    private function dateFormat($date)
    {
        if($date == null || $date == '')
            return "";
        return date("d.m.Y", strtotime($date));
    }

    public function sum($string)
    {
        $local = str_replace(",", ".", $string);
        $pub_kop = explode(".",$local);
        $pub = "";
        for($i = 0; $i < (Count($pub_kop)-1); $i++)
            $pub .= $pub_kop[$i];
        if($pub=="")
            $pub = $pub_kop[0];
        $pub = explode("|", number_format($pub, 2, '|', ' '));
        if(Count($pub_kop)>1)
        {
            $kop = end($pub_kop);
            $kop = (strlen($kop) == 0) ? "00" : ((strlen($kop) == 1) ? $kop."0" : $kop);
        }
        else
            $kop = "00";
        if(strlen($kop)>2)
            $kop = $kop[0].$kop[1];
        return $pub[0].",".$kop;
    }
    ///-Статический метод преобразования строки в формат даты
    public function date($date, $format = "d.m.Y")
    {
        if($date == null || $date == '')
            return "";
        return date($format, strtotime($date));
    }
}
