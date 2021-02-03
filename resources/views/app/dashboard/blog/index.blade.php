@extends('layouts.dashboard.app')

@section('title', 'List Blog')

@section('content')
<input type="hidden" id="status" value="">
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a href="#" id="filter_active" data-filter="" class="nav-link active" onclick="filterDataTable(this)">All <span class="badge badge-white" id="all">0</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-filter="draft" onclick="filterDataTable(this)">Draft <span class="badge badge-primary" id="draft">0</span></a>
                    </li>
                    <li class="nav-item">
                        <a  href="#" class="nav-link" data-filter="published" onclick="filterDataTable(this)">Published <span class="badge badge-primary" id="published">0</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-filter="archived" onclick="filterDataTable(this)">Archived <span class="badge badge-primary" id="archived">0</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="float-left mr-3">
                    <a href="{{route("dashboard.blog.create")}}" class="btn btn-primary">Create Blog</a>
                </div>
                <div class="float-left">
                    <select id="action-selected" class="form-control selectric">
                        <option value="">Action For Selected</option>
                        <option value="draft">Move to Draft</option>
                        <option value="published">Move to Publish</option>
                        <option value="archived">Move to Archive</option>
                        <option value="delete">Delete Pemanently</option>
                    </select>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="data-table">
                        <thead>
                            <tr>
                                <th class="text-center pt-2">
                                    <div class="custom-checkbox custom-checkbox-table custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
