<?php

namespace App\Http\Controllers;

use App\Models\RegulatoryBase;

class RegulatoryBaseController extends Controller
{
    public function index($regulatoryBaseSection)
    {
        $regulatoryBases = RegulatoryBase::query()
            ->where('section_name', $regulatoryBaseSection)
            ->get();

        if ($regulatoryBases->count() > 0) {
            $this->vars['regulatoryBases'] = $regulatoryBases;

            // Temporary solution
            $name = '';
            if ($regulatoryBaseSection === 'federal') {
                $name = 'Федеральное законодательство';
            } elseif($regulatoryBaseSection === 'regional') {
                $name = 'Региональное законодательство';
            }
            $this->vars['regulatoryBasesSection'] = $name;

            return view('pages.regulatory-base.regulatory-base-section', $this->vars);
        }

        abort(404);
    }

    public function show($regulatoryBaseSection, $regulatoryBaseSlug)
    {
        $regulatoryBase = RegulatoryBase::query()
            ->where('slug', $regulatoryBaseSlug)
            ->where('section_name', $regulatoryBaseSection)
            ->first();


        if ($regulatoryBase) {
            $this->vars['regulatoryBase'] = $regulatoryBase;

            return view('pages.regulatory-base.regulatory-base', $this->vars);
        }

        abort(404);
    }
}
