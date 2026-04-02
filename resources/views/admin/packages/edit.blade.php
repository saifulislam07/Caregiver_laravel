@extends('adminlte::page')

@section('title', 'Edit Health Package')

@section('content_header')
    <h1>Edit Health Package</h1>
@stop

@section('content')
    <div class="card card-info">
        <form action="{{ route('packages.update', $package->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Package Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $package->name }}" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" step="0.01" value="{{ $package->price }}" required>
                </div>
                <div class="form-group">
                    <label for="features">Features (Comma separated)</label>
                    <textarea name="features" class="form-control" rows="5" required>{{ is_array($package->features) ? implode(', ', $package->features) : '' }}</textarea>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-info">Update Package</button>
            </div>
        </form>
    </div>
@stop
