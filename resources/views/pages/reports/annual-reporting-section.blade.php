@extends('app')

@section('title')
    Ежегодная отчетность
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('annual-reporting-section') }}
@endsection

@section('main')
    <main class="main">
        <h2 class="main__page-heading">Ежегодная отчетность</h2>

        <div class="main__page-wrapper">
            <div class="main-files__list">
                @foreach($annualReportings as $annualReporting)
                    <div class="main-files__item">
                        <a class="main-files__link"
                           href="/reports/yearly/{{ $annualReporting->slug }}">
                            {{ $annualReporting->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
