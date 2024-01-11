<?php

use App\Models\Page;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('home'));
});

Breadcrumbs::for('custom-page', function (BreadcrumbTrail $trail, Page $page) {
    $trail->parent('home');

    // Temporary solution
    if ($page->section_name !== null) {
        $trail->push($page->section_name);
    }

    $trail->push($page->name);
});
