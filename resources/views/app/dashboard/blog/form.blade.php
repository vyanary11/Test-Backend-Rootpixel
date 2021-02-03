@extends('layouts.dashboard.app')

@if ($edit)
    @section('title', 'Edit Blog')
@else
    @section('title', 'Create Blog')
@endif

@section('content')
    <div class="row">
        <div class="col-12">
            <form @if ($edit) action="{{route("dashboard.blog.update")}}" @else action="{{route("dashboard.blog.store")}}" @endif method="POST" class="needs-validation" novalidate="" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input id="title" class="form-control @error('title') is-invalid @enderror" name="title" @if($edit) value="" @else value="{{ old('title') }}" @endif required autocomplete="title" autofocus>
                            <span class="invalid-feedback" role="alert">
                                <strong>@error('title') {{ $message }} @else The title field is required !! @enderror</strong>
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea id="content" name="content" class="summernote @error('content') is-invalid @enderror" name="title" required autofocus>@if($edit) @else {{ old('content') }} @endif</textarea>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>@error('content') {{ $message }} @else The content field is required !! @enderror</strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="thumbnail">Thumbnail</label>
                                    <div class="custom-file">
                                        <input id="thumbnail" class="custom-file-input @error('thumbnail') is-invalid @enderror" type="file" name="thumbnail" @if(!$edit) required @endif>
                                        <label for="thumbnail" class="custom-file-label">Browse....</label>
                                        <span class="invalid-feedback" role="alert">
                                            <strong>@error('thumbnail') {{ $message }} @else The thumbnail field is required !! @enderror</strong>
                                        </span>
                                    </div>
                                    @if($edit) <img class="img-thumbnail" src="" alt=""> @endif
                                </div>
                                <div class="form-group">
                                    <label>Tags</label>
                                    <input type="text" name="tags" class="form-control inputtags @error('tags') is-invalid @enderror" required>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>@error('tags') {{ $message }} @else The tags field is required !! @enderror</strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" class="form-control selectric @error('status') is-invalid @enderror" name="status" required autofocus>
                                <option value="">--Choose Status--</option>
                                <option @if(old('status')=="draft") selected @endif value="draft">Draft</option>
                                <option @if(old('status')=="published") selected @endif value="published">Publish</option>
                            </select>
                            <span class="invalid-feedback" role="alert">
                                <strong>@error('status') {{ $message }} @else The status field is required !! @enderror</strong>
                            </span>
                        </div>
                    </div>
                    <div class="card-footer bg-whitesmoke text-right">
                        <button class="btn btn-danger btn-lg" type="Reset">Reset</button>

                            <button class="btn btn-lg btn-primary" type="submit">
                                @if ($edit)
                                    Save
                                @else
                                    Update
                                @endif
                            </button>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
