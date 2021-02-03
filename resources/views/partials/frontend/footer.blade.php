<footer class="relative text-white bg-blue-600 body-font">
    <div class="w-full relative text-center">
        <a href="#top" class="absolute -mt-6 -ml-6 text-center justify-center items-center w-12 h-12 p-3 capitalize tracking-wide bg-white dark:bg-gray-800 text-blue-600 font-medium rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-300 dark:focus:bg-gray-700">
            <i class="fa fa-arrow-up fa-lg"></i>
        </a>
    </div>
    <div class="container px-5 py-24 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col">
        <div class="w-64 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left">
            <a href="#" class="flex title-font font-medium items-center md:justify-start justify-center text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
                <span class="ml-3 text-xl">Simple Blog</span>
            </a>
            <p class="mt-2 text-sm text-white">Air plant banjo lyft occupy retro adaptogen indego</p>
        </div>
        <div class="flex-grow flex flex-wrap md:pl-20 -mb-10 md:mt-0 mt-10 md:text-left text-center">
            @for ($i = 0; $i < 3; $i++)
                <div class="lg:w-1/3 md:w-1/2 w-full px-4">
                    <h2 class="title-font font-medium text-white tracking-widest text-sm mb-3">Link</h2>
                    <nav class="list-none mb-10">
                        <li>
                            <a href="https://instagram.com/pratamatechnocraft" class="text-white hover:text-gray-200">Portofolio</a>
                        </li>
                        <li>
                            <a href="" class="text-white hover:text-gray-200">About Us</a>
                        </li>
                        <li>
                            <a href="" class="text-white hover:text-gray-200">Privacy & Police</a>
                        </li>
                        <li>
                            <a href="" class="text-white hover:text-gray-200">Disclaimer</a>
                        </li>
                    </nav>
                </div>
            @endfor
        </div>
    </div>
    <div class="bg-gray-100">
        <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row">
            <p class="text-gray-500 text-sm text-center sm:text-left">© 2021 Simple BLog —
                <a href="https://instagram.com/vyanarypratama" rel="noopener noreferrer" class="text-gray-600 ml-1" target="_blank">@vyanarypratama</a>
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-2 justify-center sm:justify-start">
                <a href="https://instagram.com/vyanarypratama" class="ml-3 text-gray-500">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                    </svg>
                </a>
                <a href="https://id.linkedin.com/in/vyan-ary" class="ml-3 text-gray-500">
                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                        <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                        <circle cx="4" cy="4" r="2" stroke="none"></circle>
                    </svg>
                </a>
            </span>
        </div>
    </div>
  </footer>
