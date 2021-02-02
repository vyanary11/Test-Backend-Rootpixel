@php
     use App\Models\Customer;
@endphp
<nav class="fixed z-50 w-full bg-white top-0 dark:bg-gray-800 shadow">
    <div class="container mx-auto px-6 py-3 md:flex md:justify-between md:items-center">
        <div class="flex justify-between items-center">
            <div>
                <a href="" class="flex title-font font-medium items-center text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-pink-500 rounded-full" viewBox="0 0 24 24">
                      <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    <span class="ml-3 text-xl">D`gawe</span>
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
                <a @if(Request::segment(1)==null) href="#top" @else href="{{route('landing.home')}}" @endif class="my-1 text-md text-gray-700 dark:text-gray-200 font-medium hover:text-pink-500 dark:hover:text-pink-400 md:mx-2 md:my-0" >Home</a>
                @if (Request::segment(1)=="member")

                @elseif(Request::segment(1)=="blog")
                    <a href="{{ route('landing.blog') }}" class="my-1 text-md text-gray-700 dark:text-gray-200 font-medium hover:text-pink-500 dark:hover:text-pink-400 md:mx-2 md:my-0" >Blog</a>
                @else
                    <a href="#fitur" class="my-1 text-md text-gray-700 dark:text-gray-200 font-medium hover:text-pink-500 dark:hover:text-pink-400 md:mx-2 md:my-0">Fitur</a>
                    <a href="#desain" class="my-1 text-md text-gray-700 dark:text-gray-200 font-medium hover:text-pink-500 dark:hover:text-pink-400 md:mx-2 md:my-0">Desain</a>
                    <a href="#harga" class="my-1 text-md text-gray-700 dark:text-gray-200 font-medium hover:text-pink-500 dark:hover:text-pink-400 md:mx-2 md:my-0">Harga</a>
                    <a href="{{ route('landing.blog') }}" class="my-1 text-md text-gray-700 dark:text-gray-200 font-medium hover:text-pink-500 dark:hover:text-pink-400 md:mx-2 md:my-0">Blog</a>
                @endif
            </div>
            @auth('member')
                @php
                    $user = Auth::guard('member')->user();
                    $data_user = Customer::where('user_id', $user->id)->first();
                @endphp
                <div class="relative inline-flex align-middle w-full">
                    <a class="my-1 text-md text-gray-700 dark:text-gray-200 font-medium hover:text-pink-500 dark:hover:text-pink-400 md:mx-2 md:my-0 cursor-pointer" onclick="openDropdown(event,'dropdown-id')">
                      Hy, {{$data_user->first_name." ".$data_user->last_name}}
                      <i class="fas fa-sort-down" aria-hidden="true"></i>
                    </a>
                    <div class="hidden bg-white  text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-4" style="min-width:12rem" id="dropdown-id">
                        <a href="{{route("member.home")}}" class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800">
                            <i class="fa fa-home" aria-hidden="true"></i> Member Area
                        </a>
                        <a href="{{route("member.profile")}}" class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800">
                            <i class="fas fa-user-circle" aria-hidden="true"></i> Profile
                        </a>
                        <div class="h-0 my-2 border border-solid border-t-0 border-gray-900 opacity-25"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="#" class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800" onclick="event.preventDefault();this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{url('member/login')}}" class="py-2 px-4 hover:bg-pink-600 border-pink-600 border-2 focus:ring-pink-500 focus:ring-offset-pink-200 hover:text-white text-pink-600 w-full transition ease-in duration-200 text-center text-base font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2">
                    Login
                </a>
                <a href="{{url('member/register')}}" class="md:mx-2 my-2 py-2 px-4 bg-pink-600 border-pink-600 hover:border-pink-700 border-2 hover:bg-pink-700 focus:ring-pink-500 focus:ring-offset-pink-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2">
                    Daftar
                </a>
            @endauth
        </div>
    </div>
</nav>

@push('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js" charset="utf-8"></script>
    <script>
        function toggleNavbar(collapseID){
            document.getElementById(collapseID).classList.toggle("hidden");
            document.getElementById(collapseID).classList.toggle("flex");
            document.getElementById(collapseID).classList.toggle("flex-col");
        }
        function openDropdown(event,dropdownID){
            let element = event.target;
                while(element.nodeName !== "A"){
                element = element.parentNode;
            }
            var popper = new Popper(element, document.getElementById(dropdownID), {
                placement: 'bottom-start'
            });
            document.getElementById(dropdownID).classList.toggle("hidden");
            document.getElementById(dropdownID).classList.toggle("block");
        }
    </script>
@endpush
