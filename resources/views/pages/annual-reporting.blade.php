@extends('app')

@section('header')
    @include('layout.header')
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('annual-reporting', $annualReporting) }}
@endsection

@section('aside')
    @include('layout.aside')
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

@section('footer')
    @include('layout.footer')
@endsection
