@extends('layouts.dashboard.app')

@section('title', 'Profile')

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{route("dashboard.profile.update")}}" method="POST" class="needs-validation" novalidate="" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="profile_picture">Profile Picture</label>
                                    <div class="custom-file">
                                        <input id="profile_picture" onchange="readURL(this)" class="custom-file-input @error('profile_picture') is-invalid @enderror" type="file" name="profile_picture">
                                        <label for="profile_picture" class="custom-file-label">Browse....</label>
                                        <span class="invalid-feedback" role="alert">
                                            <strong>@error('profile_picture') {{ $message }} @else The profile picture field is required !! @enderror</strong>
                                        </span>
                                    </div>
                                    <img class="img-thumbnail mt-2"  src="{{asset('/storage/upload/user/'.$user->profile_picture)}}" alt="{{$user->first_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input id="first_name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{$user->first_name}}" required autocomplete="first_name" autofocus>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>@error('first_name') {{ $message }} @else The first name field is required !! @enderror</strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input id="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{$user->last_name}}" required autocomplete="last_name" autofocus>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>@error('last_name') {{ $message }} @else The last name field is required !! @enderror</strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>@error('email') {{ $message }} @else The email field is required !! @enderror</strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autofocus>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>@error('password') {{ $message }} @else The password field is required !! @enderror</strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-whitesmoke text-right">
                        <button class="btn btn-danger btn-lg" type="Reset">Reset</button>
                        <button class="btn btn-lg btn-primary" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('javascript')
    <script>
        window.readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.img-thumbnail')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
@endpush
