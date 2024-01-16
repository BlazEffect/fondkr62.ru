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
                                'link' => '/bazaprav/federal/zakony',
                            ],
                            [
                                'title' => 'Приказы',
                                'link' => '/bazaprav/federal/prikazy',
                            ],
                            [
                                'title' => 'Постановления',
                                'link' => '/bazaprav/federal/postanovleniia',
                            ],
                            [
                                'title' => 'Регламенты и рекомендации',
                                'link' => '/bazaprav/federal/reglamenty-i-rekomendacii',
                            ]
                        ]
                    ],
                    [
                        'title' => 'Региональное законодательство',
                        'link' => '/bazaprav/regional',
                        'children' => [
                            [
                                'title' => 'Законы',
                                'link' => '/bazaprav/regional/zakony',
                            ],
                            [
                                'title' => 'Постановления',
                                'link' => '/bazaprav/regional/postanovleniia',
                            ]
                        ]
                    ]
                ]
            ],
            [
                'title' => 'Отчётность',
                'link' => '/reports/yearly',
                'children' => [
                    [
                        'title' => 'Ежегодная отчетность',
                        'link' => '/reports/yearly',
                        'children' => [
                            [
                                'title' => 'За 2014 год',
                                'link' => '/reports/yearly/za-2014-god',
                            ],
                            [
                                'title' => 'За 2015 год',
                                'link' => '/reports/yearly/za-2015-god',
                            ],
                            [
                                'title' => 'За 2016 год',
                                'link' => '/reports/yearly/za-2016-god',
                            ],
                            [
                                'title' => 'За 2017 год',
                                'link' => '/reports/yearly/za-2017-god',
                            ],
                            [
                                'title' => 'За 2018 год',
                                'link' => '/reports/yearly/za-2018-god',
                            ],
                            [
                                'title' => 'За 2019 год',
                                'link' => '/reports/yearly/za-2019-god',
                            ],
                            [
                                'title' => 'За 2020 год',
                                'link' => '/reports/yearly/za-2020-god',
                            ],
                            [
                                'title' => 'За 2021 год',
                                'link' => '/reports/yearly/za-2021-god',
                            ],
                            [
                                'title' => 'За 2022 год',
                                'link' => '/reports/yearly/za-2022-god',
                            ]
                        ]
                    ],
                    [
                        'title' => 'Результаты контрольных мероприятий',
                        'link' => '/reports/audits',
                    ],
                    [
                        'title' => 'Отчет регионального оператора (965пр от 30.12.2015)',
                        'link' => '/reports/operator',
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
                'link' => '/programs/region',
                'children' => [
                    [
                        'title' => 'Региональная программа',
                        'link' => '/programs/region',
                    ],
                    [
                        'title' => 'Краткосрочные планы',
                        'link' => '/programs/urgent',
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
                        'link' => '/programs/qualreestr',
                    ]
                ]
            ],
            [
                'title' => 'Отзывы',
                'link' => '/reviews',
            ],
            [
                'title' => 'Контакты',
                'link' => '/contacts',
            ]
        ];
    }
}
