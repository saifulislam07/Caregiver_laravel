@extends('adminlte::page')

@section('title', 'Booking #' . $booking->id)

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Booking Details #{{ $booking->id }}</h1>
        <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to List</a>
    </div>
@endsection

@section('content')
    <div class="row">
        {{-- Left Column: Booking & Patient Details --}}
        <div class="col-lg-8">
            {{-- Booking Info --}}
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-calendar-check"></i> Booking Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th class="text-muted" width="40%">Booking ID</th>
                                    <td><strong>#{{ $booking->id }}</strong></td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Service</th>
                                    <td><strong>{{ $booking->service->name ?? 'N/A' }}</strong></td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Caregiver</th>
                                    <td>{{ $booking->caregiver ? $booking->caregiver->user->name : 'Any Available' }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Booking Date</th>
                                    <td><strong>{{ $booking->booking_date ? $booking->booking_date->format('d M, Y - h:i A') : 'N/A' }}</strong></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th class="text-muted" width="40%">Booking Status</th>
                                    <td>{!! $booking->status_badge !!}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Payment Status</th>
                                    <td>{!! $booking->payment_badge !!}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Submitted On</th>
                                    <td>{{ $booking->created_at->format('d M, Y h:i A') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Patient Info --}}
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-user-injured"></i> Patient Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th class="text-muted" width="40%">Patient Name</th>
                                    <td><strong>{{ $booking->patient_name ?? 'N/A' }}</strong></td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Phone</th>
                                    <td>
                                        @if($booking->patient_phone)
                                            <a href="tel:{{ $booking->patient_phone }}">{{ $booking->patient_phone }}</a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th class="text-muted" width="40%">Address</th>
                                    <td>{{ $booking->patient_address ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Booked By</th>
                                    <td>{{ $booking->user->name }} ({{ $booking->user->email }})</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Payment Info --}}
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-money-bill-wave"></i> Payment Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th class="text-muted" width="40%">Payment Method</th>
                                    <td>
                                        @if($booking->payment_method)
                                            <span class="badge badge-lg badge-primary text-uppercase px-3 py-2" style="font-size: 14px;">
                                                @if($booking->payment_method == 'bkash')
                                                    <i class="fas fa-mobile-alt"></i> bKash
                                                @elseif($booking->payment_method == 'nagad')
                                                    <i class="fas fa-mobile-alt"></i> Nagad
                                                @else
                                                    <i class="fas fa-university"></i> Bank Transfer
                                                @endif
                                            </span>
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Transaction ID</th>
                                    <td><code class="text-lg">{{ $booking->transaction_id ?? 'N/A' }}</code></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th class="text-muted" width="40%">Advance Amount</th>
                                    <td><span class="text-success font-weight-bold" style="font-size: 20px;">৳{{ number_format($booking->advance_amount, 0) }}</span></td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Service Fee</th>
                                    <td><strong>৳{{ number_format($booking->service->price ?? 0, 0) }}</strong></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    @if($booking->admin_notes)
                        <div class="alert alert-info mt-3">
                            <strong><i class="fas fa-sticky-note"></i> Admin Notes:</strong> {{ $booking->admin_notes }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Right Column: Actions --}}
        <div class="col-lg-4">
            {{-- Update Booking Status --}}
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-edit"></i> Update Booking Status</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Current Status: {!! $booking->status_badge !!}</label>
                            <select name="status" class="form-control">
                                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                                <option value="approved" {{ $booking->status == 'approved' ? 'selected' : '' }}>✅ Approved</option>
                                <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>🏁 Completed</option>
                                <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>❌ Cancelled</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-warning btn-block"><i class="fas fa-save"></i> Update Status</button>
                    </form>
                </div>
            </div>

            {{-- Verify Payment --}}
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-check-double"></i> Verify Payment</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.bookings.updatePayment', $booking->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Payment Status</label>
                            <select name="payment_status" class="form-control">
                                <option value="unpaid" {{ $booking->payment_status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                                <option value="pending_verification" {{ $booking->payment_status == 'pending_verification' ? 'selected' : '' }}>Awaiting Verification</option>
                                <option value="verified" {{ $booking->payment_status == 'verified' ? 'selected' : '' }}>✅ Verified</option>
                                <option value="rejected" {{ $booking->payment_status == 'rejected' ? 'selected' : '' }}>❌ Rejected</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Admin Notes</label>
                            <textarea name="admin_notes" class="form-control" rows="3" placeholder="Add a note (optional)...">{{ $booking->admin_notes }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-block"><i class="fas fa-check"></i> Update Payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
