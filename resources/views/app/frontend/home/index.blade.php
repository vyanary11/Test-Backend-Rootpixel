@extends('layouts.frontend.app')

@section('content')
    @include('app.frontend.home.sections.hero')
    <section class="2xl:pt-96 xl:pt-44 lg:pt-16 md:pt-8 bg-blue-50">
        <div class="bg-blue-50 sm:py-12 md:py-16 lg:py-24">
            <div class="container mx-auto">
                <div class="mb-10">
                    <h1 class="xl:text-5xl pt-4 xl:pt-0 text-3xl text-gray-800 text-center font-extrabold mb-4">Blog Kami</h1>
                    <p class="text-xl text-gray-600 text-center xl:w-3/5 mx-auto w-11/12">Cari inspirasi dengan membaca.</p>
                </div>
                <div class="lg:flex md:flex xl:justify-around sm:flex flex-wrap md:justify-around sm:justify-around lg:justify-around ">
                    @foreach ($blogs as $blog)
                    <div class="xl:w-1/3 sm:w-5/12 sm:max-w-xs relative mb-32 lg:mb-20 xl:max-w-sm lg:w-1/2 w-11/12 mx-auto sm:mx-0 g-white dark:bg-gray-800 overflow-hidden shadow-md rounded-lg">
                        <img class="w-full h-64 object-cover" src="{{asset('/storage/upload/blog/'.$blog->thumbnail)}}" alt="Article">

                        <div class="p-6 bg-white">
                            <div>
                                <span class="text-blue-600 dark:text-blue-400 text-xs font-medium uppercase">{{$blog->tags}}</span>
                                <a href="{{route('frontend.single-blog', ['slug'=> $blog->slug])}}" class="block text-gray-800 dark:text-white font-semibold text-2xl mt-2 hover:text-gray-600 hover:underline">{{$blog->title}}</a>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">{!! substr($blog->content,0,100);!!} . . . </p>
                            </div>

                            <div class="mt-4">
                                <div class="flex items-center">
                                    <div class="flex items-center">
                                        @php
                                            $user = $blog->user()->first();
                                        @endphp
                                        <img class="h-10 object-cover rounded-full" src="{{asset('/storage/upload/user/'.$user->profile_picture)}}" alt="Avatar">
                                        @if ($user)
                                            <a href="#" class="mx-2 text-gray-700 dark:text-gray-200 font-semibold">{{$user->first_name." ".$user->last_name}}</a>
                                        @else
                                            <a href="#" class="mx-2 text-gray-700 dark:text-gray-200 font-semibold">Admin</a>
                                        @endif

                                    </div>
                                    <span class="mx-1 text-gray-600 dark:text-gray-300 text-xs">{{date("d F Y H:i:s", strtotime($blog->created_at))}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div>&nbsp;</div>
                    <a href="{{route('frontend.blog')}}" class="bg-blue-600 transition duration-150 ease-in-out focus:outline-none hover:bg-blue-400 rounded text-white px-4 sm:px-8 py-1 sm:py-3 text-sm">Read More</a>
                </div>
            </div>
        </div>
    </section>
@endsection
