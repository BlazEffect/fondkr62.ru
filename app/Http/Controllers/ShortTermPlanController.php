<?php

namespace App\Http\Controllers;

use App\Models\ShortTermPlan;

class ShortTermPlanController extends Controller
{
    public function index()
    {
        $this->vars['shortTermPlans'] = ShortTermPlan::all(['name', 'slug']);

        return view('pages.short-term-plan-section', $this->vars);
    }

    public function show(ShortTermPlan $shortTermPlan)
    {
        $this->vars['shortTermPlan'] = $shortTermPlan;

        return view('pages.short-term-plan', $this->vars);
    }
}
