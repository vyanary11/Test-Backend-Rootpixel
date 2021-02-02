<section class="2xl:pt-96 xl:pt-44 lg:pt-16 md:pt-8 bg-pink-50">
    <div class="bg-pink-50 sm:py-12 md:py-16 lg:py-24" id="fitur">
        <div class="container mx-auto">
            <div class="flex flex-wrap items-center">
                <div class="w-full md:w-12/12 px-4">
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full lg:w-6/12 w-12/12 text-center py-10">
                            <h2 class="text-2xl sm:text-3xl md:text-4xl font-semibold text-center font-bold uppercase">Fitur - fitur undangan digital</h2>
                            <p class="text-gray-600 text-center px-10">Tailwind Starter Kit comes with a huge number of Fully Coded CSS components.</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap">
                        @foreach ($features as $feature)
                        <div class="flex items-center w-full lg:w-4/12 md:w-6/12 px-4 mx-auto pb-6 mb-4 sm:flex-row flex-col">
                            <div data-aos="fade-up" data-aos-duration="2000" class="w-20 h-20 sm:mr-4 inline-flex items-center justify-center rounded-full shadow-lg bg-white flex-shrink-0">
                                <i class="{{$feature->icon}} fa-3x text-pink-500"></i>
                            </div>
                            <div class="flex-grow sm:text-left text-center sm:mt-0 mt-6">
                                <h2 data-aos="fade-up" data-aos-delay="100" data-aos-duration="2000" class="text-gray-900 text-lg title-font font-medium mb-1">{{$feature->name}}</h2>
                                <p data-aos="fade-up" data-aos-delay="200" data-aos-duration="2000" class="leading-relaxed text-base text-gray-600">{{$feature->description}}</p>
                            </div>
                            {{-- <div class="relative flex flex-col">
                                <div class="px-4 py-5 flex-auto">
                                    <div data-aos="fade-up" class="text-gray-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-5 shadow-lg rounded-full bg-white">
                                        <i class="{{$feature->icon}} fa-2x text-pink-500"></i>
                                    </div>
                                    <h6 data-aos="fade-up" data-aos-delay="100" class="text-xl mb-1 font-semibold">{{$feature->name}}</h6>
                                    <p data-aos="fade-up" data-aos-delay="200" class="mb-4 text-gray-600">{{$feature->description}}</p>
                                </div>
                            </div> --}}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-gray-600 body-font bg-white">
        <div class="container px-5 py-24 mx-auto flex flex-wrap">
            <div class="flex flex-wrap w-full">
                <div class="lg:w-2/5 md:w-1/2 md:pr-10 md:py-6 md:justify-center">
                    <div class="flex relative pb-12">
                        <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                        </div>
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-pink-500 inline-flex items-center justify-center text-white relative z-10">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                        </div>
                        <div class="flex-grow pl-4">
                        <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">STEP 1</h2>
                        <p class="leading-relaxed">VHS cornhole pop-up, try-hard 8-bit iceland helvetica. Kinfolk bespoke try-hard cliche palo santo offal.</p>
                        </div>
                    </div>
                    <div class="flex relative pb-12">
                        <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                        <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                        </div>
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-pink-500 inline-flex items-center justify-center text-white relative z-10">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                        </svg>
                        </div>
                        <div class="flex-grow pl-4">
                        <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">STEP 2</h2>
                        <p class="leading-relaxed">Vice migas literally kitsch +1 pok pok. Truffaut hot chicken slow-carb health goth, vape typewriter.</p>
                        </div>
                    </div>
                    <div class="flex relative pb-12">
                        <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                        <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                        </div>
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-pink-500 inline-flex items-center justify-center text-white relative z-10">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                            <circle cx="12" cy="5" r="3"></circle>
                            <path d="M12 22V8M5 12H2a10 10 0 0020 0h-3"></path>
                        </svg>
                        </div>
                        <div class="flex-grow pl-4">
                        <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">STEP 3</h2>
                        <p class="leading-relaxed">Coloring book nar whal glossier master cleanse umami. Salvia +1 master cleanse blog taiyaki.</p>
                        </div>
                    </div>
                    <div class="flex relative pb-12">
                        <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                        <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                        </div>
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-pink-500 inline-flex items-center justify-center text-white relative z-10">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        </div>
                        <div class="flex-grow pl-4">
                        <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">STEP 4</h2>
                        <p class="leading-relaxed">VHS cornhole pop-up, try-hard 8-bit iceland helvetica. Kinfolk bespoke try-hard cliche palo santo offal.</p>
                        </div>
                    </div>
                    <div class="flex relative">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-pink-500 inline-flex items-center justify-center text-white relative z-10">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                            <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                            <path d="M22 4L12 14.01l-3-3"></path>
                        </svg>
                        </div>
                        <div class="flex-grow pl-4">
                        <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">FINISH</h2>
                        <p class="leading-relaxed">Pitchfork ugh tattooed scenester echo park gastropub whatever cold-pressed retro.</p>
                        </div>
                    </div>
                </div>
                <img class="lg:w-3/5 md:w-1/2 lg:block hidden object-cover object-center rounded-lg md:mt-0 mt-12" src="https://dummyimage.com/1200x500" alt="step">
            </div>
        </div>
    </div>
</section>
