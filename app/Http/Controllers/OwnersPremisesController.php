<?php

namespace App\Http\Controllers;

class OwnersPremisesController extends Controller
{
    /**
     * Вывод страницы "Образцы запросов"
     */
    public function index()
    {
        return view('pages.owners-premises', $this->vars);
    }
}
