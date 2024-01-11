<?php

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

Breadcrumbs::for('custom-page', function (BreadcrumbTrail $trail, Page $page) {
    $trail->parent('home');

    // Temporary solution
    if ($page->section_name !== null) {
        $trail->push($page->section_name);
    }

    $trail->push($page->name);
});
