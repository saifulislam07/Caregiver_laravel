@extends('adminlte::page')

@section('title', 'Edit Doctor')

@section('content_header')
    <h1>Edit Doctor Profile</h1>
@stop

@section('content')
    <div class="card card-info">
        <form action="{{ route('doctor-profiles.update', $doctor_profile->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-header">
                <h3 class="card-title">User Account Info</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $doctor_profile->user->name }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" value="{{ $doctor_profile->user->email }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password (Leave blank to keep current)</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                </div>

                <hr>
                <h3 class="card-title">Professional Profile</h3>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="department_id">Department</label>
                            <select name="department_id" class="form-control" required>
                                <option value="">Select Department</option>
                                @foreach($departments as $dept)
                                    <option value="{{ $dept->id }}" {{ $doctor_profile->department_id == $dept->id ? 'selected' : '' }}>{{ $dept->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="qualification">Qualification</label>
                            <input type="text" name="qualification" class="form-control" value="{{ $doctor_profile->qualification }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bmdc_number">BMDC Number</label>
                            <input type="text" name="bmdc_number" class="form-control" value="{{ $doctor_profile->bmdc_number }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="consultation_fee">Consultation Fee</label>
                            <input type="number" name="consultation_fee" class="form-control" value="{{ $doctor_profile->consultation_fee }}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="bio">Bio / Short Description</label>
                            <textarea name="bio" class="form-control" rows="3">{{ $doctor_profile->bio }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="is_active" class="form-control">
                                <option value="1" {{ $doctor_profile->is_active ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ !$doctor_profile->is_active ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-info">Update Doctor Profile</button>
            </div>
        </form>
    </div>
@stop
