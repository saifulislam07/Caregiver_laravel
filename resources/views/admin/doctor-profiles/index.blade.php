@extends('adminlte::page')

@section('title', 'Manage Doctors')

@section('content_header')
    <h1>Doctors</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Doctor List</h3>
            <div class="card-tools">
                <a href="{{ route('doctor-profiles.create') }}" class="btn btn-primary btn-sm">Add New Doctor</a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>BMDC #</th>
                        <th>Fee</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($doctors as $doctor)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $doctor->user->name }}</td>
                        <td>{{ $doctor->department->name ?? 'N/A' }}</td>
                        <td>{{ $doctor->bmdc_number }}</td>
                        <td>{{ $doctor->consultation_fee }}</td>
                        <td>
                            <a href="{{ route('doctor-profiles.edit', $doctor->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <form action="{{ route('doctor-profiles.destroy', $doctor->id) }}" method="POST" style="display:inline;">
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
