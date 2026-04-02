@extends('layouts.frontend')

@section('title', 'Dashboard')

@section('content')
<div class="min-h-screen bg-slate-50 py-12">
    <div class="container max-w-7xl">
        
        {{-- Minimalism Page Header --}}
        <div class="mb-10 flex items-center justify-between flex-wrap gap-4">
            <div>
                <nav aria-label="breadcrumb" class="mb-2">
                    <ol class="breadcrumb bg-transparent p-0 small font-bold text-slate-400 uppercase tracking-widest">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-slate-400 text-decoration-none hover:text-indigo-600">Home</a></li>
                        <li class="breadcrumb-item active text-slate-900" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <h1 class="text-3xl font-black text-slate-900 tracking-tight">Management Dashboard</h1>
                <p class="text-slate-500 font-medium">Overview of your healthcare journey and service requests.</p>
            </div>
            <a href="{{ route('services.index') }}" class="btn bg-indigo-600 text-white rounded-xl px-6 py-3 font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition-all">
                <i class="fas fa-plus mr-2"></i> Book New Service
            </a>
        </div>

        <div class="row g-6">
            {{-- Dashboard Navigation Sidebar --}}
            <div class="col-lg-3">
                <div class="bg-white rounded-3xl border border-slate-200 p-6 sticky top-8 shadow-sm">
                    <div class="flex items-center gap-4 mb-8 px-2">
                        <div class="w-12 h-12 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-600 text-xl font-black">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div>
                            <div class="text-xs font-black text-slate-400 uppercase tracking-widest">Logged in as</div>
                            <div class="font-black text-slate-900 leading-none">{{ Auth::user()->name }}</div>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <a href="{{ route('bookings.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl bg-indigo-600 text-white font-bold transition-all no-underline shadow-md shadow-indigo-100">
                            <i class="fas fa-grid-2 text-sm opacity-80"></i> All Bookings
                        </a>
                        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-500 hover:bg-slate-50 font-bold transition-all no-underline border border-transparent hover:border-slate-100">
                            <i class="fas fa-wallet text-sm opacity-60"></i> Payment History
                        </a>
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-500 hover:bg-slate-50 font-bold transition-all no-underline border border-transparent hover:border-slate-100">
                            <i class="fas fa-user-circle text-sm opacity-60"></i> Patient Profile
                        </a>
                        <div class="pt-6 mt-6 border-t border-slate-50">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl text-rose-500 hover:bg-rose-50 font-bold transition-all text-left border border-transparent hover:border-rose-100">
                                    <i class="fas fa-sign-out-alt text-sm opacity-80"></i> Sign Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Main Content Area --}}
            <div class="col-lg-9">
                {{-- Stats Summary --}}
                <div class="row g-4 mb-8">
                    @php
                        $total = $bookings->count();
                        $pending = $bookings->where('status', 'pending')->count();
                        $verified = $bookings->where('payment_status', 'verified')->count();
                    @endphp
                    <div class="col-md-4">
                        <div class="bg-white rounded-3xl border border-slate-200 p-5 shadow-sm hover:border-indigo-200 transition-all">
                            <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Service Requests</div>
                            <div class="text-2xl font-black text-slate-900">{{ $total }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-white rounded-3xl border border-slate-200 p-5 shadow-sm hover:border-amber-200 transition-all">
                            <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Awaiting Approval</div>
                            <div class="text-2xl font-black text-slate-900">{{ $pending }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-white rounded-3xl border border-slate-200 p-5 shadow-sm hover:border-emerald-200 transition-all">
                            <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Verified Payments</div>
                            <div class="text-2xl font-black text-slate-900">{{ $verified }}</div>
                        </div>
                    </div>
                </div>

                @if(session('success'))
                    <div class="bg-emerald-50 border border-emerald-100 text-emerald-700 px-6 py-4 rounded-2xl font-bold mb-8 flex items-center gap-3 animate__animated animate__fadeIn">
                        <i class="fas fa-check-circle fs-5"></i> {{ session('success') }}
                    </div>
                @endif

                {{-- Bookings List --}}
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="px-8 py-5 border-b border-slate-100 flex items-center justify-between">
                        <h5 class="text-sm font-black text-slate-900 uppercase tracking-wider mb-0">My Recent Bookings</h5>
                        <span class="px-3 py-1 bg-slate-50 rounded-full text-[10px] font-black text-slate-400 border border-slate-100">{{ $total }} Entry</span>
                    </div>

                    <div class="divide-y divide-slate-50">
                        @forelse($bookings as $booking)
                        <div class="p-6 md:p-8 hover:bg-slate-50/50 transition-all group">
                            <div class="flex items-start justify-between flex-wrap gap-6">
                                {{-- Service Basic Info --}}
                                <div class="flex gap-5 min-w-[280px]">
                                    <div class="relative flex-shrink-0">
                                        <img src="{{ $booking->service->image ?? 'https://images.unsplash.com/photo-1576091160550-217359f42f8c?w=100&q=80' }}"
                                             class="w-16 h-16 rounded-2xl object-cover border border-slate-100 shadow-sm transition-transform duration-500 group-hover:scale-105"
                                             alt="{{ $booking->service->name }}">
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-black text-slate-900 mb-1 leading-none">{{ $booking->service->name }}</h4>
                                        <div class="flex items-center gap-3 text-slate-400 font-bold small">
                                            <span class="flex items-center gap-1.5"><i class="far fa-calendar-alt text-indigo-600 text-xs"></i> {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M, Y') }}</span>
                                            <span class="flex items-center gap-1.5"><i class="far fa-clock text-indigo-600 text-xs"></i> {{ \Carbon\Carbon::parse($booking->booking_date)->format('h:i A') }}</span>
                                        </div>
                                        <div class="mt-3 flex gap-2">
                                            <span class="px-2.5 py-1 bg-white border border-slate-100 rounded-lg text-[9px] font-black text-slate-500 uppercase tracking-widest"><i class="fas fa-tag mr-1 opacity-60"></i> Ref: #{{ $booking->id + 1000 }}</span>
                                        </div>
                                    </div>
                                </div>

                                {{-- Status Tracking --}}
                                <div class="flex gap-4 md:gap-8 flex-grow justify-start md:justify-end">
                                    {{-- Order Status --}}
                                    @php
                                        $sColor = [
                                            'pending'   => 'amber',
                                            'approved'  => 'emerald',
                                            'completed' => 'indigo',
                                            'cancelled' => 'rose',
                                        ][$booking->status] ?? 'slate';
                                    @endphp
                                    <div class="text-right">
                                        <div class="text-[9px] font-black text-slate-300 uppercase tracking-[0.2em] mb-2 px-1">Order Status</div>
                                        <div class="px-4 py-2 bg-{{ $sColor }}-50 text-{{ $sColor }}-600 border border-{{ $sColor }}-100 rounded-xl text-[10px] font-black uppercase tracking-widest flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 rounded-full bg-{{ $sColor }}-500"></span> {{ $booking->status }}
                                        </div>
                                    </div>

                                    {{-- Payment Status --}}
                                    @php
                                        $pColor = [
                                            'unpaid'               => 'slate',
                                            'pending_verification' => 'blue',
                                            'verified'             => 'emerald',
                                            'rejected'             => 'rose',
                                        ][$booking->payment_status] ?? 'slate';
                                    @endphp
                                    <div class="text-right">
                                        <div class="text-[9px] font-black text-slate-300 uppercase tracking-[0.2em] mb-2 px-1">Payment</div>
                                        <div class="px-4 py-2 bg-{{ $pColor }}-50 text-{{ $pColor }}-600 border border-{{ $pColor }}-100 rounded-xl text-[10px] font-black uppercase tracking-widest flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 rounded-full bg-{{ $pColor }}-500 animate-pulse"></span> {{ str_replace('_', ' ', $booking->payment_status) }}
                                        </div>
                                    </div>
                                </div>

                                {{-- Quick Action --}}
                                <div class="min-w-[140px] text-right">
                                    @if(in_array($booking->payment_status, ['unpaid', 'rejected']))
                                        <button type="button" class="btn bg-indigo-600 text-white font-black text-[11px] px-6 py-3 rounded-xl shadow-lg shadow-indigo-100 hover:bg-indigo-700 hover:-translate-y-0.5 active:scale-95 transition-all w-full submit-payment-btn" 
                                                data-booking-id="{{ $booking->id }}" data-bs-toggle="modal" data-bs-target="#paymentModal">
                                            <i class="fas fa-file-invoice-dollar mr-1"></i> PAY NOW
                                        </button>
                                    @else
                                        <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Advance Amount</div>
                                        <div class="text-xl font-black text-slate-900 leading-none">৳{{ number_format($booking->advance_amount, 0) }}</div>
                                    @endif
                                </div>
                            </div>

                            @if($booking->admin_notes)
                                <div class="mt-6 p-4 bg-slate-50 border border-slate-100 rounded-2xl text-xs text-slate-500 font-medium flex items-start gap-3">
                                    <i class="fas fa-info-circle mt-0.5 text-indigo-500"></i>
                                    <div><span class="font-black text-slate-900 text-uppercase tracking-widest text-[9px] block mb-0.5">Admin Update</span>{{ $booking->admin_notes }}</div>
                                </div>
                            @endif
                        </div>
                        @empty
                        <div class="py-24 text-center">
                            <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center text-slate-300 fs-1 mx-auto mb-6">
                                <i class="fas fa-calendar-day"></i>
                            </div>
                            <h4 class="font-black text-slate-900 mb-2">No bookings yet</h4>
                            <p class="text-slate-500 max-w-sm mx-auto mb-8 font-medium">When you request a service, it will appear here for you to track and manage.</p>
                            <a href="{{ route('services.index') }}" class="text-indigo-600 font-black no-underline hover:underline">Start Exploring Services <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Minimalist Payment Modal --}}
<div class="modal fade px-4" id="paymentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-[2rem] shadow-2xl overflow-hidden">
            <div class="p-8 md:p-12">
                <div class="mb-10 text-center">
                    <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center fs-3 mx-auto mb-6">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 mb-2">Secure Booking Verification</h3>
                    <p class="text-slate-500 font-medium max-w-md mx-auto">Please select a payment method and provide your transaction details to confirm your request.</p>
                </div>

                <form id="paymentSlipForm" class="space-y-8">
                    @csrf
                    <input type="hidden" id="modal_booking_id" name="_booking_id">

                    @php
                        $bkashNum = App\Models\Setting::get('bkash_number', '01700-000000');
                        $nagadNum = App\Models\Setting::get('nagad_number', '01700-000001');
                        $bankName = App\Models\Setting::get('bank_name', 'DBBL');
                        $bankAccN = App\Models\Setting::get('bank_account_name', 'Healora Account');
                        $bankAccNo = App\Models\Setting::get('bank_account_number', '123456');
                        $minAdv = App\Models\Setting::get('minimum_advance', '500');
                    @endphp

                    {{-- Methods View --}}
                    <div class="row g-4">
                        <div class="col-md-4">
                            <input type="radio" name="payment_method" id="m_bkash" value="bkash" class="btn-check" required>
                            <label for="m_bkash" class="w-full text-center p-6 rounded-2xl border-2 border-slate-50 bg-slate-50 hover:bg-white hover:border-pink-200 transition-all cursor-pointer block group">
                                <i class="fas fa-wallet text-pink-500 fs-2 mb-3"></i>
                                <div class="font-black text-slate-900 small">bKash</div>
                                <div class="text-[10px] font-black text-slate-400 mt-1">{{ $bkashNum }}</div>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <input type="radio" name="payment_method" id="m_nagad" value="nagad" class="btn-check">
                            <label for="m_nagad" class="w-full text-center p-6 rounded-2xl border-2 border-slate-50 bg-slate-50 hover:bg-white hover:border-orange-200 transition-all cursor-pointer block group">
                                <i class="fas fa-fire-alt text-orange-500 fs-2 mb-3"></i>
                                <div class="font-black text-slate-900 small">Nagad</div>
                                <div class="text-[10px] font-black text-slate-400 mt-1">{{ $nagadNum }}</div>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <input type="radio" name="payment_method" id="m_bank" value="bank_transfer" class="btn-check">
                            <label for="m_bank" class="w-full text-center p-6 rounded-2xl border-2 border-slate-50 bg-slate-50 hover:bg-white hover:border-indigo-200 transition-all cursor-pointer block group">
                                <i class="fas fa-university text-indigo-500 fs-2 mb-3"></i>
                                <div class="font-black text-slate-900 small">Bank</div>
                                <div class="text-[10px] font-black text-slate-400 mt-1">{{ $bankName }}</div>
                            </label>
                        </div>
                    </div>

                    <div class="row g-6">
                        <div class="col-md-7">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 px-1">Transaction ID / Ref <span class="text-rose-500">*</span></label>
                            <input type="text" name="transaction_id" class="w-full bg-slate-50 border border-slate-100 rounded-xl py-4 px-6 focus:bg-white focus:ring-4 focus:ring-indigo-100 focus:border-indigo-600 transition-all font-bold text-slate-900" placeholder="Enter Ref ID" required>
                        </div>
                        <div class="col-md-5">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 px-1">Amount Sent (৳) <span class="text-rose-500">*</span></label>
                            <input type="number" name="advance_amount" class="w-full bg-slate-50 border border-slate-100 rounded-xl py-4 px-6 focus:bg-white focus:ring-4 focus:ring-indigo-100 focus:border-indigo-600 transition-all font-bold text-slate-900" placeholder="Min ৳{{ $minAdv }}" min="{{ $minAdv }}" required>
                        </div>
                    </div>

                    <div class="pt-4 flex items-center justify-between gap-4">
                        <button type="button" class="px-8 py-4 font-black text-slate-400 hover:text-slate-900 transition-colors" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="bg-indigo-600 text-white px-10 py-4 rounded-2xl font-black shadow-xl shadow-indigo-100 hover:bg-indigo-700 hover:-translate-y-0.5 active:scale-95 transition-all" id="paymentSlipSubmitBtn">
                            Submit Verification Request
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .font-black { font-weight: 900 !important; }
    .btn-check:checked + label {
        border-color: #4f46e5 !important;
        background-color: white !important;
        box-shadow: 0 20px 25px -5px rgba(79, 70, 229, 0.1) !important;
    }
    .divide-y > * + * { border-top-width: 1px !important; }
    .leading-none { line-height: 1 !important; }
    .no-underline { text-decoration: none !important; }
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    $('.submit-payment-btn').on('click', function() {
        $('#modal_booking_id').val($(this).data('booking-id'));
    });

    $('#paymentSlipForm').on('submit', function(e) {
        e.preventDefault();
        const $btn = $('#paymentSlipSubmitBtn');
        const bookingId = $('#modal_booking_id').val();
        
        $btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i> Submitting...');

        $.ajax({
            url: '/bookings/' + bookingId + '/payment',
            type: 'POST',
            data: $(this).serialize() + '&_method=PATCH',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(response) {
                $btn.html('<i class="fas fa-check me-2"></i> Submitted!');
                setTimeout(() => { location.reload(); }, 1000);
            },
            error: function(xhr) {
                $btn.prop('disabled', false).html('Submit Verification Request');
                alert(xhr.status === 422 ? Object.values(xhr.responseJSON.errors).flat().join('\n') : 'Error occurred.');
            }
        });
    });
});
</script>
@endpush
