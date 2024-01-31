<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Вывод главной страницы
     */
    public function index()
    {
        return view('pages.home', $this->vars);
    }
}
