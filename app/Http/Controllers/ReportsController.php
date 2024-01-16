<?php

namespace App\Http\Controllers;

use App\Models\ActsData;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        $this->vars['regions'] = ActsData::query()
            ->select('Region')
            ->join('acts', 'acts_data.Oid', '=', 'acts.Oid')
            ->join('houses', 'acts.CodeHouse', '=', 'houses.CodeHouse')
            ->groupBy('Region')
            ->orderBy('Region')
            ->get();

        return view('pages.owners-premises-operator', $this->vars);
    }

    public function searchActMo(Request $request)
    {
        $settlements = ActsData::query()
            ->select('Settlement')
            ->join('acts', 'acts_data.Oid', '=', 'acts.Oid')
            ->join('houses', 'acts.CodeHouse', '=', 'houses.CodeHouse')
            ->where('Region', $request->get('id'))
            ->groupBy('Settlement')
            ->orderBy('Settlement')
            ->get();

        $new = '';

        foreach ($settlements as $settlement) {
            $new .= '<div class="dda_shown_act_np" href="#'.$settlement->Settlement.'" style="display: block !important; color: #333; cursor: pointer;">'.trim($settlement->Settlement).'</div>';
        }

        $html = '
        <div style="position: relative; margin-top: .5vw;" class="form_mo_act">
            <div class="for_class_mo_act"><div></div></div>
            <input class="kv_input_act_np" style="font-size: 1.2em; padding: .3vw .5vw; width: 330px;" type="text" rel="0" id="choose_mo_act_0" autocomplete="off" value="" alt="" placeholder="Населенный пункт">
            <div class="kv_dd_act_np" style="display: none; position: absolute; left: -1px; padding: 0px 10px; margin-left: -10px; top: 30px; width: 100%; max-height: 162px; overflow-y: auto; border: 1px solid #2e2e2e; z-index: 1000; background: white;">'.$new.'</div>
        </div>
        ';

        return json_encode($html);
    }

    public function searchActNp(Request $request)
    {
        $officialAddresses = ActsData::query()
            ->select('OfficialAddress')
            ->join('acts', 'acts_data.Oid', '=', 'acts.Oid')
            ->join('houses', 'acts.CodeHouse', '=', 'houses.CodeHouse')
            ->where('Settlement', $request->get('id'))
            ->groupBy('OfficialAddress')
            ->orderBy('OfficialAddress')
            ->get();

        $new = '';

        foreach ($officialAddresses as $officialAddress) {
            $new .= '<div class="dda_shown_act_hs" href="#'.$officialAddress->OfficialAddress.'" style="display: block !important; color: #333; cursor: pointer;">'.trim($officialAddress->OfficialAddress).'</div>';
        }

        $html = '
        <div style="position: relative; margin-top: .5vw;" class="form_mo_act_hs">
            <div class="for_class_mo_act_hs"><div></div></div>
            <input class="kv_input_act_hs" style="font-size: 1.2em; padding: .3vw .5vw; width: 330px;" type="text" rel="0" id="choose_mo_act_1" autocomplete="off" value="" alt="" placeholder="Дом">
            <div class="kv_dd_act_hs" style="display: none; position: absolute; left: -1px; padding: 0px 10px; margin-left: -10px; top: 30px; width: 100%; max-height: 162px; overflow-y: auto; border: 1px solid #2e2e2e; z-index: 1000; background: white;">'.$new.'</div>
        </div>
        ';

        return json_encode($html);
    }

    public function searchActHs(Request $request)
    {
        $acts = ActsData::query()
            ->join('acts', 'acts_data.Oid', '=', 'acts.Oid')
            ->join('houses', 'acts.CodeHouse', '=', 'houses.CodeHouse')
            ->where('OfficialAddress', $request->get('id'))
            ->get();

        $new = '';

        foreach ($acts as $act) {
            $new .= '<p><a href="'.$act->Link.'" target="_blank">'.trim($act->NameElementHouse).' ('.substr($act->Date, 8, 2).'-'.substr($act->Date, 5, 2).'-'.substr($act->Date, 0, 4).') '.number_format($act->Sum, 2, ',', ' ').' руб.</a></div>';
        }

        $html = '
        <div style="position: relative; margin-top: .5vw;" class="form_mo_act_result">
            '.$new.'
        </div>
        ';

        return json_encode($html);
    }
}
