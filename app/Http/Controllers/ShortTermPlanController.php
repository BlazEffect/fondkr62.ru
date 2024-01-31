<?php

namespace App\Http\Controllers;

use App\Models\ShortTermPlan;

class ShortTermPlanController extends Controller
{
    /**
     * Вывод элементов раздела краткосрочных планов
     */
    public function index()
    {
        $this->vars['shortTermPlans'] = ShortTermPlan::all(['name', 'slug']);

        return view('pages.major-repairs.short-term-plan-section', $this->vars);
    }

    /**
     * Детальная страница "Краткосрочный план"
     *
     * @param ShortTermPlan $shortTermPlan
     */
    public function show(ShortTermPlan $shortTermPlan)
    {
        $this->vars['shortTermPlan'] = $shortTermPlan;

        return view('pages.major-repairs.short-term-plan', $this->vars);
    }
}
