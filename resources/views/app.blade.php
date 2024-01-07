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

        @yield('main')

        @yield('footer')

        @yield('scripts')
    </body>
</html>
