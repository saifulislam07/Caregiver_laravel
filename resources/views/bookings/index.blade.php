@extends('layouts.frontend')

@section('title', 'My Bookings')

@section('content')
    <div class="bg-primary-subtle py-5">
        <div class="container py-4">
            <h1 class="fw-bold mb-0 text-primary">My Bookings</h1>
            <p class="text-muted">Track and manage your caregiver service requests.</p>
        </div>
    </div>

    <div class="container py-5">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0 px-4 py-3">Service</th>
                                <th class="border-0 py-3">Caregiver</th>
                                <th class="border-0 py-3">Date & Time</th>
                                <th class="border-0 py-3">Status</th>
                                <th class="border-0 px-4 py-3">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings as $booking)
                                <tr>
                                    <td class="px-4 py-3">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $booking->service->image ?? 'https://via.placeholder.com/50x50' }}" class="rounded-3 me-3" width="50" height="50" style="object-fit: cover;">
                                            <div>
                                                <h6 class="mb-0 fw-bold">{{ $booking->service->name }}</h6>
                                                <small class="text-muted">ID: #AC-{{ $booking->id + 1000 }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($booking->caregiver)
                                            <div class="d-flex align-items-center">
                                                <ion-icon name="person-circle-outline" class="text-primary me-2 fs-4"></ion-icon>
                                                {{ $booking->caregiver->user->name }}
                                            </div>
                                        @else
                                            <span class="text-muted">Any Available</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="fw-medium">{{ \Carbon\Carbon::parse($booking->booking_date)->format('M d, Y') }}</div>
                                        <div class="small text-muted">{{ \Carbon\Carbon::parse($booking->booking_date)->format('h:i A') }}</div>
                                    </td>
                                    <td>
                                        @php
                                            $statusColors = [
                                                'pending' => 'warning',
                                                'approved' => 'primary',
                                                'completed' => 'success',
                                                'cancelled' => 'danger'
                                            ];
                                        @endphp
                                        <span class="badge bg-{{ $statusColors[$booking->status] }}-subtle text-{{ $statusColors[$booking->status] }} px-3 py-2 rounded-pill text-capitalize">
                                            {{ $booking->status }}
                                        </span>
                                    </td>
                                    <td class="px-4 fw-bold">
                                        ${{ number_format($booking->service->price, 2) }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <div class="py-4">
                                            <ion-icon name="calendar-outline" size="large" class="text-muted mb-3"></ion-icon>
                                            <p class="mb-4">You haven't made any bookings yet.</p>
                                            <a href="{{ route('services.index') }}" class="btn btn-primary rounded-pill px-4">Browse Services</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
