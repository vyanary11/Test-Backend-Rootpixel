@extends('layouts.dashboard.skeleton')

@section('app')
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            @include('partials.dashboard.navbar')
        </nav>
        <div class="main-sidebar sidebar-style-2">
            @include('partials.dashboard.sidebar')
        </div>

        <!-- Main Content -->
        <div class="main-content">
            @if (Request::segment(2)=="")
                @yield('content')
            @else
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('title')</h1>
                        <div class="section-header-breadcrumb">
                            @if(Request::segment(2)=="")
                                <div class="breadcrumb-item active">Dashboard</div>
                            @elseif(Request::segment(3)=="")
                                <div class="breadcrumb-item"><a href="{{ url(Request::segment(1)) }}">Dashboard</a></div>
                                <div class="breadcrumb-item active">{{ ucwords(str_replace("-", " ",Request::segment(2))) }}</div>
                            @else
                                <div class="breadcrumb-item"><a href="{{ url(Request::segment(1)) }}">Dashboard</a></div>
                                <div class="breadcrumb-item"><a href="{{ url(Request::segment(1)."/".Request::segment(2)) }}">{{ ucwords(str_replace("-", " ",Request::segment(2))) }}</a></div>
                                <div class="breadcrumb-item active">{{ ucwords(str_replace("-", " ",Request::segment(3))) }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>
            @endif
        </div>
        <footer class="main-footer">
            @include('partials.dashboard.footer')
        </footer>
    </div>
@endsection
