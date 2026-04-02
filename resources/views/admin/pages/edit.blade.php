@extends('adminlte::page')

@section('title', 'Edit Page')

@section('content_header')
    <h1>Edit Page</h1>
@stop

@section('content')
    <div class="card card-info">
        <form action="{{ route('pages.update', $page->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Page Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ $page->title }}" required>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" class="form-control" id="content" rows="10">{{ $page->content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" id="meta_title" value="{{ $page->meta_title }}">
                </div>
                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea name="meta_description" class="form-control" id="meta_description" rows="3">{{ $page->meta_description }}</textarea>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="is_active" class="form-control">
                        <option value="1" {{ $page->is_active ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ !$page->is_active ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-info">Update</button>
            </div>
        </form>
    </div>
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
@stop
