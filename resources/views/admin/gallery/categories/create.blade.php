@extends('adminlte::page')

@section('title', 'Add New Category')

@section('content_header')
    <h1>Add New Category</h1>
@endsection

@section('content')
    <div class="card">
        <form action="{{ route('gallery-categories.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Category Name" required>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" checked>
                        <label class="custom-control-label" for="is_active">Active</label>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create Category</button>
                <a href="{{ route('gallery-categories.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
@endsection
