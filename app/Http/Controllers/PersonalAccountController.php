<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\FlatsFull;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonalAccountController extends Controller
{
    public function accountStatus()
    {
        return view('pages.personal-account-status', $this->vars);
    }

    public function getStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'personal-account-code' => 'required|digits:16',
        ]);

        if ($validator->fails()) {
            return [
                'status' => 'error',
                'message' => 'Ошибка! Введен недопустимый спецсимвол!'
            ];
        }

        $personalAccountCode = $request->input('personal-account-code');

        $data = Account::query()
            ->where('Ls', $personalAccountCode)
            ->join('houses', 'account.Ls', '=', 'houses.CodeHouse')
            ->select([
                'account.Ls',
                'account.Saldo',
                'account.LastPay',
                'account.Debet76',
                'account.Credit76',
                'account.PeniDebet',
                'account.PeniCredit',
                'account.Date',
                'houses.TypeFormationFund',
                'houses.RegionalProgram',
            ])
            ->first();

        if ($data === null) {
            return [
                'status' => 'error',
                'message' => 'Лицевой счет не обнаружен. Проверьте правильность введенных символов.'
            ];
        }

        $data = $data->toArray();

        if ($data['RegionalProgram'] !== null) {
            return [
                'status' => 'error',
                'message' => "Дом исключен из региональной программы постановлением <a href=\"/programs/region/\">" . $data['RegionalProgram'] . "</a>"
            ];
        }
        if ($data['TypeFormationFund'] !== "на счете регионального оператора") {
            return [
                'status' => 'error',
                'message' => 'Собственники в Вашем многоквартирном доме формируют фонд капитального ремонта ' . $data['TypeFormationFund']
            ];
        }

        $html = "<div id=\"ls_state\">";
        $html .= "<h3>Состояние лицевого счета " . $personalAccountCode . " на данный момент**:</h3>";
        if (((int)$data['Saldo']) > 0) {
            $html .= "<div class=\"account_info\">";
            $html .= "<span><b>Недоплата:</b> </span><span>" . $this->myMoney($data['Saldo']) . "</span>";
            $html .= "</div>";
            $html .= "<div class=\"account_info\">";
            $html .= "<span><b>Переплата:</b> </span><span>" . $this->myMoney("0.00") . "</span>";
            $html .= "</div>";
        } elseif (((int)$data['Saldo']) < 0) {
            $html .= "<div class=\"account_info\">";
            $html .= "<span><b>Недоплата:</b> </span><span>" . $this->myMoney("0.00") . "</span>";
            $html .= "</div>";
            $html .= "<div class=\"account_info\">";
            $html .= "<span><b>Переплата:</b> </span><span>" . str_replace("-", "", $this->myMoney($data['Saldo'])) . "</span>";
            $html .= "</div>";
        } else {
            $html .= "<div class=\"account_info\">";
            $html .= "<span><b>Недоплата:</b> </span><span>" . $this->myMoney("0.00") . "</span>";
            $html .= "</div>";
            $html .= "<div class=\"account_info\">";
            $html .= "<span><b>Переплата:</b> </span><span>" . $this->myMoney("0.00") . "</span>";
            $html .= "</div>";
        }
        $peni = $data['PeniDebet'] - $data['PeniCredit'];
        if ($peni > 0) {
            $html .= "<div class=\"account_info\">";
            $html .= "<span><b>Пени:</b> </span><span>" . $this->myMoney($peni) . "</span>";
            $html .= "</div>";
        }
        if (((int)$data['Debet76']) > 0) {
            $html .= "<div class=\"account_info\">";
            $html .= "<span><b>Начислено за весь период:</b> </span><span>" . $this->myMoney($data['Debet76']) . "</span>";
            $html .= "</div>";
        }
        if (((int)$data['Credit76']) > 0 || ((int)$data['Saldo']) > 0) {
            $html .= "<div class=\"account_info\">";
            $html .= "<span><b>Оплачено за весь период:</b> </span><span>" . $this->myMoney($data['Credit76']) . "</span>";
            $html .= "</div>";
        }
        if ((int)$data['LastPay'] > 0 && !empty($data['Date'])) {
            $html .= "<div class=\"account_info\">";
            $html .= "<span><b>Последний зафиксированный взнос:</b> </span>";
            $html .= "<span> от " . $this->myDate($data['Date']) . " на сумму " . $this->myMoney($data['LastPay']) . "</span>";
            $html .= "</div>";
        }
        $html .= "</div>";

        //Квитанция
        $html .= '
			<div style="cursor: pointer; padding: 5px 9px; border: 1px solid black; width: max-content; margin: 10px 0 20px;" class="get_kvit ' . $personalAccountCode . '">Получить квитанцию</div>
			<link rel="stylesheet" href="/assets/css/personal-account-status-data.css">
			<div class="izv" id="inner_izv_block">
				<div style="cursor: pointer; padding: 5px 9px; border: 1px solid black; width: max-content; margin: 10px 0 20px;" class="load_kvit 6226014810330063">Скачать квитанцию</div>
				<div class="izv_half" id="top_half">
					<div class="izv_left"><span>Извещение</span></div>
					<div class="izv_right">
						<div class="taker izv_info">
							<h3>Получатель:</h3> Фонд капитального ремонта многоквартирных домов Рязанской области, ИНН: 6229990334, КПП: 623001001, Счет: 40703810953000000557 в отделении № 8606 Сбербанка России, г. Рязань, БИК: 046126614, Адрес: г. Рязань, ул. Маяковского, д.1А, строение 3 (корпус Е)
						</div>
						<div class="till_block">
							<div class="month_block izv_info">
								<b>Оплата взноса на капитальный ремонт за:</b>
								<input class="month" type="text" value="">
							</div>
							<div class="till">
								(оплата до 10 числа след. месяца)
							</div>
							<div class="clear"><br></div>
						</div>
						<div class="person_block izv_info">
							<div class="fio_block">
								<h3>Плательщик:</h3>
								<span class="fio"></span>
							</div>
							<div class="ls_block">
								<b>Лицевой счет:</b>
								<span class="ls_itself"></span>
							</div>
						</div>
						<div class="ls_barcode" id="ls_barcode_top">
							<canvas class="ls_barcode_inner"><br></canvas>
						</div>
						<div class="clear"><br></div>

						<div class="address_block izv_info">
							<b>Адрес:</b>
							<span class="address_sign"></span>
						</div>

						<div class="square_block izv_info">
							<b>Площадь:</b>
							<input type="text" class="square changable" rel="0" value="">
							кв.м
						</div>
						<div class="tarif_block"><b>Тариф:</b> 11,65 руб./кв.м</div>
						<div class="clear"><br></div>

						<table class="payment_hold">
							<colgroup>
								<col width="16%">
								<col width="25%">
								<col width="21%">
								<col width="17%">
								<col width="21%">
							</colgroup>
							<tbody><tr>
								<td>Наименование</td>
								<th>Долг (на ' . date('d.m.Y') . ')</th>
								<th>Начислено</th>
								<th>Пени</th>
								<th>К ОПЛАТЕ</th>
							</tr>
							<tr>
								<td>Сумма (руб.)</td>
								<td class="dolg" style="text-align: center"></td>
								<td class="nachisleno" style="text-align: center;"></td>
								<td class="peni" style="text-align: center;"></td>
								<td class="total" style="text-align: center;"></td>
							</tr>
						</tbody></table>
						<div class="signature">
							Подпись плательщика _____________________
						</div>
					</div>
					<div class="clear"><br></div>
				</div>
				<div class="izv_half" id="bottom_half">
					<div class="izv_left"><span>Квитанция</span><div id="qrcode" style="padding: 10px;"></div></div>
					<div class="izv_right">
						<div class="taker izv_info">
							<h3>Получатель:</h3> Фонд капитального ремонта многоквартирных домов Рязанской области, ИНН: 6229990334, КПП: 623001001, Счет: 40703810953000000557 в отделении № 8606 Сбербанка России, г. Рязань, БИК: 046126614, Адрес: г. Рязань, ул. Маяковского, д.1А, строение 3 (корпус Е)
						</div>
						<div class="till_block">
							<div class="month_block izv_info">
								<b>Оплата взноса на капитальный ремонт за:</b>
								<input class="month" type="text" value="">
							</div>
							<div class="till">
								(оплата до 10 числа след. месяца)
							</div>
							<div class="clear"><br></div>
						</div>
						<div class="person_block izv_info">
							<div class="fio_block">
								<h3>Плательщик:</h3>
								<span class="fio"></span>
							</div>
							<div class="ls_block">
								<b>Лицевой счет:</b>
								<span class="ls_itself"></span>
							</div>
						</div>
						<div class="ls_barcode" id="ls_barcode_bottom">
							<canvas class="ls_barcode_inner"><br></canvas>
						</div>
						<div class="clear"><br></div>

						<div class="address_block izv_info">
							<b>Адрес:</b>
							<span class="address_sign"></span>
						</div>

						<div class="square_block izv_info">
							<b>Площадь:</b>
							<input type="text" class="square changable" rel="1" value="">
							кв.м
						</div>
						<div class="tarif_block"><b>Тариф:</b> 11,65 руб./кв.м</div>
						<div class="clear"><br></div>

						<table class="payment_hold">
							<colgroup>
								<col width="16%">
								<col width="25%">
								<col width="21%">
								<col width="17%">
								<col width="21%">
							</colgroup>
							<tbody><tr>
								<td>Наименование</td>
								<th>Долг (на ' . date('d.m.Y') . ')</th>
								<th>Начислено</th>
								<th>Пени</th>
								<th>К ОПЛАТЕ</th>
							</tr>
							<tr>
								<td>Сумма (руб.)</td>
								<td class="dolg" style="text-align: center;"></td>
								<td class="nachisleno" style="text-align: center;"></td>
								<td class="peni" style="text-align: center;"></td>
								<td class="total" style="text-align: center;"></td>
							</tr>
						</tbody></table>
						<div class="signature">
							Подпись плательщика _____________________
						</div>
					</div>
					<div class="clear"><br></div>
				</div>
			</div>';

        return [
            'status' => 'success',
            'html' => $html
        ];
    }

    public function emailReceipts()
    {
        return view('pages.personal-account-email-receipts', $this->vars);
    }

    public function getReceipt(Request $request)
    {
        $data = FlatsFull::query()
            ->where('Lso', $request->input('ls'))
            ->join('houses', 'flats_full.Lso', '=', 'houses.CodeHouse')
            ->join('account', 'flats_full.Lso', '=', 'account.Ls')
            ->first()
            ->toArray();

        $date = date('mY');

        switch (substr($date, 0, 2)) {
            case '01':
                $m = 'Январь';
                break;
            case '02':
                $m = 'Февраль';
                break;
            case '03':
                $m = 'Март';
                break;
            case '04':
                $m = 'Апрель';
                break;
            case '05':
                $m = 'Май';
                break;
            case '06':
                $m = 'Июнь';
                break;
            case '07':
                $m = 'Июль';
                break;
            case '08':
                $m = 'Август';
                break;
            case '09':
                $m = 'Сентябрь';
                break;
            case '10':
                $m = 'Октябрь';
                break;
            case '11':
                $m = 'Ноябрь';
                break;
            case '12':
                $m = 'Декабрь';
                break;
        }

        $nach = round($data['Pl'] * 11.65, 2);
        $dolg = $data['Debet76'] - $data['Credit76'] - (date('d') < 12 ? 0 : $nach);
        $peni = $data['PeniDebet'] - $data['PeniCredit'];
        if ($peni < 0) $peni = 0;

        return json_encode($m . ' ' . substr($date, 2, 4) . ' год||' . $data['Pl'] . '||' . $request->input('ls') . '||' . str_replace('Россия, Рязанская обл., ', '', $data['FullAddress']) . (strpos($data['Kv'], 'Н') == false ? ' , кв. ' : ' , пом. ') . $data['Kv'] . '||' .
            number_format($dolg, 2, ',', ' ') . '||' .
            number_format($nach, 2, ',', ' ') . '||' .
            number_format($peni, 2, ',', ' ') . '||' .
            number_format(($dolg + $nach + $peni), 2, ',', ' ') . '||ST00012|Name=Фонд капитального ремонта многоквартирных домов Рязанской области|PersonalAcc=40703810953000000557|BankName=ОТДЕЛЕНИЕ N 8606 СБЕРБАНКА РОССИИ г. РЯЗАНЬ|BIC=046126614|CorrespAcc=30101810500000000614|PayeeINN=6229990334|persAcc=' . $request->input('ls') . '|Purpose=Оплата взноса на капитальный ремонт|PayerAddress=' . $data['FullAddress'] . (strpos($data['Kv'], 'Н') == false ? ' , кв. ' : ' , пом. ') . $data['Kv'] . '|Date=' . date('d.m.Y') . '|SumNedopl=' . ($dolg * 100) . '|SumNachisl=' . ($nach * 100) . '|SumVznos=' . (($dolg + $nach + $peni) * 100) . '|SumPeny=' . ($peni * 100));
    }

    private function myMoney($string)
    {
        $local = str_replace(",", ".", $string);
        $pub_kop = explode(".", $local);
        $pub = "";
        for ($i = 0; $i < (Count($pub_kop) - 1); $i++)
            $pub .= $pub_kop[$i];
        if ($pub == "")
            $pub = $pub_kop[0];
        $pub = explode("|", number_format($pub, 2, '|', ' '));
        if (Count($pub_kop) > 1) {
            $kop = end($pub_kop);
            $kop = (strlen($kop) == 0) ? "00" : ((strlen($kop) == 1) ? $kop . "0" : $kop);
        } else
            $kop = "00";
        if (strlen($kop) > 2)
            $kop = $kop[0] . $kop[1];
        return $pub[0] . " руб. " . $kop . " коп.";
    }

    private function myDate($string)
    {
        $local = explode("-", $string);
        $data = explode(" ", $local[2]);
        return "$data[0].$local[1].$local[0]";
    }
}
