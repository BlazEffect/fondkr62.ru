@extends('app')

@section('header')
    @include('layout.header')
@endsection

@section('styles')
    @vite('resources/scss/pages/reviews.scss')
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('owners-premises') }}
@endsection

@section('aside')
    @include('layout.aside')
@endsection

@section('main')
    <main class="main">
        <h2 class="main__page-heading">Образцы запросов</h2>

        <div class="main__page-wrapper">
            <p>Заявления</p>

            <div class="main-files__list">
                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/constituent-documents/postanovlenie-o-sozdanii-regionalnogo-operatora.pdf"
                       target="_blank">
                        Постановеление № 445 от 19 декабря 2013 г. &laquo;О создании Регионального оператора&raquo;
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/constituent-documents/svidetelstvo-o-registracii-nko.pdf"
                       target="_blank" rel="noopener">
                        Свидетельство о государственной
                        регистрации некоммерческой организации
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/constituent-documents/svidetelstvo-ogrjul.pdf"
                       target="_blank" rel="noopener">
                        Свидетельство о Государственной
                        регистрации юридического лица
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/constituent-documents/svidetelstvo-nalogvyj-uchet.pdf"
                       target="_blank" rel="noopener">
                        Свидетельство о постановке на учет в
                        Налоговом органе
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/constituent-documents/ustav2022.pdf" target="_blank"
                       rel="noopener">
                        Устав
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/constituent-documents/rasp-dubrovin.pdf" target="_blank"
                       rel="noopener">
                        Распоряжение Правительства Рязанской области от 16
                        ноября 2022г. № 630-р о назначении руководителя
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('footer')
    @include('layout.footer')
@endsection
