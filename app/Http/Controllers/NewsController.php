<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    /**
     * Вывод элементов раздела новостей
     *
     * @param $newsSection
     */
    public function index($newsSection)
    {
        $news = News::query()
            ->where('section_name', $newsSection)
            ->get();

        if ($news->count() > 0) {
            $this->vars['news'] = $news;

            // Temporary solution
            $name = '';
            if ($news->first()->section_name == 'fund') {
                $name = 'Новости фонда';
            } elseif ($news->first()->section_name == 'smi') {
                $name = 'СМИ о нас';
            } elseif ($news->first()->section_name == 'federalnews') {
                $name = 'Федеральные новости';
            }
            $this->vars['newsSectionName'] = $name;

            return view('pages.news.news-section', $this->vars);
        }

        abort(404);
    }

    /**
     * Детальная страница "Новости"
     *
     * @param $newsSection
     * @param $newsSlug
     */
    public function show($newsSection, $newsSlug){
        $news = News::query()
            ->where('section_name', $newsSection)
            ->where('slug', $newsSlug)
            ->first();

        if ($news) {
            $this->vars['news'] = $news;

            return view('pages.news.news', $this->vars);
        }

        abort(404);
    }
}
