@extends('adminlte::page')

@section('title', 'Edit Menu')

@section('content_header')
    <h1>Edit Menu</h1>
@stop

@section('content')
    <div class="card card-info">
        <form action="{{ route('menus.update', $menu->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Menu Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $menu->name }}" required>
                </div>
                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" name="url" class="form-control" id="url" value="{{ $menu->url }}">
                </div>
                <div class="form-group">
                    <label for="parent_id">Parent Menu</label>
                    <select name="parent_id" class="form-control" id="parent_id">
                        <option value="">None (Top Level)</option>
                        @foreach($parentMenus as $parent)
                            <option value="{{ $parent->id }}" {{ $menu->parent_id == $parent->id ? 'selected' : '' }}>{{ $parent->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <select name="location" class="form-control" id="location" required>
                        <option value="header" {{ $menu->location == 'header' ? 'selected' : '' }}>Header Only</option>
                        <option value="footer" {{ $menu->location == 'footer' ? 'selected' : '' }}>Footer Only</option>
                        <option value="both" {{ $menu->location == 'both' ? 'selected' : '' }}>Both Header and Footer</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="order_index">Order Index</label>
                    <input type="number" name="order_index" class="form-control" id="order_index" value="{{ $menu->order_index }}">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="is_active" class="form-control">
                        <option value="1" {{ $menu->is_active ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ !$menu->is_active ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-info">Update</button>
            </div>
        </form>
    </div>
@stop
