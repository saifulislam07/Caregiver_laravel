@extends('adminlte::page')

@section('title', 'Add New Caregiver')

@section('content_header')
    <h1>Add New Caregiver</h1>
@stop

@section('content')
    <div class="card card-primary">
        <form action="{{ route('caregivers.store') }}" method="POST">
            @csrf
            <div class="card-header">
                <h3 class="card-title">User Account Info</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="John Doe" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="caregiver@example.com" required>
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
                <h3 class="card-title">Service Details</h3>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="speciality">Speciality</label>
                            <input type="text" name="speciality" class="form-control" placeholder="Nursing, Physiotherapy" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="experience">Experience</label>
                            <input type="text" name="experience" class="form-control" placeholder="5 Years" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="bio">Bio / Short Description</label>
                            <textarea name="bio" class="form-control" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Availability</label>
                            <select name="availability" class="form-control">
                                <option value="1">Available</option>
                                <option value="0">Busy</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create Caregiver Account</button>
            </div>
        </form>
    </div>
@stop
