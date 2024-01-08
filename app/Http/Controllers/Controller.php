<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected array $vars;

    public function __construct()
    {
        // Temporary solution for menu display
        $this->vars['menu'] = [
            [
                'title' => 'О фонде',
                'link' => '',
                'children' => [
                    [
                        'title' => 'Общая информация',
                        'link' => '',
                    ],
                    [
                        'title' => 'Термины и определения',
                        'link' => '',
                    ],
                    [
                        'title' => 'Реквизиты фонда',
                        'link' => '',
                    ],
                    [
                        'title' => 'Сведения о руководстве',
                        'link' => '',
                    ],
                    [
                        'title' => 'Учредительные документы',
                        'link' => '',
                    ],
                    [
                        'title' => 'Документы фонда',
                        'link' => '',
                    ],
                    [
                        'title' => 'Финансовая устойчивость',
                        'link' => '',
                    ],
                    [
                        'title' => 'Контролирующие органы',
                        'link' => '',
                    ]
                ]
            ],
            [
                'title' => 'Нормативно-правовая база',
                'link' => '',
                'children' => [
                    [
                        'title' => 'Федеральное законодательство',
                        'link' => '',
                        'children' => [
                            [
                                'title' => 'Законы',
                                'link' => '',
                            ],
                            [
                                'title' => 'Приказы',
                                'link' => '',
                            ],
                            [
                                'title' => 'Постановления',
                                'link' => '',
                            ],
                            [
                                'title' => 'Регламенты и рекомендации',
                                'link' => '',
                            ]
                        ]
                    ],
                    [
                        'title' => 'Региональное законодательство',
                        'link' => '',
                        'children' => [
                            [
                                'title' => 'Законы',
                                'link' => '',
                            ],
                            [
                                'title' => 'Постановления',
                                'link' => '',
                            ]
                        ]
                    ]
                ]
            ],
            [
                'title' => 'Отчётность',
                'link' => '',
            ],
            [
                'title' => 'Новости',
                'link' => '',
            ],
            [
                'title' => 'Проведение каремонта',
                'link' => '',
            ],
            [
                'title' => 'Отзывы',
                'link' => '',
            ],
            [
                'title' => 'Контакты',
                'link' => '',
            ]
        ];
    }
}
