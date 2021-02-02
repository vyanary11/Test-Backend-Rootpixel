<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title', 'Home') &mdash; {{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(Request::segment(2)==null)
        @if (file_exists(public_path().'/css/'.Request::segment(1).'/'.Request::segment(1).'.css'))
            <link rel="stylesheet" href="{{ mix('css/'.Request::segment(1).'/'.Request::segment(1).'.css') }}">
        @endif
    @else
        @if(Request::segment(3)==null)
            @if (file_exists(public_path().'/css/'.Request::segment(1).'/'.str_replace('-','_', Request::segment(2)).'/'.str_replace('-','_', Request::segment(2)).'.css'))
                <link rel="stylesheet" href="{{ mix('css/'.Request::segment(1).'/'.str_replace('-','_', Request::segment(2)).'/'.str_replace('-','_', Request::segment(2)).'.css') }}">
            @endif
        @else
            @if (file_exists(public_path().'/css/'.Request::segment(1).'/'.str_replace('-','_', Request::segment(2)).'/'.str_replace('-','_', Request::segment(3)).'.css'))
                <link rel="stylesheet" href="{{ mix('css/'.Request::segment(1).'/'.str_replace('-','_', Request::segment(2)).'/'.str_replace('-','_', Request::segment(3)).'.css') }}">
            @endif
        @endif
    @endif
    <link rel="stylesheet" href="{{ mix('css/dashboard/app.css') }}">

    @stack('stylesheet')
</head>

<body>
    <div id="app">
        @yield('app')
    </div>

    <script src="{{ mix('js/dashboard/manifest.js') }}"></script>
    <script src="{{ mix('js/dashboard/vendor.js') }}"></script>
    <script src="{{ mix('js/dashboard/app.js') }}"></script>
    @stack('modal')

    @if(Request::segment(2)==null)
        @if (file_exists(public_path().'/js/'.Request::segment(1).'/'.Request::segment(1).'.js'))
            <script src="{{ mix('js/'.Request::segment(1).'/'.Request::segment(1).'.js') }}"></script>
        @endif
    @else
        @if(Request::segment(3)==null)
            @if (file_exists(public_path().'/js/'.Request::segment(1).'/'.str_replace('-','_', Request::segment(2)).'/'.str_replace('-','_', Request::segment(2)).'.js'))
                <script src="{{ mix('js/'.Request::segment(1).'/'.str_replace('-','_', Request::segment(2)).'/'.str_replace('-','_', Request::segment(2)).'.js') }}"></script>
            @endif
        @else
            @if (file_exists(public_path().'/js/'.Request::segment(1).'/'.str_replace('-','_', Request::segment(2)).'/'.str_replace('-','_', Request::segment(3)).'.js'))
                <script src="{{ mix('js/'.Request::segment(1).'/'.str_replace('-','_', Request::segment(2)).'/'.str_replace('-','_', Request::segment(3)).'.js') }}"></script>
            @endif
        @endif
    @endif
    @if (session('message'))
        <script>
            Swal.fire(
                "<?php echo session('message')['status'] ?>",
                "<?php echo session('message')['message'] ?>",
                "<?php echo session('message')['status'] ?>",
            );
        </script>
    @endif
    @stack('javascript')
</body>
</html>
