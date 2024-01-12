<?php

namespace App\Http\Controllers;

class OwnersPremisesController extends Controller
{
    public function index()
    {
        return view('pages.owners-premises', $this->vars);
    }
}
