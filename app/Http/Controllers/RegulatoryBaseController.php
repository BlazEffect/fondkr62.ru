<?php

namespace App\Http\Controllers;

use App\Models\RegulatoryBase;

class RegulatoryBaseController extends Controller
{
    public function show($regulatoryBaseSection, $regulatoryBaseSlug)
    {
        $regulatoryBase = RegulatoryBase::query()
            ->where('slug', $regulatoryBaseSlug)
            ->where('section_name', $regulatoryBaseSection)
            ->first();


        if ($regulatoryBase) {
            $this->vars['regulatoryBase'] = $regulatoryBase;

            return view('pages.regulatory-base', $this->vars);
        }

        abort(404);
    }
}
