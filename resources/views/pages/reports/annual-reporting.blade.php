@extends('app')

@section('title')
    {{ $annualReporting->name }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('annual-reporting', $annualReporting) }}
@endsection

@section('main')
    <main class="main">
        <h2 class="main__page-heading">{{ $annualReporting->name }}</h2>

        <div class="main__page-wrapper">
            <div class="main-files__list">
                @foreach($annualReporting->documents as $document)
                    <div class="main-files__item">
                        <a class="main-files__link"
                           href="/annual-reporting/{{ $document['document'] }}"
                           target="_blank">
                            {{ $document['name'] }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
