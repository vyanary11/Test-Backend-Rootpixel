<section class="leading-7 text-gray-900 bg-pink-50 sm:py-12 md:py-16 lg:py-24" id="harga">
    <div class="box-border px-4 mx-auto border-solid sm:px-6 md:px-6 lg:px-8 max-w-7xl py-6">
        <div class="flex flex-col items-center leading-7 text-center text-gray-900 border-0 border-gray-200 mb-12">
            <h2 class="box-border m-0 text-3xl font-semibold leading-tight tracking-tight text-black border-solid sm:text-4xl md:text-5xl">
                Paket Harga
            </h2>
            <p class="text-gray-600 text-center mt-2 px-10">Pilih paket harga sesuai kebutuhan anda.</p>
        </div>
        <div class="grid grid-cols-1 gap-4 mt-4 leading-7 text-gray-900 border-0 border-gray-200 sm:mt-6 sm:gap-6 md:mt-8 md:gap-0 lg:grid-cols-3">
            <!-- Price 1 -->
            @php $counter=0; @endphp
            @foreach($packages as $package)
                @php $counter++; @endphp
                <div data-aos="zoom-in-up" data-aos-duration="2000" class="bg-white shadow box-border flex flex-col items-center max-w-md p-4 mx-auto my-0 @if ($counter%2!=0) border border-solid rounded-md sm:my-0 sm:p-6 md:my-8 md:p-8 @else border-4 border-pink-600 border-solid rounded-md sm:p-6 md:px-8 md:py-16 @endif">
                    @if ($counter%2==0)
                        <span class="bg-pink-600 text-white px-3 py-1 tracking-widest text-xs absolute right-0 top-0 rounded-bl">
                            Best Seller
                        </span>
                    @endif
                    <h3 class="m-0 text-2xl font-semibold leading-tight tracking-tight text-black border-0 border-gray-200 sm:text-3xl md:text-4xl">
                        {{$package->name}}
                    </h3>
                    <div class="flex items-end mt-6 leading-7 text-gray-900 border-0 border-gray-200">
                        <p class="box-border m-0 text-6xl font-semibold leading-none border-solid">
                            Rp. {{price_number($package->price)}}
                        </p>
                        <p class="box-border m-0 border-solid" style="border-image: initial;">
                            / Tamu
                        </p>
                    </div>
                    <p class="mt-6 mb-5 text-base leading-normal text-left text-gray-900 border-0 border-gray-200">
                        Ideal for Startups and Small Companies
                    </p>
                    <ul class="flex-1 p-0 mt-4 ml-5 leading-7 text-gray-900 border-0 border-gray-200">
                        @foreach ($package->details()->get() as $detail)
                        <li class="inline-flex items-center block w-full mb-2 ml-5 font-semibold text-left border-solid">
                            <svg class="w-5 h-5 mr-2 font-semibold leading-7 text-pink-600 sm:h-5 sm:w-5 md:h-6 md:w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            {!!$detail->detail!!}
                        </li>
                        @endforeach
                    </ul>
                    @if ($counter%2!=0)
                        <a class="inline-flex justify-center w-full px-4 py-3 mt-8 font-sans text-sm leading-none text-center text-pink-600 no-underline bg-transparent border border-pink-600 rounded cursor-pointer hover:bg-pink-700 hover:border-pink-700 hover:text-white focus-within:bg-pink-700 focus-within:border-pink-700 focus-within:text-white sm:text-base md:text-lg">
                            Daftar Sekarang
                        </a>
                    @else
                        <a class="inline-flex justify-center w-full px-4 py-3 mt-8 font-sans text-sm leading-none text-center text-white no-underline bg-pink-600 border rounded cursor-pointer hover:bg-pink-700 hover:border-pink-700 hover:text-white focus-within:bg-pink-700 focus-within:border-pink-700 focus-within:text-white sm:text-base md:text-lg">
                            Daftar Sekarang
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
