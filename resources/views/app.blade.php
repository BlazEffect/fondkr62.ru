<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>fondkr62</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        @vite(['resources/scss/app.scss', 'resources/js/app.js'])

        @yield('styles')
    </head>

    <body>
        @yield('header')

        <div class="site-content">
            <div class="site__container">
                @yield('breadcrumbs')

                @yield('aside')

                @yield('main')
            </div>

            <div class="site-content__clear"></div>
        </div>

        @yield('footer')

        @yield('scripts')
    </body>
</html>
