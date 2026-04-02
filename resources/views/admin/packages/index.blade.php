@extends('adminlte::page')

@section('title', 'Manage Health Packages')

@section('content_header')
    <h1>Health Packages</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Package List</h3>
            <div class="card-tools">
                <a href="{{ route('packages.create') }}" class="btn btn-primary btn-sm">Add New Package</a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Features</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($packages as $package)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $package->name }}</td>
                        <td>{{ $package->price }}</td>
                        <td>
                            @if(is_array($package->features))
                                @foreach($package->features as $feature)
                                    <span class="badge badge-info">{{ $feature }}</span>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('packages.edit', $package->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <form action="{{ route('packages.destroy', $package->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
