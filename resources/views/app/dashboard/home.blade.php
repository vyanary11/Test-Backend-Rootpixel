@php
    $user = Auth::user();
@endphp
@extends('layouts.dashboard.app')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Admin</h4>
                    </div>
                    <div class="card-body">
                        {{$user_count}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Blogs</h4>
                    </div>
                    <div class="card-body">
                        {{$blog_count}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-4">
            <div class="hero bg-primary text-white">
                <div class="hero-inner">
                <h2>Welcome Back, {{$user->first_name." ".$user->last_name}}!</h2>
                <p class="lead">This page is a place to manage blogs.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
