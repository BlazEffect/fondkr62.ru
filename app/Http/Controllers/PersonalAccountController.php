<?php

namespace App\Http\Controllers;

class PersonalAccountController extends Controller
{
    public function accountStatus()
    {
        return view('pages.personal-account-status', $this->vars);
    }
}
