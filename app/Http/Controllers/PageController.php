<?php

namespace App\Http\Controllers;

use App\Models\Corruption;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function index(Page $page)
    {
        $this->vars['page'] = $page;

        return view('pages.user-page', $this->vars);
    }

    public function korrupcii()
    {
        return view('pages.korrupcii', $this->vars);
    }

    public function korrupciiStore(Request $request)
    {
        $data = $request->all();

        $messages = [
            'second_name.required' => 'Фамилия является обязательным полем.',
            'first_name.required' => 'Имя является обязательным полем.',
            'email.required' => 'Электронный адрес является обязательным полем.',
            'theme.required' => 'Тема обращения является обязательным полем.',
            'detail_text.required' => 'Текст обращения является обязательным полем.',
        ];

        $validator = Validator::make($data, [
            'second_name' => 'required',
            'first_name' => 'required',
            'email' => 'required',
            'theme' => 'required',
            'detail_text' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $corruption = [
            'F' => $data['second_name'],
            'I' => $data['first_name'],
            'O' => $data['third_name'] ?? '',
            'Email' => $data['email'],
            'Adres' => $data['adres'] ?? '',
            'Theme' => $data['theme'],
            'Message' => $data['detail_text'],
            'Sogl' => $data['public_agree'] == 2 ? 'Да' : 'Нет',
            'Created' => now(),
        ];

        Corruption::create($corruption);

        return redirect()->back()->with('message', 'Ваше обращение принято.');
    }
}
