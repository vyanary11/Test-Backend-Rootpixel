@push('css')
    <link rel="stylesheet" href="{{asset('vendor/OwlCarousel2-2.3.4/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/OwlCarousel2-2.3.4/css/owl.theme.default.min.css')}}">
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
@endpush
<div class="bg-gray-200 py-10">
    <div class="flex flex-wrap justify-center">
        <div class="w-full lg:w-6/12 w-12/12 text-center py-10">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-semibold text-center font-bold uppercase">Pelanggan yang berbahagia</h2>
            <p class="text-gray-600 text-center px-10">Tailwind Starter Kit comes with a huge number of Fully Coded CSS components.</p>
        </div>
    </div>
    <div class="max-w-6xl mx-auto px-8">
        <div class="owl-carousel owl-theme relative">
            @foreach ($testimonials as $testimonial)
                <div class="relative lg:flex rounded-lg shadow-2xl overflow-hidden">
                    <div class="h-56 lg:h-auto lg:w-5/12 relative flex items-center justify-center">
                        <img class="absolute h-full w-full object-cover" src="https://stripe.com/img/v3/payments/overview/photos/slack.jpg" alt="" />
                        <div class="absolute inset-0 bg-pink-900 opacity-75"></div>
                    </div>
                    <div class="relative lg:w-7/12 bg-white">
                        <svg class="absolute h-full text-white w-24 -ml-12" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <polygon points="50,0 100,0 50,100 0,100"/>
                        </svg>
                        <div class="relative py-12 lg:py-24 px-8 lg:px-16 text-gray-700 leading-relaxed">
                            <p>
                                As <strong class="text-gray-900 font-medium">Slack</strong> grows rapidly, using Stripe helps them scale payments easily &mdash; supporting everything from getting paid by users around the world to enabling ACH payments for corporate customers.
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@push('javascript')
    <script src="{{asset('vendor/OwlCarousel2-2.3.4/js/owl.carousel.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                nav: true,
                navText: [
                    '<div class="absolute inset-y-0 left-0 lg:flex lg:items-center">'+
                        '<button type="button" role="presentation" class="mt-24 lg:mt-0 -ml-6 h-12 w-12 rounded-full bg-white p-3 shadow-lg">'+
                            '<svg class="h-full w-full text-pink-900" fill="currentColor" viewBox="0 0 24 24">'+
                                '<path d="M5.41 11H21a1 1 0 0 1 0 2H5.41l5.3 5.3a1 1 0 0 1-1.42 1.4l-7-7a1 1 0 0 1 0-1.4l7-7a1 1 0 0 1 1.42 1.4L5.4 11z"/>'+
                            '</svg>'+
                        '</button>'+
                    '</div>',
                    '<div class="absolute inset-y-0 right-0 lg:flex lg:items-center">'+
                        '<button type="button" role="presentation" class="mt-24 lg:mt-0 -mr-6 h-12 w-12 rounded-full bg-white p-3 shadow-lg">'+
                            '<svg class="h-full w-full text-pink-900" fill="currentColor" viewBox="0 0 24 24">'+
                                '<path d="M18.59 13H3a1 1 0 0 1 0-2h15.59l-5.3-5.3a1 1 0 1 1 1.42-1.4l7 7a1 1 0 0 1 0 1.4l-7 7a1 1 0 0 1-1.42-1.4l5.3-5.3z"/>'+
                            '</svg>'+
                        '</button>'+
                    '</div>'
                ],
                items:1,
                loop:true,
                margin:10,
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause:true
            });
        });
    </script>
@endpush
