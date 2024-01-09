@extends('app')

@section('header')
    @include('layout.header')
@endsection

@section('aside')
    @include('layout.aside')
@endsection

@section('main')
    <main class="main">
        {!! $content !!}
    </main>
@endsection

@section('footer')
    @include('layout.footer')
@endsection
