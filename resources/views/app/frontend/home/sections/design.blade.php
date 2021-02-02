<section class="relative bg-pink-700 sm:py-12 md:py-16 lg:py-24" id="desain">
    <div class="container mx-auto mb-10">
        <div class="flex flex-wrap items-center justify-center">
            <div class="w-full md:w-12/12 px-4">
                <div class="flex flex-wrap justify-center text-white">
                    <div class="w-full lg:w-6/12 w-12/12 text-center py-10">
                        <h2 class="text-2xl sm:text-3xl md:text-4xl font-semibold text-center font-bold uppercase">Desain undangan digital</h2>
                        <p class="text-center px-10">Tailwind Starter Kit comes with a huge number of Fully Coded CSS components.</p>
                    </div>
                </div>
                <div class="flex flex-wrap">
                    @foreach ($themes as $theme)
                        <div class="lg:w-1/3 sm:w-1/2 p-4">
                            <div class="flex relative">
                                <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center" src="https://dummyimage.com/600x360">
                                <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-pink-100 opacity-0 hover:opacity-100">
                                    {{-- <h2 class="tracking-widest text-sm title-font font-medium text-pink-500 mb-1">THE SUBTITLE</h2> --}}
                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Shooting Stars</h1>
                                    <p class="leading-relaxed">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
                                    <div class="flex mt-4">
                                        <a href="{{ route('landing.single-desain', ['slug' => 'blalalalalalaal']) }}" class="py-2 px-4 mr-2 hover:bg-pink-600 border-pink-600 border-2 focus:ring-pink-500 focus:ring-offset-pink-200 hover:text-white text-pink-600 w-full transition ease-in duration-200 text-center text-base font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2">
                                            Detail
                                        </a>
                                        <a href="" class="py-2 px-4 ml-2 bg-pink-600 border-pink-600 hover:border-pink-700 border-2 hover:bg-pink-700 focus:ring-pink-500 focus:ring-offset-pink-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2">
                                            Demo
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @if (count($themes)>=9)
            <div class="flex mt-10">
                <a href="{{route('landing.desain')}}" class="bg-white py-2 px-4 hover:bg-pink-600 border-pink-600 border-2 focus:ring-pink-500 focus:ring-offset-pink-200 hover:text-white text-pink-600 w-full transition ease-in duration-200 text-center text-base font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2">
                    Lihat selengkapnya
                </a>
            </div>
            @endif
        </div>
    </div>
</section>
