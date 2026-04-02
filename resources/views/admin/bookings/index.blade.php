@extends('adminlte::page')

@section('title', 'Manage Bookings')

@section('content_header')
    <h1>Manage Bookings</h1>
@endsection

@section('content')
    {{-- Stats Cards --}}
    <div class="row mb-4">
        <div class="col-lg-2 col-6">
            <div class="small-box bg-info shadow-sm">
                <div class="inner">
                    <h3>{{ $stats['total'] }}</h3>
                    <p>Total Bookings</p>
                </div>
                <div class="icon"><i class="fas fa-calendar-check text-white-50"></i></div>
            </div>
        </div>
        <div class="col-lg-2 col-6">
            <div class="small-box bg-warning shadow-sm">
                <div class="inner">
                    <h3>{{ $stats['pending'] }}</h3>
                    <p>Pending Approval</p>
                </div>
                <div class="icon"><i class="fas fa-clock text-white-50"></i></div>
            </div>
        </div>
        <div class="col-lg-2 col-6">
            <div class="small-box bg-primary shadow-sm">
                <div class="inner">
                    <h3>{{ $stats['approved'] }}</h3>
                    <p>Approved</p>
                </div>
                <div class="icon"><i class="fas fa-check-circle text-white-50"></i></div>
            </div>
        </div>
        <div class="col-lg-2 col-6">
            <div class="small-box bg-danger shadow-sm">
                <div class="inner">
                    <h3>{{ $stats['awaiting_payment'] }}</h3>
                    <p>Awaiting Verify</p>
                </div>
                <div class="icon"><i class="fas fa-money-bill-wave text-white-50"></i></div>
            </div>
        </div>
        <div class="col-lg-2 col-6">
            <div class="small-box bg-success shadow-sm">
                <div class="inner">
                    <h3>{{ $stats['verified_payment'] }}</h3>
                    <p>Verified Paid</p>
                </div>
                <div class="icon"><i class="fas fa-check-double text-white-50"></i></div>
            </div>
        </div>
        <div class="col-lg-2 col-6">
            <div class="small-box bg-indigo shadow-sm">
                <div class="inner">
                    <h3>৳{{ number_format($stats['total_revenue'], 0) }}</h3>
                    <p>Total Revenue</p>
                </div>
                <div class="icon"><i class="fas fa-wallet text-white-50"></i></div>
            </div>
        </div>
    </div>

    {{-- Filters --}}
    <div class="card card-outline card-primary mb-4">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-filter"></i> Filters</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.bookings.index') }}" method="GET" class="row">
                <div class="col-md-4">
                    <select name="status" class="form-control">
                        <option value="">All Booking Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="payment_status" class="form-control">
                        <option value="">All Payment Status</option>
                        <option value="unpaid" {{ request('payment_status') == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                        <option value="pending_verification" {{ request('payment_status') == 'pending_verification' ? 'selected' : '' }}>Awaiting Verification</option>
                        <option value="verified" {{ request('payment_status') == 'verified' ? 'selected' : '' }}>Verified</option>
                        <option value="rejected" {{ request('payment_status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Filter</button>
                    <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary"><i class="fas fa-redo"></i> Reset</a>
                </div>
            </form>
        </div>
    </div>

    {{-- Bookings Table --}}
    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover table-striped">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>#ID</th>
                        <th>Customer</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Payment</th>
                        <th>Amount</th>
                        <th>Booking Status</th>
                        <th>Payment Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                        <tr>
                            <td><strong>#{{ $booking->id }}</strong></td>
                            <td>
                                <strong>{{ $booking->user->name }}</strong>
                                <br><small class="text-muted">{{ $booking->patient_phone ?? 'N/A' }}</small>
                            </td>
                            <td>{{ $booking->service->name ?? 'N/A' }}</td>
                            <td>{{ $booking->booking_date ? $booking->booking_date->format('d M, Y h:i A') : 'N/A' }}</td>
                            <td>
                                @if($booking->payment_method)
                                    <span class="badge badge-primary text-uppercase">{{ str_replace('_', ' ', $booking->payment_method) }}</span>
                                    <br><small class="text-muted">TrxID: {{ $booking->transaction_id }}</small>
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>
                            <td><strong>৳{{ number_format($booking->advance_amount, 0) }}</strong></td>
                            <td>{!! $booking->status_badge !!}</td>
                            <td>{!! $booking->payment_badge !!}</td>
                            <td>
                                <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i> View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-5">
                                <i class="fas fa-inbox fa-3x text-muted mb-3 d-block"></i>
                                <p class="text-muted">No bookings found.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $bookings->appends(request()->query())->links() }}
        </div>
    </div>
@endsection
