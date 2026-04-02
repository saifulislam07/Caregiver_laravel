@extends('adminlte::page')

@section('title', 'SMTP Settings')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">
                <i class="fas fa-paper-plane text-primary mr-2"></i> SMTP Configuration
            </h1>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card card-primary card-outline shadow-sm">
                <div class="card-header border-bottom-0">
                    <h3 class="card-title text-primary"><i class="fas fa-server mr-2"></i>Mail Server Settings</h3>
                </div>
                <form action="{{ route('admin.smtp.update') }}" method="POST">
                    @csrf
                    <div class="card-body bg-light">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="mail_transport" class="font-weight-bold text-secondary">Mail Transport</label>
                                    <input type="text" name="mail_transport" id="mail_transport" class="form-control shadow-sm" value="{{ App\Models\Setting::get('mail_transport', 'smtp') }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="mail_host" class="font-weight-bold text-secondary">Mail Host</label>
                                    <input type="text" name="mail_host" id="mail_host" class="form-control shadow-sm" value="{{ App\Models\Setting::get('mail_host') }}" placeholder="smtp.mailtrap.io">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="mail_port" class="font-weight-bold text-secondary">Mail Port</label>
                                    <input type="number" name="mail_port" id="mail_port" class="form-control shadow-sm" value="{{ App\Models\Setting::get('mail_port', 587) }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="mail_encryption" class="font-weight-bold text-secondary">Mail Encryption</label>
                                    <select name="mail_encryption" id="mail_encryption" class="form-control shadow-sm custom-select">
                                        <option value="tls" {{ App\Models\Setting::get('mail_encryption') == 'tls' ? 'selected' : '' }}>TLS</option>
                                        <option value="ssl" {{ App\Models\Setting::get('mail_encryption') == 'ssl' ? 'selected' : '' }}>SSL</option>
                                        <option value="none" {{ App\Models\Setting::get('mail_encryption') == 'none' ? 'selected' : '' }}>None</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="mail_username" class="font-weight-bold text-secondary">Mail Username</label>
                                    <input type="text" name="mail_username" id="mail_username" class="form-control shadow-sm" value="{{ App\Models\Setting::get('mail_username') }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="mail_password" class="font-weight-bold text-secondary">Mail Password</label>
                                    <input type="password" name="mail_password" id="mail_password" class="form-control shadow-sm" value="{{ App\Models\Setting::get('mail_password') }}">
                                </div>
                            </div>
                        </div>

                        <div class="my-4 border-top border-secondary opacity-25"></div>
                        
                        <div class="mb-4">
                            <h5 class="text-primary"><i class="fas fa-envelope-open-text mr-2"></i>From Address Settings</h5>
                            <p class="text-muted small">Configure the global 'From' address that all outgoing application emails will use.</p>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="mail_from_address" class="font-weight-bold text-secondary">From Email Address</label>
                                    <div class="input-group shadow-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="fas fa-at text-muted"></i></span>
                                        </div>
                                        <input type="email" name="mail_from_address" id="mail_from_address" class="form-control" value="{{ App\Models\Setting::get('mail_from_address') }}" placeholder="noreply@healorahealth.com">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="mail_from_name" class="font-weight-bold text-secondary">From Name</label>
                                    <div class="input-group shadow-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white"><i class="fas fa-user-tag text-muted"></i></span>
                                        </div>
                                        <input type="text" name="mail_from_name" id="mail_from_name" class="form-control" value="{{ App\Models\Setting::get('mail_from_name') }}" placeholder="HealoraHealth Support">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-top text-right py-3">
                        <button type="submit" class="btn btn-primary btn-lg shadow-sm px-5">
                            <i class="fas fa-save mr-2"></i> Update Configuration
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

