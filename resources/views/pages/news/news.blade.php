@extends('app')

@section('title')
    {{ $news->name }}
@endsection

@section('styles')
    @vite('resources/scss/pages/news.scss')
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('news-item', $news) }}
@endsection

@section('main')
    <main class="main">
        <h2 class="main__page-heading">{{ $news->name }}</h2>

        <div class="main__page-wrapper">
            {!! $news->content !!}
        </div>
    </main>
@endsection
