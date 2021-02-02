@extends('layouts.landing.app')

@section('content')
    <section class="bg-gray-200 relative sm:py-16 md:py-18 lg:py-28" id="top">
        <div class="container mx-auto">
            <div class="mb-10">
                <h1 class="xl:text-5xl pt-4 xl:pt-0 text-3xl text-gray-800 text-center font-extrabold mb-4">Blog Kami</h1>
                <p class="text-xl text-gray-600 text-center xl:w-3/5 mx-auto w-11/12">Cari inspirasi dengan membaca.</p>
            </div>
            <div class="lg:flex md:flex xl:justify-around sm:flex flex-wrap md:justify-around sm:justify-around lg:justify-around ">
                @foreach ($blogs as $blog)
                <div class="xl:w-1/3 sm:w-5/12 sm:max-w-xs relative mb-32 lg:mb-20 xl:max-w-sm lg:w-1/2 w-11/12 mx-auto sm:mx-0 g-white dark:bg-gray-800 overflow-hidden shadow-md rounded-lg">
                    <img class="w-full h-64 object-cover" src="https://images.unsplash.com/photo-1550439062-609e1531270e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="Article">

                    <div class="p-6 bg-white">
                        <div>
                            <span class="text-pink-600 dark:text-pink-400 text-xs font-medium uppercase">{{$blog->tags}}</span>
                            <a href="{{route('landing.single-blog', ['slug'=> $blog->slug])}}" class="block text-gray-800 dark:text-white font-semibold text-2xl mt-2 hover:text-gray-600 hover:underline">{{$blog->title}}</a>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">{!! substr($blog->content,0,100);!!} . . . </p>
                        </div>

                        <div class="mt-4">
                            <div class="flex items-center">
                                <div class="flex items-center">
                                    <img class="h-10 object-cover rounded-full" src="https://images.unsplash.com/photo-1586287011575-a23134f797f9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=48&q=60" alt="Avatar">
                                    <a href="#" class="mx-2 text-gray-700 dark:text-gray-200 font-semibold">{{$blog->admin()->first()->first_name." ".$blog->admin()->first()->last_name}}</a>
                                </div>
                                <span class="mx-1 text-gray-600 dark:text-gray-300 text-xs">{{$blog->created_date}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $blogs->links('vendor.pagination.custom-tailwind') }}
        </div>
    </section>
@endsection
