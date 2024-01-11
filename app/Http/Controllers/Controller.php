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
                'link' => '/about/information',
                'children' => [
                    [
                        'title' => 'Общая информация',
                        'link' => '/about/information',
                    ],
                    [
                        'title' => 'Термины и определения',
                        'link' => '/about/therm',
                    ],
                    [
                        'title' => 'Реквизиты фонда',
                        'link' => '/about/details',
                    ],
                    [
                        'title' => 'Сведения о руководстве',
                        'link' => '/about/topmanagement',
                    ],
                    [
                        'title' => 'Учредительные документы',
                        'link' => '/about/constituent',
                    ],
                    [
                        'title' => 'Документы фонда',
                        'link' => '/about/docsfond',
                    ],
                    [
                        'title' => 'Финансовая устойчивость',
                        'link' => '/about/steadiness',
                    ],
                    [
                        'title' => 'Контролирующие органы',
                        'link' => '/about/supervisors',
                    ]
                ]
            ],
            [
                'title' => 'Нормативно-правовая база',
                'link' => '/bazaprav',
                'children' => [
                    [
                        'title' => 'Федеральное законодательство',
                        'link' => '/bazaprav/federal',
                        'children' => [
                            [
                                'title' => 'Законы',
                                'link' => '/bazaprav/federal/laws',
                            ],
                            [
                                'title' => 'Приказы',
                                'link' => '/bazaprav/federal/orders',
                            ],
                            [
                                'title' => 'Постановления',
                                'link' => '/bazaprav/federal/decrees',
                            ],
                            [
                                'title' => 'Регламенты и рекомендации',
                                'link' => '/bazaprav/federal/reglaments',
                            ]
                        ]
                    ],
                    [
                        'title' => 'Региональное законодательство',
                        'link' => '/reports/operator',
                        'children' => [
                            [
                                'title' => 'Законы',
                                'link' => '/bazaprav/federal/laws',
                            ],
                            [
                                'title' => 'Постановления',
                                'link' => '/bazaprav/federal/decrees',
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
