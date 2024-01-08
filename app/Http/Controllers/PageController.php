<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
    public function index(Page $page)
    {
        $this->vars['content'] = $page->content;

        return view('pages.user-page', $this->vars);
    }
}
