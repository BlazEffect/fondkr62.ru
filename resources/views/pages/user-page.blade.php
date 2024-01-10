@extends('app')

@section('header')
    @include('layout.header')
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('custom_page', $page) }}
@endsection

@section('aside')
    @include('layout.aside')
@endsection

@section('main')
    <main class="main">
        {!! $page->content !!}
    </main>
@endsection

@section('footer')
    @include('layout.footer')
@endsection
