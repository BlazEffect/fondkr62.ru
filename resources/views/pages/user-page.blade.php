@extends('app')

@section('title')
    {{ $page->name }}
@endsection

@section('styles')
    @vite('resources/scss/pages/user-page.scss')
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('custom-page', $page) }}
@endsection

@section('main')
    <main class="main">
        <h2 class="main__page-heading">{{ $page->name }}</h2>

        <div class="main__page-wrapper">
            {!! $page->content !!}
        </div>
    </main>
@endsection
