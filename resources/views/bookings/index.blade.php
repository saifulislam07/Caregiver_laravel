@extends('layouts.frontend')

@section('title', 'Dashboard')

@section('content')
<div class="min-h-screen bg-[#F8FAFC]">
    <div class="flex flex-col lg:flex-row min-h-screen">
        
        {{-- Integrated Left Navigation --}}
        <aside class="w-full lg:w-[280px] bg-white border-r border-slate-200 lg:sticky lg:top-0 lg:h-screen flex flex-col shrink-0">
            {{-- User Context Header --}}
            <div class="p-8 border-b border-slate-100 bg-slate-50/50">
                <div class="flex items-center gap-4">
                    <div class="relative">
                        <div class="w-14 h-14 rounded-2xl bg-primary-600 text-white flex items-center justify-center text-xl font-bold shadow-lg shadow-primary-200 ring-4 ring-white">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-emerald-500 rounded-lg border-4 border-white flex items-center justify-center text-white">
                            <i class="fas fa-check text-[8px]"></i>
                        </div>
                    </div>
                    <div class="overflow-hidden">
                        <h3 class="text-slate-900 font-bold truncate tracking-tight">{{ Auth::user()->name }}</h3>
                        <p class="text-[10px] text-slate-400 font-black uppercase tracking-widest truncate">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>

            {{-- Main Navigation --}}
            <nav class="flex-grow p-4 space-y-1">
                <a href="{{ route('bookings.index') }}" class="flex items-center gap-3 px-6 py-4 rounded-xl {{ request()->is('my-bookings') ? 'bg-primary-50 text-primary-700 shadow-sm border border-primary-100' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }} font-bold transition-all group">
                    <i class="fas fa-grid-2 text-sm {{ request()->is('my-bookings') ? 'text-primary-600' : 'group-hover:text-primary-600' }}"></i>
                    <span>Dashboard</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-6 py-4 rounded-xl text-slate-500 hover:bg-slate-50 hover:text-slate-900 font-bold transition-all group">
                    <i class="fas fa-clock-rotate-left text-sm group-hover:text-primary-600"></i>
                    <span>Care History</span>
                </a>
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-6 py-4 rounded-xl {{ request()->routeIs('profile.edit') ? 'bg-primary-50 text-primary-700 border border-primary-100' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }} font-bold transition-all group">
                    <i class="fas fa-user-gear text-sm {{ request()->routeIs('profile.edit') ? 'text-primary-600' : 'group-hover:text-primary-600' }}"></i>
                    <span>Account</span>
                </a>
            </nav>

            {{-- Footer Action --}}
            <div class="p-6 border-t border-slate-100">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-6 py-4 rounded-xl text-slate-500 hover:bg-rose-50 hover:text-rose-600 font-bold transition-all group">
                        <i class="fas fa-sign-out-alt text-sm group-hover:rotate-12 transition-transform"></i>
                        <span>Exit Dashboard</span>
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main Viewport --}}
        <main class="flex-grow p-6 lg:p-12 max-w-[1440px]">
            
            {{-- Breadcrumb & Header --}}
            <div class="mb-10 flex flex-col md:flex-row md:items-center justify-between gap-6 animate-fade-in">
                <div>
                    <nav class="flex mb-4 text-[10px] font-black uppercase tracking-[0.2em] text-slate-400" aria-label="Breadcrumb">
                        <ol class="flex items-center gap-2">
                            <li><a href="{{ route('home') }}" class="hover:text-primary-600">Home</a></li>
                            <li><i class="fas fa-chevron-right text-[7px]"></i></li>
                            <li class="text-slate-900 uppercase">Personal Health Hub</li>
                        </ol>
                    </nav>
                    <h1 class="text-3xl lg:text-4xl font-display font-black text-slate-900 mb-2 tracking-tight">Active Care Services</h1>
                    <p class="text-slate-500 font-medium">Monitoring your current medical bookings and progress.</p>
                </div>
                <div>
                    <a href="{{ route('services.index') }}" class="inline-flex items-center gap-3 bg-primary-600 text-white px-8 py-5 rounded-2xl font-black shadow-xl shadow-primary-100 hover:bg-primary-700 hover:-translate-y-1 transition-all active:scale-95 group">
                        <i class="fas fa-plus text-sm group-hover:rotate-90 transition-transform"></i>
                        <span>Start New Care</span>
                    </a>
                </div>
            </div>

            {{-- Quick Insights Bar --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-12">
                @php
                    $total = $bookings->count();
                    $pending = $bookings->where('status', 'pending')->count();
                    $verified = $bookings->where('payment_status', 'verified')->count();
                    $rejected = $bookings->where('payment_status', 'rejected')->count();
                @endphp
                
                <div class="bg-white border border-slate-100 p-6 rounded-2xl shadow-sm flex items-center gap-5 transition-all hover:border-primary-100 animate-slide-up" style="animation-delay: 0.1s">
                    <div class="w-12 h-12 rounded-xl bg-primary-50 text-primary-600 flex items-center justify-center text-xl">
                        <i class="fas fa-notes-medical"></i>
                    </div>
                    <div>
                        <div class="text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none mb-1">Total Bookings</div>
                        <div class="text-2xl font-black text-slate-900 leading-none">{{ sprintf('%02d', $total) }}</div>
                    </div>
                </div>

                <div class="bg-white border border-slate-100 p-6 rounded-2xl shadow-sm flex items-center gap-5 transition-all hover:border-amber-100 animate-slide-up" style="animation-delay: 0.2s">
                    <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <div class="text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none mb-1">Pending Sync</div>
                        <div class="text-2xl font-black text-slate-900 leading-none">{{ sprintf('%02d', $pending) }}</div>
                    </div>
                </div>

                <div class="bg-white border border-slate-100 p-6 rounded-2xl shadow-sm flex items-center gap-5 transition-all hover:border-emerald-100 animate-slide-up" style="animation-delay: 0.3s">
                    <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl">
                        <i class="fas fa-check-double"></i>
                    </div>
                    <div>
                        <div class="text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none mb-1">Verified Care</div>
                        <div class="text-2xl font-black text-slate-900 leading-none">{{ sprintf('%02d', $verified) }}</div>
                    </div>
                </div>

                <div class="bg-white border border-slate-100 p-6 rounded-2xl shadow-sm flex items-center gap-5 transition-all hover:border-rose-100 animate-slide-up" style="animation-delay: 0.4s">
                    <div class="w-12 h-12 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center text-xl">
                        <i class="fas fa-shield-xmark"></i>
                    </div>
                    <div>
                        <div class="text-[9px] font-black text-slate-400 uppercase tracking-widest leading-none mb-1">Issues Found</div>
                        <div class="text-2xl font-black text-slate-900 leading-none">{{ sprintf('%02d', $rejected) }}</div>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="mb-10 p-6 bg-emerald-50 border border-emerald-100 rounded-2xl flex items-center gap-4 text-emerald-700 animate-fade-in shadow-sm shadow-emerald-50">
                    <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center text-emerald-500 shadow-sm">
                        <i class="fas fa-check"></i>
                    </div>
                    <span class="font-bold">{{ session('success') }}</span>
                </div>
            @endif

            {{-- Care Pass List --}}
            <div class="space-y-6">
                @forelse($bookings as $booking)
                    <div class="group bg-white border border-slate-100 rounded-3xl overflow-hidden transition-all hover:border-primary-200 hover:shadow-2xl hover:shadow-primary-100/30 animate-slide-up">
                        <div class="flex flex-col xl:flex-row p-6 lg:p-8 gap-8 items-center lg:items-start xl:items-center">
                            
                            {{-- LEFT: Status Bar --}}
                            @php
                                $sConfig = [
                                    'pending'   => 'bg-amber-500',
                                    'approved'  => 'bg-emerald-500',
                                    'completed' => 'bg-primary-500',
                                    'cancelled' => 'bg-rose-500',
                                ][$booking->status] ?? 'bg-slate-500';
                            @endphp
                            <div class="flex-shrink-0 w-full lg:w-48 xl:w-56">
                                <div class="relative group-hover:scale-105 transition-transform">
                                    <div class="aspect-square rounded-[2rem] overflow-hidden shadow-lg border-4 border-white">
                                        <img src="{{ $booking->service->image ?? 'https://images.unsplash.com/photo-1576091160550-217359f42f8c?w=400&q=80' }}" class="w-full h-full object-cover">
                                    </div>
                                    <div class="absolute -top-3 -right-3 px-4 py-2 bg-slate-900 text-white rounded-xl text-[10px] font-black shadow-lg">
                                        #{{ $booking->id + 1000 }}
                                    </div>
                                </div>
                            </div>

                            {{-- MIDDLE: Care Details --}}
                            <div class="flex-grow text-center lg:text-left">
                                <h4 class="text-2xl font-display font-black text-slate-900 mb-3 tracking-tight">{{ $booking->service->name }}</h4>
                                <div class="flex flex-wrap justify-center lg:justify-start items-center gap-6 text-slate-400 font-bold text-xs uppercase tracking-widest">
                                    <div class="flex items-center gap-2 bg-slate-50 px-4 py-2 rounded-xl border border-slate-100">
                                        <i class="far fa-calendar-check text-primary-600"></i>
                                        {{ \Carbon\Carbon::parse($booking->booking_date)->format('M d, Y') }}
                                    </div>
                                    <div class="flex items-center gap-2 bg-slate-50 px-4 py-2 rounded-xl border border-slate-100">
                                        <i class="far fa-clock text-primary-600"></i>
                                        {{ \Carbon\Carbon::parse($booking->booking_date)->format('h:i A') }}
                                    </div>
                                </div>
                            </div>

                            {{-- RIGHT: Status Metrics --}}
                            <div class="flex flex-wrap items-center justify-center gap-4 xl:gap-8 xl:ml-auto">
                                {{-- Service Status --}}
                                <div class="text-center">
                                    <div class="text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 leading-none italic">Booking Progress</div>
                                    @php
                                        $sText = [
                                            'pending'   => 'bg-amber-100 text-amber-700',
                                            'approved'  => 'bg-emerald-100 text-emerald-700',
                                            'completed' => 'bg-primary-100 text-primary-700',
                                            'cancelled' => 'bg-rose-100 text-rose-700',
                                        ][$booking->status] ?? 'bg-slate-100 text-slate-700';
                                    @endphp
                                    <span class="px-6 py-3 rounded-2xl {{ $sText }} text-[10px] font-black uppercase tracking-widest block border border-white/50">
                                        {{ $booking->status }}
                                    </span>
                                </div>

                                {{-- Payment Status --}}
                                <div class="text-center">
                                    <div class="text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 leading-none italic">Advance Audit</div>
                                    @php
                                        $pText = [
                                            'unpaid'               => 'bg-slate-100 text-slate-600',
                                            'pending_verification' => 'bg-blue-100 text-blue-700',
                                            'verified'             => 'bg-emerald-100 text-emerald-700',
                                            'rejected'             => 'bg-rose-100 text-rose-700',
                                        ][$booking->payment_status] ?? 'bg-slate-100 text-slate-700';
                                    @endphp
                                    <span class="px-6 py-3 rounded-2xl {{ $pText }} text-[10px] font-black uppercase tracking-widest block border border-white/50">
                                        {{ str_replace('_', ' ', $booking->payment_status) }}
                                    </span>
                                </div>

                                {{-- Action --}}
                                <div class="min-w-[160px]">
                                    @if(in_array($booking->payment_status, ['unpaid', 'rejected']))
                                        <button type="button" class="w-full bg-slate-900 text-white font-black text-[11px] uppercase py-5 rounded-2xl shadow-xl shadow-slate-200 hover:bg-primary-600 transition-all active:scale-95 submit-payment-btn" 
                                                data-booking-id="{{ $booking->id }}" data-bs-toggle="modal" data-bs-target="#paymentModal">
                                            Verify Payment
                                        </button>
                                    @else
                                        <div class="flex flex-col gap-2">
                                            <div class="text-center px-6 py-3 bg-slate-50 rounded-2xl border border-slate-100 flex-grow">
                                                <div class="text-[10px] font-black text-slate-400 uppercase mb-1 leading-none">Total Fee</div>
                                                <div class="text-xl font-black text-slate-900 leading-none">৳{{ number_format($booking->total_price, 0) }}</div>
                                            </div>
                                            @if($booking->due_amount > 0)
                                                <div class="text-center px-4 py-1.5 bg-rose-50 rounded-xl text-[10px] font-black text-rose-600 uppercase tracking-widest leading-none">
                                                    Due: ৳{{ number_format($booking->due_amount, 0) }}
                                                </div>
                                            @endif
                                            <a href="{{ route('bookings.invoice', $booking->id) }}" target="_blank" class="text-center py-2 text-[10px] font-black text-primary-600 uppercase tracking-[0.2em] hover:text-primary-700 transition-colors">
                                                <i class="fas fa-file-invoice mr-1 text-[8px]"></i> View Invoice
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Collapsible Footer (Notes) --}}
                        @if($booking->admin_notes)
                            <div class="px-8 py-5 bg-slate-50 border-t border-slate-200 flex items-center gap-4 text-xs font-medium text-slate-500">
                                <div class="w-8 h-8 rounded-lg bg-white shadow-sm flex items-center justify-center text-primary-600 shrink-0">
                                    <i class="fas fa-comment-medical text-xs"></i>
                                </div>
                                <span><strong class="text-slate-900 font-black uppercase text-[10px] tracking-widest mr-2">Admin Update:</strong> {{ $booking->admin_notes }}</span>
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="bg-white border-2 border-dashed border-slate-200 rounded-[3rem] p-24 text-center animate-fade-in">
                        <div class="w-24 h-24 bg-slate-50 text-slate-200 rounded-full flex items-center justify-center mx-auto mb-8">
                            <i class="fas fa-box-open text-4xl"></i>
                        </div>
                        <h3 class="text-3xl font-display font-black text-slate-900 mb-4 tracking-tight">Your Care Hub is Empty</h3>
                        <p class="text-slate-500 max-w-sm mx-auto mb-10 text-lg font-medium">Explore our premium healthcare services and start your journey towards better health.</p>
                        <a href="{{ route('services.index') }}" class="inline-flex items-center gap-3 bg-primary-600 text-white px-10 py-5 rounded-2xl font-black shadow-xl shadow-primary-100 hover:bg-primary-700 transition-all">
                            <span>Browse Services</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                @endforelse
            </div>
        </main>
    </div>
</div>

{{-- Payment Modal: Sleek White Sheet --}}
<div class="modal fade px-4" id="paymentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-[3rem] shadow-2xl overflow-hidden">
            <div class="p-8 lg:p-12 relative bg-white">
                <button type="button" class="absolute top-8 right-8 w-10 h-10 rounded-xl bg-slate-50 text-slate-400 hover:text-rose-500 transition-all flex items-center justify-center" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i>
                </button>

                <div class="mb-12 text-center">
                    <div class="w-16 h-16 bg-primary-50 text-primary-600 rounded-2xl flex items-center justify-center text-2xl mx-auto mb-6 shadow-sm">
                        <i class="fas fa-shield-check"></i>
                    </div>
                    <h3 class="text-2xl font-display font-black text-slate-900 mb-2">Secure Verification</h3>
                    <p class="text-slate-500 text-sm font-medium">Confirm your payment to activate care services.</p>
                </div>

                <form id="paymentSlipForm" class="space-y-8">
                    @csrf
                    <input type="hidden" id="modal_booking_id" name="_booking_id">

                    @php
                        $bkashNum = App\Models\Setting::get('bkash_number', '01700-000000');
                        $nagadNum = App\Models\Setting::get('nagad_number', '01700-000001');
                        $bankName = App\Models\Setting::get('bank_name', 'DBBL');
                        $minAdv = App\Models\Setting::get('minimum_advance', '500');
                    @endphp

                    <div>
                        <div class="grid grid-cols-3 gap-3 mb-8">
                            <label class="cursor-pointer group">
                                <input type="radio" name="payment_method" value="bkash" class="peer hidden" required>
                                <div class="p-4 rounded-2xl bg-slate-50 border-2 border-transparent peer-checked:border-pink-500 peer-checked:bg-pink-50/30 transition-all text-center">
                                    <div class="w-8 h-8 rounded-lg mx-auto mb-2 flex items-center justify-center bg-[#E2136E] text-white text-[8px] font-black">bK</div>
                                    <div class="text-[9px] font-black text-slate-600 uppercase tracking-tight">bKash</div>
                                </div>
                            </label>
                            <label class="cursor-pointer group">
                                <input type="radio" name="payment_method" value="nagad" class="peer hidden">
                                <div class="p-4 rounded-2xl bg-slate-50 border-2 border-transparent peer-checked:border-orange-500 peer-checked:bg-orange-50/30 transition-all text-center">
                                    <div class="w-8 h-8 rounded-lg mx-auto mb-2 flex items-center justify-center bg-[#F7941D] text-white text-[8px] font-black">Na</div>
                                    <div class="text-[9px] font-black text-slate-600 uppercase tracking-tight">Nagad</div>
                                </div>
                            </label>
                            <label class="cursor-pointer group">
                                <input type="radio" name="payment_method" value="bank_transfer" class="peer hidden">
                                <div class="p-4 rounded-2xl bg-slate-50 border-2 border-transparent peer-checked:border-indigo-500 peer-checked:bg-indigo-50/30 transition-all text-center">
                                    <div class="w-8 h-8 rounded-lg mx-auto mb-2 flex items-center justify-center bg-indigo-600 text-white"><i class="fas fa-university text-[10px]"></i></div>
                                    <div class="text-[9px] font-black text-slate-600 uppercase tracking-tight">Bank</div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Transaction Link / ID</label>
                            <input type="text" name="transaction_id" class="w-full bg-slate-50 border border-slate-100 rounded-2xl py-4 px-6 focus:bg-white focus:ring-4 focus:ring-primary-100 focus:border-primary-600 transition-all font-bold text-slate-900" placeholder="e.g. 7XH93KL2M" required>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Amount Sent (৳)</label>
                            <input type="number" name="advance_amount" class="w-full bg-slate-50 border border-slate-100 rounded-2xl py-4 px-6 focus:bg-white focus:ring-4 focus:ring-primary-100 focus:border-primary-600 transition-all font-bold text-slate-900" placeholder="Min ৳{{ $minAdv }}" min="{{ $minAdv }}" required>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full bg-primary-600 text-white py-5 rounded-2xl font-black text-sm shadow-xl shadow-primary-100 hover:bg-primary-700 active:scale-95 transition-all flex items-center justify-center gap-2" id="paymentSlipSubmitBtn">
                            Submit Verification
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
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;700;900&display=swap');
    .font-display { font-family: 'Outfit', sans-serif; }
    
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes slide-up {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in { animation: fade-in 0.6s ease-out forwards; }
    .animate-slide-up { animation: slide-up 0.8s ease-out forwards; }
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
        
        $btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i> Processing...');

        $.ajax({
            url: '/bookings/' + bookingId + '/payment',
            type: 'POST',
            data: $(this).serialize() + '&_method=PATCH',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(response) {
                $btn.html('<i class="fas fa-check me-2"></i> Verified!');
                setTimeout(() => { location.reload(); }, 1000);
            },
            error: function(xhr) {
                $btn.prop('disabled', false).html('Submit Verification');
                alert(xhr.status === 422 ? Object.values(xhr.responseJSON.errors).flat().join('\n') : 'Verification error.');
            }
        });
    });
});
</script>
@endpush
