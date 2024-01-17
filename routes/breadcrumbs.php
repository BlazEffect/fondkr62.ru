<?php

use App\Models\AnnualReporting;
use App\Models\News;
use App\Models\Page;
use App\Models\RegulatoryBase;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('home'));
});

Breadcrumbs::for('regulatory-base', function (BreadcrumbTrail $trail, RegulatoryBase $regulatoryBase) {
    $trail->parent('home');

    $trail->push('Нормативно-правовая база', '/bazaprav');

    // Temporary solution
    if ($regulatoryBase->section_name === 'federal') {
        $trail->push('Федеральное законодательство', '/bazaprav/federal');
    } else {
        $trail->push('Региональное законодательство', '/bazaprav/regional');
    }

    $trail->push($regulatoryBase->name);
});

Breadcrumbs::for('annual-reporting', function (BreadcrumbTrail $trail, AnnualReporting $annualReporting) {
    $trail->parent('home');

    $trail->push('Отчетность', '/reports/yearly');
    $trail->push('Ежегодная отчетность', '/reports/yearly');

    $trail->push($annualReporting->name);
});

Breadcrumbs::for('news', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Новости');
});

Breadcrumbs::for('news-section', function (BreadcrumbTrail $trail, News $news) {
    $trail->parent('news');

    // Temporary solution
    if ($news->section_name === 'fund') {
        $trail->push('Новости фонда', route('news-section', [$news->section_name]));
    } elseif ($news->section_name === 'smi') {
        $trail->push('СМИ о нас', route('news-section', [$news->section_name]));
    } elseif ($news->section_name === 'federalnews') {
        $trail->push('Федеральные новости', route('news-section', [$news->section_name]));
    }
});

Breadcrumbs::for('news-item', function (BreadcrumbTrail $trail, News $news) {
    $trail->parent('news-section', $news);

    $trail->push($news->name);
});

Breadcrumbs::for('reviews', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Отзывы');
});

Breadcrumbs::for('owners-premises', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Собственникам помещений');
    $trail->push('Образцы запросов');
});

Breadcrumbs::for('owners-premises-operator', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Отчетность');
    $trail->push('Отчет регионального оператора (965пр от 30.12.2015)');
});

Breadcrumbs::for('personal-account-status', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Состояние лицевого счета');
});

Breadcrumbs::for('email-receipts', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Заявление на получение квитанции на электронную почту');
});

Breadcrumbs::for('find-personal-account', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Узнать свой лицевой счет');
});

Breadcrumbs::for('korrupcii', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Противодействие коррупции');
});

Breadcrumbs::for('custom-page', function (BreadcrumbTrail $trail, Page $page) {
    $trail->parent('home');

    // Temporary solution
    if ($page->section_name !== null) {
        $trail->push($page->section_name);
    }

    $trail->push($page->name);
});
