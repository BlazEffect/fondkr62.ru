@extends('app')

@section('styles')
    @vite('resources/scss/pages/reviews.scss')
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('owners-premises-operator') }}
@endsection

@section('main')
    <main class="main">
        <h2 class="main__page-heading">Отчет регионального оператора (965пр от 30.12.2015)</h2>

        <div class="main__page-wrapper">
            <p>
                Отчет, сформированный в соответствии с Приказом Министерства строительства и Жилищно-коммунального
                хозяйства <strong>N 965</strong> от 30 декабря 2015 г.
                <a href="/server/document/normbaza/federal/prikaz965.pdf" target="_blank">
                    (опубликован 9 марта 2016 г.)
                </a>:<br>
                <span>(Актуальные данные доступны в разделах
                    <a id="find_house_href" href="/base/house/">
                        Узнайте о своем доме
                    </a> и
                    <a href="/account/">Состояние лицевого счета</a>)
                </span>
            </p>

            <div class="main__dropdown">
                <label class="main__dropdown-button" for="dropdown-toggle">Опубликованные документы</label>
                <input type="checkbox" id="dropdown-toggle">
                <div class="main__dropdown-content" id="dropdown">
                    <div class="main-files__list">
                        <div class="main-files__item">
                            <a class="main-files__link" href="/upload/owners-premises-operator/oro_965_2016_1_.pdf" target="_blank">
                                Отчет регионального оператора (Фонд капитального ремонта многоквартирных домов Рязанской области) за I (первый) отчетный квартал 2016 года (20.04.2016)
                            </a>
                        </div>
                        <div class="main-files__item">
                            <a class="main-files__link" href="/upload/owners-premises-operator/oro_965_2016_2_.pdf" target="_blank">
                                Отчет регионального оператора (Фонд капитального ремонта многоквартирных домов Рязанской области) за II (второй) отчетный квартал 2016 года (20.07.2016)
                            </a>
                        </div>
                        <div class="main-files__item">
                            <a class="main-files__link" href="/upload/owners-premises-operator/oro_965_2016_3_.pdf" target="_blank">
                                Отчет регионального оператора (Фонд капитального ремонта многоквартирных домов Рязанской области) за III (третий) отчетный квартал 2016 года (19.10.2016)
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            Электронные образы акта приемки оказанных услуг и (или) выполненных работ по капитальному ремонту общего имущества в многоквартирном доме.

            <div class="find_act" style="position: relative; margin-top: 20px;">
                @csrf
                <div class="for_class"><div></div></div>
                <input class="kv_input" style="font-size: 1.2em; padding: .3vw .5vw; width: 330px;" type="text" rel="0" id="choose_mo_act" autocomplete="off" value="" alt="" placeholder="Выберите муниципальное образование">
                <div class="kv_dd_act" style="display: none; position: absolute; left: -1px; padding: 0px 10px; margin-left: -10px; top: 30px; width: 100%; max-height: 162px; overflow-y: auto; border: 1px solid #2e2e2e; z-index: 1000; background: white;">
                    @foreach($regions as $region)
                        <div class="dda_shown_act" href="#{{ $region->Region }}" style="display: block !important; color: #333; cursor: pointer;">{{ $region->Region }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    @vite('resources/js/pages/owners-premises-operator.js')
@endsection
