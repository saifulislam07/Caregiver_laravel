@extends('layouts.frontend')

@section('title', $service->name)

@section('content')
    <!-- Header Space -->
    <div class="pt-32 pb-12 bg-slate-50">
        <div class="container mx-auto px-4">
            <nav class="flex mb-8 text-sm font-medium" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-slate-400">
                    <li><a href="{{ route('home') }}" class="hover:text-primary-600 transition-colors">Home</a></li>
                    <li><ion-icon name="chevron-forward" class="text-[10px]"></ion-icon></li>
                    <li><a href="{{ route('services.index') }}" class="hover:text-primary-600 transition-colors">Services</a></li>
                    <li><ion-icon name="chevron-forward" class="text-[10px]"></ion-icon></li>
                    <li class="text-slate-900 font-bold" aria-current="page">{{ $service->name }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container mx-auto px-4 pb-32">
        <div class="flex flex-col lg:flex-row gap-16">
            <!-- Left Column: Details -->
            <div class="w-full lg:w-7/12 fade-in-up">
                <div class="relative rounded-[2.5rem] overflow-hidden shadow-2xl mb-12 border-8 border-white group">
                    <img src="{{ $service->image ?? 'https://images.unsplash.com/photo-1576091160550-217359f42f8c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1200&q=80' }}" alt="{{ $service->name }}" class="w-full h-auto transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                </div>

                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-primary-50 text-primary-700 text-xs font-black uppercase tracking-widest mb-6 border border-primary-100">
                    Premium Service
                </div>

                <h1 class="text-4xl lg:text-5xl font-display font-black text-slate-900 mb-6 leading-tight">
                    {{ $service->name }}
                </h1>

                <div class="flex items-center gap-4 mb-10">
                    <div class="text-3xl font-display font-black text-primary-600">
                        ${{ number_format($service->price, 2) }}
                    </div>
                    <div class="text-slate-400 font-bold">/ session</div>
                </div>

                <div class="prose prose-lg prose-slate max-w-none mb-12">
                    <h3 class="text-2xl font-display font-black text-slate-900 mb-4">Service Overview</h3>
                    <p class="text-slate-600 leading-relaxed font-medium">
                        {{ $service->description }}
                    </p>
                </div>

                <div class="p-10 bg-slate-50 rounded-[2.5rem] border border-slate-100">
                    <h5 class="text-xl font-display font-black text-slate-900 mb-8 flex items-center gap-3">
                        <ion-icon name="list" class="text-primary-600"></ion-icon>
                        What's Included?
                    </h5>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex items-center gap-4 group">
                            <div class="w-10 h-10 rounded-xl bg-white shadow-sm flex items-center justify-center text-primary-600 text-xl group-hover:bg-primary-600 group-hover:text-white transition-all">
                                <ion-icon name="checkmark-circle"></ion-icon>
                            </div>
                            <span class="text-slate-700 font-bold">Certified Professional Care</span>
                        </div>
                        <div class="flex items-center gap-4 group">
                            <div class="w-10 h-10 rounded-xl bg-white shadow-sm flex items-center justify-center text-primary-600 text-xl group-hover:bg-primary-600 group-hover:text-white transition-all">
                                <ion-icon name="checkmark-circle"></ion-icon>
                            </div>
                            <span class="text-slate-700 font-bold">24/7 Support Access</span>
                        </div>
                        <div class="flex items-center gap-4 group">
                            <div class="w-10 h-10 rounded-xl bg-white shadow-sm flex items-center justify-center text-primary-600 text-xl group-hover:bg-primary-600 group-hover:text-white transition-all">
                                <ion-icon name="checkmark-circle"></ion-icon>
                            </div>
                            <span class="text-slate-700 font-bold">Personalized Care Plan</span>
                        </div>
                        <div class="flex items-center gap-4 group">
                            <div class="w-10 h-10 rounded-xl bg-white shadow-sm flex items-center justify-center text-primary-600 text-xl group-hover:bg-primary-600 group-hover:text-white transition-all">
                                <ion-icon name="checkmark-circle"></ion-icon>
                            </div>
                            <span class="text-slate-700 font-bold">Verified Health Experts</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Booking Form -->
            <div class="w-full lg:w-5/12 fade-in-up" style="animation-delay: 0.1s">
                <div class="sticky top-32 glass-effect p-10 rounded-[2.5rem] shadow-premium-hover border border-white">
                    <h4 class="text-2xl font-display font-black text-slate-900 mb-8">Book This Service</h4>
                    
                    <div id="bookingAlert" class="hidden mb-6 p-4 rounded-2xl font-bold" role="alert"></div>

                    @auth
                        <form id="bookingForm" class="space-y-6">
                            @csrf
                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                            
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 px-1">Preferred Caregiver (Optional)</label>
                                <div class="relative group">
                                    <select name="caregiver_id" class="w-full bg-white border border-slate-100 rounded-2xl py-4 px-6 appearance-none focus:outline-none focus:ring-4 focus:ring-primary-600/10 focus:border-primary-600 transition-all font-bold text-slate-900">
                                        <option value="">Any Available Caregiver</option>
                                        @foreach($caregivers as $caregiver)
                                            <option value="{{ $caregiver->id }}">{{ $caregiver->user->name }} - {{ $caregiver->speciality }}</option>
                                        @endforeach
                                    </select>
                                    <div class="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                                        <ion-icon name="chevron-down"></ion-icon>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 px-1">Scheduled Date & Time</label>
                                <input type="datetime-local" name="booking_date" class="w-full bg-white border border-slate-100 rounded-2xl py-4 px-6 focus:outline-none focus:ring-4 focus:ring-primary-600/10 focus:border-primary-600 transition-all font-bold text-slate-900" required>
                            </div>

                            <div class="bg-slate-50/50 rounded-3xl p-6 border border-slate-100">
                                <div class="flex justify-between mb-3">
                                    <span class="text-slate-500 font-bold">Service Fee</span>
                                    <span class="text-slate-900 font-black">${{ number_format($service->price, 2) }}</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-slate-500 font-bold">Booking Charge</span>
                                    <span class="text-secondary-600 font-black">FREE</span>
                                </div>
                                <div class="h-px bg-slate-200 my-4"></div>
                                <div class="flex justify-between items-center">
                                    <span class="text-slate-900 font-black">Total Amount</span>
                                    <span class="text-2xl text-primary-600 font-black">${{ number_format($service->price, 2) }}</span>
                                </div>
                            </div>

                            <button type="submit" id="submitBooking" class="w-full bg-primary-600 text-white py-5 rounded-[1.5rem] font-bold text-lg shadow-xl shadow-primary-200 hover:bg-primary-700 hover:-translate-y-1 active:scale-95 transition-all duration-300">
                                Confirm Booking Request
                            </button>
                        </form>
                    @else
                        <div class="text-center py-12 px-6 bg-slate-50 rounded-[2rem] border border-slate-100">
                            <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center text-slate-400 mx-auto mb-6 shadow-sm">
                                <ion-icon name="lock-closed-outline" class="text-3xl"></ion-icon>
                            </div>
                            <p class="text-slate-600 font-bold mb-8">Please log in to book this specialized service.</p>
                            <a href="{{ route('login') }}" class="btn-premium w-full inline-block text-center">Login to Book</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#bookingForm').on('submit', function(e) {
            e.preventDefault();
            
            const $btn = $('#submitBooking');
            const $alert = $('#bookingAlert');
            const originalText = $btn.html();

            $btn.prop('disabled', true).html('<span class="flex items-center justify-center gap-2"><svg class="animate-spin h-5 w-5 text-white" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Processing...</span>');
            $alert.addClass('hidden').removeClass('bg-secondary-50 text-secondary-700 bg-red-50 text-red-700');

            $.ajax({
                url: "{{ route('bookings.store') }}",
                type: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        $alert.addClass('bg-secondary-50 text-secondary-700 block').removeClass('hidden').html(response.message);
                        $btn.html('Request Sent!').addClass('bg-secondary-500 text-white').removeClass('bg-primary-600 shadow-primary-200');
                        
                        setTimeout(() => {
                            window.location.href = "{{ route('bookings.index') }}";
                        }, 2000);
                    }
                },
                error: function(xhr) {
                    $btn.prop('disabled', false).html(originalText);
                    let errorMessage = 'An error occurred. Please try again.';
                    
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        errorMessage = Object.values(errors).flat().join('<br>');
                    }
                    
                    $alert.addClass('bg-red-50 text-red-700 block').removeClass('hidden').html(errorMessage);
                }
            });
        });
    });
</script>
@endpush
