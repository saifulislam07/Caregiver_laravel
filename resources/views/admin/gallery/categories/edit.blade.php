@extends('adminlte::page')

@section('title', 'Edit Category')

@section('content_header')
    <h1>Edit Category</h1>
@endsection

@section('content')
    <div class="card">
        <form action="{{ route('gallery-categories.update', $galleryCategory->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $galleryCategory->name }}" required>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" {{ $galleryCategory->is_active ? 'checked' : '' }}>
                        <label class="custom-control-label" for="is_active">Active</label>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Category</button>
                <a href="{{ route('gallery-categories.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
@endsection
