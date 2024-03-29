<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title', 'Фонд капитального ремонта')</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        @vite(['resources/scss/app.scss', 'resources/js/app.js'])

        @yield('styles')
    </head>

    <body>
        @include('layout.header')

        <div class="overlay"></div>

        <div class="site-content">
            <div class="site__container">
                @yield('breadcrumbs')

                @include('layout.aside')

                @yield('main')

                @include('layout.blocks.third-party-sites')
            </div>

            <div class="site-content__clear"></div>
        </div>

        @include('layout.footer')

        <div class="warning-banner__wrapper">
            <div class="warning-banner__tech_work">
                На сайте проводятся технические работы! Возможна временная недоступность или сбои. Мы работаем над улучшением функционала.
            </div>
        </div>

        @yield('scripts')
    </body>
</html>
