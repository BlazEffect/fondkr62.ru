<?php

namespace App\Http\Controllers;

class ReviewsController extends Controller
{
    public function index()
    {
        return view('pages.reviews', $this->vars);
    }

    public function store()
    {

    }
}
