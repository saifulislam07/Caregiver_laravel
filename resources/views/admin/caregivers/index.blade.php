@extends('adminlte::page')

@section('title', 'Manage Caregivers')

@section('content_header')
    <h1>Caregivers</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Caregiver List</h3>
            <div class="card-tools">
                <a href="{{ route('caregivers.create') }}" class="btn btn-primary btn-sm">Add New Caregiver</a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Speciality</th>
                        <th>Experience</th>
                        <th>Availability</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($caregivers as $caregiver)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $caregiver->user->name }}</td>
                        <td>{{ $caregiver->speciality }}</td>
                        <td>{{ $caregiver->experience }}</td>
                        <td>
                            @if($caregiver->availability)
                                <span class="badge badge-success">Available</span>
                            @else
                                <span class="badge badge-danger">Busy</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('caregivers.edit', $caregiver->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <form action="{{ route('caregivers.destroy', $caregiver->id) }}" method="POST" style="display:inline;">
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
