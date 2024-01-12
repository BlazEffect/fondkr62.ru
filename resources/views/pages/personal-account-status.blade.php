@extends('app')

@section('header')
    @include('layout.header')
@endsection

@section('styles')
    @vite('resources/scss/pages/reviews.scss')
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('personal-account-status') }}
@endsection

@section('aside')
    @include('layout.aside')
@endsection

@section('main')
    <main class="main">
        <h2 class="main__page-heading">Состояние лицевого счета</h2>

        <div class="main__page-wrapper">
        </div>
    </main>
@endsection

@section('footer')
    @include('layout.footer')
@endsection
