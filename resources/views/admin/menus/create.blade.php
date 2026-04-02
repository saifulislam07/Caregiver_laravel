@extends('adminlte::page')

@section('title', 'Add New Menu')

@section('content_header')
    <h1>Add New Menu</h1>
@stop

@section('content')
    <div class="card card-primary">
        <form action="{{ route('menus.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Menu Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter menu name" required>
                </div>
                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" name="url" class="form-control" id="url" placeholder="/page-url">
                </div>
                <div class="form-group">
                    <label for="parent_id">Parent Menu</label>
                    <select name="parent_id" class="form-control" id="parent_id">
                        <option value="">None (Top Level)</option>
                        @foreach($parentMenus as $parent)
                            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <select name="location" class="form-control" id="location" required>
                        <option value="header">Header Only</option>
                        <option value="footer">Footer Only</option>
                        <option value="both">Both Header and Footer</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="order_index">Order Index</label>
                    <input type="number" name="order_index" class="form-control" id="order_index" value="0">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="is_active" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@stop
