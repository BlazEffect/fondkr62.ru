<?php

namespace App\Http\Controllers;

use App\Models\AnnualReporting;

class AnnualReportingController extends Controller
{
    /**
     * Вывод раздела "Ежегодная отчетность"
     */
    public function index()
    {
        $annualReportings = AnnualReporting::all()
            ->sortBy('name');

        $this->vars['annualReportings'] = $annualReportings;

        return view('pages.reports.annual-reporting-section', $this->vars);
    }

    /**
     * Детальная страница "Ежегодная отчетность"
     *
     * @param AnnualReporting $annualReporting
     */
    public function show(AnnualReporting $annualReporting)
    {
        $this->vars['annualReporting'] = $annualReporting;

        return view('pages.reports.annual-reporting', $this->vars);
    }
}
