<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
    public function index(Page $page)
    {
        return view('pages.user-page', [
            'content' => $page->content
        ]);
    }
}
