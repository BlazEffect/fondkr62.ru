<?php

namespace App\Http\Controllers;

use App\Models\AnnualReporting;

class AnnualReportingController extends Controller
{
    public function show(AnnualReporting $annualReporting)
    {
        $this->vars['annualReporting'] = $annualReporting;

        return view('pages.annual-reporting', $this->vars);
    }
}
