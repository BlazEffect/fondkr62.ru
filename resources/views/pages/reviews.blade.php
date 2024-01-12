@extends('app')

@section('header')
    @include('layout.header')
@endsection

@section('styles')
    @vite('resources/scss/pages/reviews.scss')
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('reviews') }}
@endsection

@section('aside')
    @include('layout.aside')
@endsection

@section('main')
    <main class="main">
        <h2 class="main__page-heading">Отзывы</h2>

        <div class="main__page-wrapper">
            <form method="post" action="{{ route('reviews.store') }}" class="main-review-form">
                @csrf

                <div class="main-review-form__control">
                    <label class="main-review-form__label" for="name">Имя:</label>
                    <input class="main-review-form__input" type="text" name="name" id="name" placeholder="Имя">
                </div>

                <div class="main-review-form__control">
                    <label class="main-review-form__label" for="address">Адрес:</label>
                    <input class="main-review-form__input" type="text" name="address" id="address" placeholder="Адрес">
                </div>

                <div class="main-review-form__control">
                    <label class="main-review-form__label" for="review-text">Напишите отзыв:</label>
                    <textarea class="main-review-form__input"
                              name="text"
                              id="review-text"
                              placeholder="Напишите отзыв"></textarea>
                </div>

                <div class="main-review-form__control">
                    <button type="submit" class="main-review-form__button">
                        Отправить отзыв
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection

@section('footer')
    @include('layout.footer')
@endsection
