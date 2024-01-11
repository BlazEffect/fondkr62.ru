@extends('app')

@section('header')
    @include('layout.header')
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('regulatory-base', $regulatoryBase) }}
@endsection

@section('aside')
    @include('layout.aside')
@endsection

@section('main')
    <main class="main">
        <h2 class="main__page-heading">{{ $regulatoryBase->name }}</h2>

        <div class="main__page-wrapper">
            <div class="main-files__list">
                @foreach($regulatoryBase->documents as $document)
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
