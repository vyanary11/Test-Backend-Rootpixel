@extends('layouts.landing.app')

@section('content')
    @include('app.landing.home.sections.hero')
    @include('app.landing.home.sections.feature')
    @include('app.landing.home.sections.howitwork')
    @include('app.landing.home.sections.design')
    @include('app.landing.home.sections.pricing')
    @include('app.landing.home.sections.testimonial')
@endsection
