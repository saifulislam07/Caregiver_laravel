@extends('adminlte::page')

@section('title', 'Edit Caregiver')

@section('content_header')
    <h1>Edit Caregiver Details</h1>
@stop

@section('content')
    <div class="card card-info">
        <form action="{{ route('caregivers.update', $caregiver->id) }}" method="POST">
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
                            <input type="text" name="name" class="form-control" value="{{ $caregiver->user->name }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" value="{{ $caregiver->user->email }}" required>
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
                <h3 class="card-title">Service Details</h3>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="speciality">Speciality</label>
                            <input type="text" name="speciality" class="form-control" value="{{ $caregiver->speciality }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="experience">Experience</label>
                            <input type="text" name="experience" class="form-control" value="{{ $caregiver->experience }}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="bio">Bio / Short Description</label>
                            <textarea name="bio" class="form-control" rows="3" required>{{ $caregiver->bio }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Availability</label>
                            <select name="availability" class="form-control">
                                <option value="1" {{ $caregiver->availability ? 'selected' : '' }}>Available</option>
                                <option value="0" {{ !$caregiver->availability ? 'selected' : '' }}>Busy</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-info">Update Caregiver Account</button>
            </div>
        </form>
    </div>
@stop
