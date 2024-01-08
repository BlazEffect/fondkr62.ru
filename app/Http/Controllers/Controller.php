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
                'children' => [
                    [
                        'title' => 'Ежегодная отчетность',
                        'link' => '',
                        'children' => [
                            [
                                'title' => 'За 2014 год',
                                'link' => '',
                            ],
                            [
                                'title' => 'За 2015 год',
                                'link' => '',
                            ],
                            [
                                'title' => 'За 2016 год',
                                'link' => '',
                            ],
                            [
                                'title' => 'За 2017 год',
                                'link' => '',
                            ],
                            [
                                'title' => 'За 2018 год',
                                'link' => '',
                            ],
                            [
                                'title' => 'За 2019 год',
                                'link' => '',
                            ],
                            [
                                'title' => 'За 2020 год',
                                'link' => '',
                            ],
                            [
                                'title' => 'За 2021 год',
                                'link' => '',
                            ],
                            [
                                'title' => 'За 2022 год',
                                'link' => '',
                            ]
                        ]
                    ],
                    [
                        'title' => 'Результаты контрольных мероприятий',
                        'link' => '',
                    ],
                    [
                        'title' => 'Отчет регионального оператора (965пр от 30.12.2015)',
                        'link' => '',
                    ]
                ]
            ],
            [
                'title' => 'Новости',
                'link' => '',
                'children' => [
                    [
                        'title' => 'СМИ о нас',
                        'link' => '',
                    ],
                    [
                        'title' => 'Новости фонда',
                        'link' => '',
                    ],
                    [
                        'title' => 'Федеральные новости',
                        'link' => '',
                    ]
                ]
            ],
            [
                'title' => 'Проведение каремонта',
                'link' => '',
                'children' => [
                    [
                        'title' => 'Региональная программа',
                        'link' => '',
                    ],
                    [
                        'title' => 'Краткосрочные планы',
                        'link' => '',
                        'children' => [
                            [
                                'title' => 'На 2017-2019 годы',
                                'link' => '',
                            ],
                            [
                                'title' => 'На 2015-2016 годы',
                                'link' => '',
                            ],
                            [
                                'title' => 'На 2014 год',
                                'link' => '',
                            ],
                            [
                                'title' => 'На 2020-2022 годы',
                                'link' => '',
                            ],
                            [
                                'title' => 'На 2023-2025 годы',
                                'link' => '',
                            ]
                        ]
                    ],
                    [
                        'title' => 'Выполнение работ',
                        'link' => '',
                    ],
                    [
                        'title' => 'Реестр квалифицированных подрядчиков',
                        'link' => '',
                    ]
                ]
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
