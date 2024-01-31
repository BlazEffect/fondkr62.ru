<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    /**
     * Вывод страницы "Отзывы"
     */
    public function index()
    {
        return view('pages.reviews', $this->vars);
    }

    /**
     * Сохранение результатов формы
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();

        Review::create($data);

        return redirect()->back()->with('message', 'Ваш отзыв отправлен на модерацию.');
    }
}
