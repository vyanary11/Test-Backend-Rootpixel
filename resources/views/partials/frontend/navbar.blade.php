<nav class="fixed z-50 w-full bg-white top-0 dark:bg-gray-800 shadow">
    <div class="container mx-auto px-6 py-3 md:flex md:justify-between md:items-center">
        <div class="flex justify-between items-center">
            <div>
                <a href="" class="flex title-font font-medium items-center text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-blue-500 rounded-full" viewBox="0 0 24 24">
                      <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    <span class="ml-3 text-xl">{{"Simple Blog"}}</span>
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="flex md:hidden">
                <button type="button" onclick="toggleNavbar('menu')" class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400" aria-label="toggle menu">
                    <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                        <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
        <div id="menu" class="md:flex md:flex-row md:items-center hidden">
            <div class="flex flex-col md:flex-row md:mx-6 md:my-0 my-4">
                <a href="{{ route('frontend.home') }}" class="my-1 text-md text-gray-700 dark:text-gray-200 font-medium hover:text-blue-500 dark:hover:text-blue-400 md:mx-2 md:my-0" >Home</a>
                <a href="{{ route('frontend.blog') }}" class="my-1 text-md text-gray-700 dark:text-gray-200 font-medium hover:text-blue-500 dark:hover:text-blue-400 md:mx-2 md:my-0" >Blog</a>
                <a href="{{ route('frontend.blog') }}" class="my-1 text-md text-gray-700 dark:text-gray-200 font-medium hover:text-blue-500 dark:hover:text-blue-400 md:mx-2 md:my-0" >Privacy & Police</a>
                <a href="{{ route('frontend.blog') }}" class="my-1 text-md text-gray-700 dark:text-gray-200 font-medium hover:text-blue-500 dark:hover:text-blue-400 md:mx-2 md:my-0" >Disclaimer</a>
                <a href="{{ route('frontend.blog') }}" class="my-1 text-md text-gray-700 dark:text-gray-200 font-medium hover:text-blue-500 dark:hover:text-blue-400 md:mx-2 md:my-0" >About Us</a>
            </div>
        </div>
    </div>
</nav>
