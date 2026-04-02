@extends('adminlte::page')

@section('title', 'Add New Health Package')

@section('content_header')
    <h1>Add New Health Package</h1>
@stop

@section('content')
    <div class="card card-primary">
        <form action="{{ route('packages.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Package Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Annual Wellness" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" step="0.01" placeholder="5000" required>
                </div>
                <div class="form-group">
                    <label for="features">Features (Comma separated)</label>
                    <textarea name="features" class="form-control" rows="5" placeholder="Feature 1, Feature 2, Feature 3" required></textarea>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create Package</button>
            </div>
        </form>
    </div>
@stop
