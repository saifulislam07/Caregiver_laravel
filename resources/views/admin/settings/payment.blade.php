@extends('adminlte::page')

@section('title', 'Payment Settings')

@section('content_header')
    <h1>Payment Account Settings</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="icon fas fa-check"></i> {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.payment.update') }}" method="POST">
                @csrf

                {{-- General Payment Info --}}
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-info-circle"></i> Payment Instruction Text</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="payment_instruction">Instruction shown to patients during booking</label>
                            <textarea name="payment_instruction" id="payment_instruction" class="form-control" rows="3">{{ App\Models\Setting::get('payment_instruction') }}</textarea>
                            <small class="text-muted">This text appears above the payment method selector in the booking form.</small>
                        </div>
                        <div class="form-group">
                            <label for="minimum_advance">Minimum Advance Payment Amount (৳)</label>
                            <div class="input-group" style="max-width: 300px;">
                                <div class="input-group-prepend"><span class="input-group-text">৳</span></div>
                                <input type="number" name="minimum_advance" id="minimum_advance" class="form-control" value="{{ App\Models\Setting::get('minimum_advance', '500') }}" min="100">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- bKash --}}
                <div class="card card-outline card-danger">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-mobile-alt"></i> bKash Account
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bkash_number">bKash Number</label>
                                    <input type="text" name="bkash_number" id="bkash_number" class="form-control" value="{{ App\Models\Setting::get('bkash_number') }}" placeholder="01700-000000">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bkash_account_type">Account Type</label>
                                    <select name="bkash_account_type" id="bkash_account_type" class="form-control">
                                        <option value="Personal" {{ App\Models\Setting::get('bkash_account_type') == 'Personal' ? 'selected' : '' }}>Personal</option>
                                        <option value="Merchant" {{ App\Models\Setting::get('bkash_account_type') == 'Merchant' ? 'selected' : '' }}>Merchant</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Nagad --}}
                <div class="card card-outline card-warning">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-mobile-alt"></i> Nagad Account
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nagad_number">Nagad Number</label>
                                    <input type="text" name="nagad_number" id="nagad_number" class="form-control" value="{{ App\Models\Setting::get('nagad_number') }}" placeholder="01700-000001">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nagad_account_type">Account Type</label>
                                    <select name="nagad_account_type" id="nagad_account_type" class="form-control">
                                        <option value="Personal" {{ App\Models\Setting::get('nagad_account_type') == 'Personal' ? 'selected' : '' }}>Personal</option>
                                        <option value="Merchant" {{ App\Models\Setting::get('nagad_account_type') == 'Merchant' ? 'selected' : '' }}>Merchant</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Bank Transfer --}}
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-university"></i> Bank Transfer Details
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bank_name">Bank Name</label>
                                    <input type="text" name="bank_name" id="bank_name" class="form-control" value="{{ App\Models\Setting::get('bank_name') }}" placeholder="Dutch-Bangla Bank Ltd.">
                                </div>
                                <div class="form-group">
                                    <label for="bank_account_name">Account Name</label>
                                    <input type="text" name="bank_account_name" id="bank_account_name" class="form-control" value="{{ App\Models\Setting::get('bank_account_name') }}" placeholder="HealoraHealth Ltd.">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bank_account_number">Account Number</label>
                                    <input type="text" name="bank_account_number" id="bank_account_number" class="form-control" value="{{ App\Models\Setting::get('bank_account_number') }}" placeholder="1234567890">
                                </div>
                                <div class="form-group">
                                    <label for="bank_routing_number">Routing Number</label>
                                    <input type="text" name="bank_routing_number" id="bank_routing_number" class="form-control" value="{{ App\Models\Setting::get('bank_routing_number') }}" placeholder="090261234">
                                </div>
                                <div class="form-group">
                                    <label for="bank_branch">Branch</label>
                                    <input type="text" name="bank_branch" id="bank_branch" class="form-control" value="{{ App\Models\Setting::get('bank_branch') }}" placeholder="Gulshan Branch, Dhaka">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-right mb-4">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save"></i> Save Payment Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop
