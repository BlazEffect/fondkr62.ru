<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index()
    {
        return view('pages.reviews', $this->vars);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Review::create($data);

        return redirect()->back()->with('message', 'Ваш отзыв отправлен на модерацию.');
    }
}
