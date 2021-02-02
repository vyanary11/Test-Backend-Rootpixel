@extends('layouts.frontend.skeleton')

@section('app')
    @include('partials.frontend.navbar')
    @yield('content')
    @include('partials.frontend.footer')
@endsection
