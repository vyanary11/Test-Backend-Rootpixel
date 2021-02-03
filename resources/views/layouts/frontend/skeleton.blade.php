<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="./assets/img/favicon.ico" />
        <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ mix('css/frontend/app.css') }}">
        @stack('css')
        <title>@yield('title', 'Home') | Simple Blog</title>
    </head>
    <body>
        <div id="app">
            @yield('app')
        </div>
    </body>
    <script src="{{ mix('js/dashboard/manifest.js') }}"></script>
    <script src="{{ mix('js/dashboard/vendor.js') }}"></script>
    <script src="{{ mix('js/frontend/app.js') }}"></script>

    @stack('javascript')
</html>
