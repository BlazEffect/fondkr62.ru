<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\RegulatoryBase;
use App\Models\ShortTermPlan;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected array $vars;

    public function __construct()
    {
        $regulatoryBases = RegulatoryBase::all(['name', 'slug', 'section_name'])
            ->groupBy('section_name');
        $regulatoryBasesSectionChildren = [];
        foreach ($regulatoryBases as $regulatoryBaseSection => $regulatoryBase) {
            $regulatoryBaseItems = [];

            // Temporary solution
            $name = '';
            if ($regulatoryBaseSection === 'federal') {
                $name = 'Федеральное законодательство';
            } elseif($regulatoryBaseSection === 'regional') {
                $name = 'Региональное законодательство';
            }

            foreach ($regulatoryBase as $items) {
                $regulatoryBaseItems[] = [
                    'title' => $items->name,
                    'link' => '/bazaprav/' . $regulatoryBaseSection . '/' . $items->slug,
                ];
            }

            $regulatoryBasesSectionChildren[] = [
                'title' => $name,
                'link' => '/bazaprav/' . $regulatoryBaseSection,
                'children' => $regulatoryBaseItems,
            ];
        }

        $news = News::all('section_name')
            ->unique('section_name')
            ->sortByDesc('section_name');
        $newsChildren = [];
        foreach ($news as $newsSection) {
            // Temporary solution
            $name = '';
            if ($newsSection->section_name == 'fund') {
                $name = 'Новости фонда';
            } elseif ($newsSection->section_name == 'smi') {
                $name = 'СМИ о нас';
            } elseif ($newsSection->section_name == 'federalnews') {
                $name = 'Федеральные новости';
            }

            $newsChildren[] = [
                'title' => $name,
                'link' => '/news/' . $newsSection->section_name,
            ];
        }

        $shortTermPlans = ShortTermPlan::all(['name', 'slug']);
        $shortTermPlansChildren = [];
        foreach ($shortTermPlans as $shortTermPlan) {
            $shortTermPlansChildren[] = [
                'title' => $shortTermPlan->name,
                'link' => '/programs/urgent/' . $shortTermPlan->slug,
            ];
        }

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
                'children' => $regulatoryBasesSectionChildren
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
                'link' => $newsChildren[0]['link'],
                'children' => $newsChildren
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
                        'children' => $shortTermPlansChildren
                    ],
                    [
                        'title' => 'Выполнение работ',
                        'link' => '/base/house',
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
