@extends('adminlte::page')

@section('title', 'Add New Doctor')

@section('content_header')
    <h1>Add New Doctor</h1>
@stop

@section('content')
    <div class="card card-primary">
        <form action="{{ route('doctor-profiles.store') }}" method="POST">
            @csrf
            <div class="card-header">
                <h3 class="card-title">User Account Info</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Dr. John Doe" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="doctor@example.com" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" required>
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
                                    <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="qualification">Qualification</label>
                            <input type="text" name="qualification" class="form-control" placeholder="MBBS, FCPS">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bmdc_number">BMDC Number</label>
                            <input type="text" name="bmdc_number" class="form-control" placeholder="A-12345">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="consultation_fee">Consultation Fee</label>
                            <input type="number" name="consultation_fee" class="form-control" placeholder="1000" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="bio">Bio / Short Description</label>
                            <textarea name="bio" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create Doctor Account</button>
            </div>
        </form>
    </div>
@stop
