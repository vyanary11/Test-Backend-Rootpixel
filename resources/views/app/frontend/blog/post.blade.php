@extends('layouts.frontend.app')

@section('content')
<section class="relative py-28 bg-gray-100">
    <nav class="w-full md:w-2/3 text-black font-bold items-center mx-auto py-4" aria-label="Breadcrumb">
        <ol class="list-none p-0 inline-flex">
            <li class="flex items-center">
                <a href="{{route('frontend.home')}}">Home</a>
                <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
            </li>
            <li class="flex items-center">
                <a href="{{route('frontend.blog')}}">Blog</a>
                <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
            </li>
            <li>
                <a href="#" class="text-gray-500" aria-current="page">{{$blog->title}}</a>
            </li>
        </ol>
    </nav>
    <!-- Post Section -->
    <div class="w-full md:w-2/3 flex flex-col items-center mx-auto">

        <article class="flex flex-col shadow my-4">
            <!-- Article Image -->
            <a href="#" class="hover:opacity-75">
                <img src="{{asset('/storage/upload/blog/'.$blog->thumbnail)}}" alt="Article">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                <ol class="list-none p-0 inline-flex">
                    @php
                        $tags = explode(",", $blog->tags)
                    @endphp
                    @foreach ($tags as $tag)
                    <li class="flex items-center">
                        <a href="{{url('blog?tags='.$tag.'')}}" class="text-blue-700 text-sm font-bold uppercase">{{$tag}}</a>
                        @if(next($tags))
                            <span class="text-blue-700 text-sm font-bold uppercase">,&nbsp;</span>
                        @endif
                    </li>
                    @endforeach
                </ol>

                <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{$blog->title}}</a>
                <p href="#" class="text-sm pb-8">
                    @php
                        $user = $blog->user()->first();
                    @endphp
                    @if ($user)
                        Created By <a href="#" class="font-semibold hover:text-gray-800">{{$user->first_name." ".$user->last_name}}</a>, Created At {{date('d F Y', strtotime($blog->created_at))}}
                    @else
                        Created By <a href="#" class="font-semibold hover:text-gray-800">Admin</a>, Created At {{date('d F Y', strtotime($blog->created_at))}}
                    @endif

                </p>
                {!!$blog->content!!}
            </div>
        </article>

        <div class="w-full flex pt-6">
            @if ($previous_blog->count()!=0)
                <a href="{{route('frontend.single-blog', ['slug' => $previous_blog->first()->slug])}}" class="w-1/2 bg-white shadow hover:shadow-md text-left p-6">
                    <p class="text-lg text-blue-800 font-bold flex items-center"><svg class="svg-inline--fa fa-arrow-left fa-w-14 pr-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z"></path></svg><!-- <i class="fas fa-arrow-left pr-1"></i> --> Sebelumnya</p>
                    <p class="pt-2">{{$previous_blog->first()->title}}</p>
                </a>
            @else
                <div class="text-left w-1/2">&nbsp;</div>
            @endif
            @if ($next_blog->count()!=0)
                <a href="{{route('frontend.single-blog', ['slug' => $next_blog->first()->slug])}}" class="w-1/2 bg-white shadow hover:shadow-md text-right p-6">
                    <p class="text-lg text-blue-800 font-bold flex items-center justify-end">Selanjutnya <svg class="svg-inline--fa fa-arrow-right fa-w-14 pl-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"></path></svg><!-- <i class="fas fa-arrow-right pl-1"></i> --></p>
                    <p class="pt-2">{{$next_blog->first()->title}}</p>
                </a>
            @else
                <div class="text-right w-1/2">&nbsp;</div>
            @endif
        </div>

    </div>
</section>
@endsection
