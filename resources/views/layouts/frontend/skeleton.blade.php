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
        <title>Home | Tailwind Starter Kit by Creative Tim</title>
    </head>
    <body>
        <div id="app">
            @yield('app')
        </div>
    </body>
    <script src="{{ mix('js/dashboard/manifest.js') }}"></script>
    <script src="{{ mix('js/dashboard/vendor.js') }}"></script>
    <script src="{{ mix('js/frontend/app.js') }}"></script>
    <script>
        $(document).ready(function(){
            $(document).on("scroll", onScroll);
            $('a[href*="#"]:not([href="#"])').click(function () {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    $(document).off("scroll");
                    $('a[href*="#"]:not([href="#"])').each(function () {
                        $(this).removeClass('text-pink-500');
                        $(this).addClass('text-gray-700');
                    })
                    $(this).addClass('text-pink-500');
                    $(this).removeClass('text-gray-700');
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 500, 'swing', function () {
                            $(document).on("scroll", onScroll);
                        });
                        return false;
                    }
                }
            });

            function onScroll(event){
                var scrollPos = $(document).scrollTop();
                $('#menu a[href*="#"]:not([href="#"])').each(function () {
                    var currLink = $(this);
                    var refElement = $(currLink.attr("href"));
                    if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                        $('#menu div li a[href*="#"]:not([href="#"])').removeClass("text-pink-500");
                        $('#menu div li a[href*="#"]:not([href="#"])').addClass('text-gray-700');
                        currLink.addClass("text-pink-500");
                        currLink.removeClass("text-gray-700");
                    }
                    else{
                        currLink.removeClass("text-pink-500");
                        currLink.addClass("text-gray-700");
                    }
                });
            }
        });

    </script>
    @stack('javascript')
</html>
