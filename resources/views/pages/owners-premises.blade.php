@extends('app')

@section('styles')
    @vite('resources/scss/pages/reviews.scss')
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('owners-premises') }}
@endsection

@section('main')
    <main class="main">
        <h2 class="main__page-heading">Образцы запросов</h2>

        <div class="main__page-wrapper">
            <p style="margin-bottom: 20px">Заявления</p>

            <div class="main-files__list">
                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/sample-requests/spravka-zadolg.docx"
                       target="_blank">
                        Бланк заявления на выдачу справки об отсутствии задолженности по помещению
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/sample-requests/zayav-izm.docx"
                       target="_blank">
                        Бланк заявления собственника на изменение данных по помещению в многоквартирном доме
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/sample-requests/zayav.docx"
                       target="_blank">
                        Бланк заявления
                    </a>
                </div>

                <div class="main-files__item">
                    <a class="main-files__link"
                       href="/upload/sample-requests/zayav-dostavka-kvit.docx"
                       target="_blank">
                        Бланк заявления на доставку квитанций на оплату взносов на капитальный ремонт
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
