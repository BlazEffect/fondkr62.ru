@extends('app')

@section('header')
    @include('layout.header')
@endsection

@section('main')
    {!! $content !!}
@endsection

@section('footer')
    @include('layout.footer')
@endsection
