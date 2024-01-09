@extends('app')

@section('header')
    @include('layout.header')
@endsection

@section('aside')
    @include('layout.aside')
@endsection

@section('main')
    {!! $content !!}
@endsection

@section('footer')
    @include('layout.footer')
@endsection
