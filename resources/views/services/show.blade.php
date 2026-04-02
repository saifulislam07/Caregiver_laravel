@extends('layouts.frontend')

@section('title', $service->name)

@section('content')
    <!-- Header Space -->
    <div class="pt-32 pb-12 bg-slate-50">
        <div class="container mx-auto px-4">
            <nav class="flex mb-8 text-sm font-medium" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-slate-400">
                    <li><a href="{{ route('home') }}" class="hover:text-primary-600 transition-colors">Home</a></li>
                    <li><i class="fas fa-chevron-right text-[10px]"></i></li>
                    <li><a href="{{ route('services.index') }}" class="hover:text-primary-600 transition-colors">Services</a></li>
                    <li><i class="fas fa-chevron-right text-[10px]"></i></li>
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
                        ৳{{ number_format($service->price, 0) }}
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
                        <i class="fas fa-list text-primary-600"></i>
                        What's Included?
                    </h5>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex items-center gap-4 group">
                            <div class="w-10 h-10 rounded-xl bg-white shadow-sm flex items-center justify-center text-primary-600 text-xl group-hover:bg-primary-600 group-hover:text-white transition-all">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <span class="text-slate-700 font-bold">Certified Professional Care</span>
                        </div>
                        <div class="flex items-center gap-4 group">
                            <div class="w-10 h-10 rounded-xl bg-white shadow-sm flex items-center justify-center text-primary-600 text-xl group-hover:bg-primary-600 group-hover:text-white transition-all">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <span class="text-slate-700 font-bold">24/7 Support Access</span>
                        </div>
                        <div class="flex items-center gap-4 group">
                            <div class="w-10 h-10 rounded-xl bg-white shadow-sm flex items-center justify-center text-primary-600 text-xl group-hover:bg-primary-600 group-hover:text-white transition-all">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <span class="text-slate-700 font-bold">Personalized Care Plan</span>
                        </div>
                        <div class="flex items-center gap-4 group">
                            <div class="w-10 h-10 rounded-xl bg-white shadow-sm flex items-center justify-center text-primary-600 text-xl group-hover:bg-primary-600 group-hover:text-white transition-all">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <span class="text-slate-700 font-bold">Verified Health Experts</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Multi-Step Booking Form -->
            <div class="w-full lg:w-5/12 fade-in-up" style="animation-delay: 0.1s">
                <div class="sticky top-32 glass-effect p-8 rounded-[2.5rem] shadow-premium-hover border border-white">
                    <h4 class="text-2xl font-display font-black text-slate-900 mb-6">Book This Service</h4>

                    <!-- Step Progress Indicator -->
                    <div id="stepIndicator" class="flex items-center gap-2 mb-8">
                        <div class="step-dot active flex items-center justify-center w-9 h-9 rounded-full bg-primary-600 text-white text-sm font-black shadow-lg shadow-primary-200 transition-all">1</div>
                        <div class="flex-1 h-1 rounded-full bg-slate-100 overflow-hidden"><div id="progressBar1" class="h-full bg-primary-600 w-0 transition-all duration-500"></div></div>
                        <div class="step-dot flex items-center justify-center w-9 h-9 rounded-full bg-slate-100 text-slate-400 text-sm font-black transition-all" id="dot2">2</div>
                        <div class="flex-1 h-1 rounded-full bg-slate-100 overflow-hidden"><div id="progressBar2" class="h-full bg-primary-600 w-0 transition-all duration-500"></div></div>
                        <div class="step-dot flex items-center justify-center w-9 h-9 rounded-full bg-slate-100 text-slate-400 text-sm font-black transition-all" id="dot3">3</div>
                    </div>

                    <!-- Alert Box -->
                    <div id="bookingAlert" class="hidden mb-6 p-4 rounded-2xl font-bold" role="alert"></div>

                    <form id="bookingForm" class="space-y-5" novalidate>
                            @csrf
                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                            <input type="hidden" id="combined_booking_date" name="booking_date">

                            {{-- ====================== STEP 1: Schedule ====================== --}}
                            <div id="step1">
                                <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-5">Step 1 — Schedule & Caregiver</p>

                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 px-1">Preferred Caregiver (Optional)</label>
                                    <div class="relative group">
                                        <select name="caregiver_id" class="w-full bg-white border border-slate-100 rounded-2xl py-4 px-6 appearance-none focus:outline-none focus:ring-4 focus:ring-primary-600/10 focus:border-primary-600 transition-all font-bold text-slate-900">
                                            <option value="">Any Available Caregiver</option>
                                            @foreach($caregivers as $caregiver)
                                                <option value="{{ $caregiver->id }}">{{ $caregiver->user->name }} — {{ $caregiver->speciality }}</option>
                                            @endforeach
                                        </select>
                                        <div class="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 px-1">Scheduled Date</label>
                                    <div class="relative">
                                        <input type="text" id="booking_date_display" class="w-full bg-white border border-slate-100 rounded-2xl py-4 px-6 pl-14 focus:outline-none focus:ring-4 focus:ring-primary-600/10 focus:border-primary-600 transition-all font-bold text-slate-900 cursor-pointer" placeholder="Select a date" required readonly>
                                        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-primary-600 text-lg pointer-events-none">
                                            <i class="far fa-calendar-alt"></i>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 px-1">Preferred Time</label>
                                    <div class="relative">
                                        <input type="text" id="booking_time_display" class="w-full bg-white border border-slate-100 rounded-2xl py-4 px-6 pl-14 focus:outline-none focus:ring-4 focus:ring-primary-600/10 focus:border-primary-600 transition-all font-bold text-slate-900 cursor-pointer" placeholder="Select a time" required readonly>
                                        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-primary-600 text-lg pointer-events-none">
                                            <i class="far fa-clock"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Price Summary -->
                                <div class="bg-slate-50/80 rounded-2xl p-5 border border-slate-100">
                                    <div class="flex justify-between mb-2">
                                        <span class="text-slate-500 font-bold text-sm">Service Fee</span>
                                        <span class="text-slate-900 font-black">৳{{ number_format($service->price, 0) }}</span>
                                    </div>
                                    <div class="flex justify-between text-sm">
                                        <span class="text-slate-500 font-bold">Booking Charge</span>
                                        <span class="text-green-600 font-black">FREE</span>
                                    </div>
                                    <div class="h-px bg-slate-200 my-3"></div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-slate-900 font-black text-sm">Required Advance</span>
                                        <span class="text-lg text-primary-600 font-black">৳{{ App\Models\Setting::get('minimum_advance', '500') }}+</span>
                                    </div>
                                </div>

                                <button type="button" id="nextToStep2" class="w-full bg-primary-600 text-white py-4 rounded-[1.5rem] font-bold text-base shadow-xl shadow-primary-200 hover:bg-primary-700 hover:-translate-y-0.5 active:scale-95 transition-all duration-300">
                                    Continue to Patient Details <i class="fas fa-arrow-right ml-2"></i>
                                </button>
                            </div>

                            {{-- ====================== STEP 2: Patient Info ====================== --}}
                            <div id="step2" class="hidden">
                                <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-5">Step 2 — Patient Information</p>

                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 px-1">Patient Full Name <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <input type="text" name="patient_name" id="patient_name" class="w-full bg-white border border-slate-100 rounded-2xl py-4 px-6 pl-14 focus:outline-none focus:ring-4 focus:ring-primary-600/10 focus:border-primary-600 transition-all font-bold text-slate-900" placeholder="e.g. Mohammad Rahman">
                                        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-primary-600 text-lg pointer-events-none"><i class="fas fa-user-injured"></i></div>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 px-1">Contact Number <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <input type="tel" name="patient_phone" id="patient_phone" class="w-full bg-white border border-slate-100 rounded-2xl py-4 px-6 pl-14 focus:outline-none focus:ring-4 focus:ring-primary-600/10 focus:border-primary-600 transition-all font-bold text-slate-900" placeholder="01XXXXXXXXX">
                                        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-primary-600 text-lg pointer-events-none"><i class="fas fa-phone"></i></div>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 px-1">Service Address <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <textarea name="patient_address" id="patient_address" rows="3" class="w-full bg-white border border-slate-100 rounded-2xl py-4 px-6 pl-14 focus:outline-none focus:ring-4 focus:ring-primary-600/10 focus:border-primary-600 transition-all font-bold text-slate-900 resize-none" placeholder="Full address where care is needed..."></textarea>
                                        <div class="absolute left-5 top-5 text-primary-600 text-lg pointer-events-none"><i class="fas fa-map-marker-alt"></i></div>
                                    </div>
                                </div>

                                @guest
                                <div class="mt-8 p-6 bg-primary-50/50 rounded-[2rem] border-2 border-dashed border-primary-200">
                                    <div class="flex items-start gap-4 mb-4">
                                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-primary-600 text-white flex items-center justify-center">
                                            <i class="fas fa-user-plus text-sm"></i>
                                        </div>
                                        <div>
                                            <h5 class="text-sm font-black text-slate-900">Create an account?</h5>
                                            <p class="text-xs text-slate-500 font-medium leading-relaxed">Save your details and track your booking status later.</p>
                                        </div>
                                    </div>

                                    <label class="flex items-center gap-3 cursor-pointer mb-5">
                                        <input type="checkbox" name="create_account" id="create_account" value="1" class="w-5 h-5 rounded-lg border-primary-300 text-primary-600 focus:ring-primary-600">
                                        <span class="text-sm font-bold text-slate-700">Yes, create my account</span>
                                    </label>

                                    <div id="registration_fields" class="hidden space-y-4">
                                        <div>
                                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 px-1">Account Email <span class="text-red-500">*</span></label>
                                            <div class="relative">
                                                <input type="email" name="email" id="email" class="w-full bg-white border border-slate-100 rounded-2xl py-4 px-6 pl-14 focus:outline-none focus:ring-4 focus:ring-primary-600/10 focus:border-primary-600 transition-all font-bold text-slate-900" placeholder="your@email.com">
                                                <div class="absolute left-5 top-1/2 -translate-y-1/2 text-primary-600 text-lg pointer-events-none"><i class="fas fa-envelope"></i></div>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 px-1">Account Password <span class="text-red-500">*</span></label>
                                            <div class="relative">
                                                <input type="password" name="password" id="password" class="w-full bg-white border border-slate-100 rounded-2xl py-4 px-6 pl-14 focus:outline-none focus:ring-4 focus:ring-primary-600/10 focus:border-primary-600 transition-all font-bold text-slate-900" placeholder="Min 8 characters">
                                                <div class="absolute left-5 top-1/2 -translate-y-1/2 text-primary-600 text-lg pointer-events-none"><i class="fas fa-lock"></i></div>
                                            </div>
                                            <p class="text-[10px] text-slate-400 mt-2 px-1 font-bold"><i class="fas fa-info-circle mr-1"></i> Your phone number above will be used as your contact number.</p>
                                        </div>
                                    </div>
                                </div>
                                @endguest

                                <div class="flex gap-3">
                                    <button type="button" id="backToStep1" class="flex-1 bg-slate-100 text-slate-700 py-4 rounded-[1.5rem] font-bold text-base hover:bg-slate-200 active:scale-95 transition-all duration-300">
                                        <i class="fas fa-arrow-left mr-2"></i> Back
                                    </button>
                                    <button type="button" id="nextToStep3" class="flex-2 flex-grow bg-primary-600 text-white py-4 rounded-[1.5rem] font-bold text-base shadow-xl shadow-primary-200 hover:bg-primary-700 hover:-translate-y-0.5 active:scale-95 transition-all duration-300">
                                        Continue to Payment <i class="fas fa-arrow-right ml-2"></i>
                                    </button>
                                </div>
                            </div>

                            {{-- ====================== STEP 3: Payment ====================== --}}
                            <div id="step3" class="hidden">
                                <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-4">Step 3 — Advance Payment</p>

                                @php
                                    $payInstruction = App\Models\Setting::get('payment_instruction', 'Send the advance payment to one of the accounts below, then enter your Transaction ID.');
                                    $bkashNum = App\Models\Setting::get('bkash_number', '01700-000000');
                                    $bkashType = App\Models\Setting::get('bkash_account_type', 'Personal');
                                    $nagadNum = App\Models\Setting::get('nagad_number', '01700-000001');
                                    $nagadType = App\Models\Setting::get('nagad_account_type', 'Personal');
                                    $bankName = App\Models\Setting::get('bank_name', 'Dutch-Bangla Bank');
                                    $bankAccName = App\Models\Setting::get('bank_account_name', 'HealoraHealth Ltd.');
                                    $bankAccNum = App\Models\Setting::get('bank_account_number', '1234567890');
                                    $bankRouting = App\Models\Setting::get('bank_routing_number', '090261234');
                                    $bankBranch = App\Models\Setting::get('bank_branch', 'Gulshan, Dhaka');
                                    $minAdvance = App\Models\Setting::get('minimum_advance', '500');
                                @endphp

                                <p class="text-xs text-slate-500 leading-relaxed mb-5 bg-amber-50 border border-amber-100 rounded-2xl p-4 text-amber-800 font-semibold">
                                    <i class="fas fa-info-circle text-amber-500 mr-1"></i> {{ $payInstruction }}
                                </p>

                                <!-- Payment Method Tabs -->
                                <div class="mb-5">
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3 px-1">Select Payment Method <span class="text-red-500">*</span></label>
                                    <div class="grid grid-cols-3 gap-2">
                                        <label class="payment-method-tab cursor-pointer" for="pm_bkash">
                                            <input type="radio" name="payment_method" id="pm_bkash" value="bkash" class="sr-only" required>
                                            <div class="pm-tab-btn text-center border-2 border-slate-100 rounded-2xl p-3 transition-all hover:border-pink-300 bg-white">
                                                <div class="w-8 h-8 rounded-full mx-auto mb-1 flex items-center justify-center text-white text-xs font-black" style="background: #E2136E;">bK</div>
                                                <span class="text-xs font-black text-slate-700">bKash</span>
                                            </div>
                                        </label>
                                        <label class="payment-method-tab cursor-pointer" for="pm_nagad">
                                            <input type="radio" name="payment_method" id="pm_nagad" value="nagad" class="sr-only">
                                            <div class="pm-tab-btn text-center border-2 border-slate-100 rounded-2xl p-3 transition-all hover:border-orange-300 bg-white">
                                                <div class="w-8 h-8 rounded-full mx-auto mb-1 flex items-center justify-center text-white text-xs font-black" style="background: #F7941D;">Na</div>
                                                <span class="text-xs font-black text-slate-700">Nagad</span>
                                            </div>
                                        </label>
                                        <label class="payment-method-tab cursor-pointer" for="pm_bank">
                                            <input type="radio" name="payment_method" id="pm_bank" value="bank_transfer" class="sr-only">
                                            <div class="pm-tab-btn text-center border-2 border-slate-100 rounded-2xl p-3 transition-all hover:border-blue-300 bg-white">
                                                <div class="w-8 h-8 rounded-full mx-auto mb-1 flex items-center justify-center text-white text-xs font-black bg-blue-600"><i class="fas fa-university text-xs"></i></div>
                                                <span class="text-xs font-black text-slate-700">Bank</span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <!-- Account Info Cards (shown based on selection) -->
                                <div id="account_bkash" class="account-info hidden bg-pink-50 border border-pink-100 rounded-2xl p-4 mb-4">
                                    <p class="text-xs font-black text-pink-700 uppercase tracking-widest mb-3 flex items-center gap-2">
                                        <span style="background:#E2136E" class="text-white rounded-full px-2 py-0.5 text-[10px]">bKash</span> Account Details
                                    </p>
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-xs text-slate-500 font-semibold">Number</span>
                                        <div class="flex items-center gap-2">
                                            <span id="bkash_display" class="font-black text-slate-900 text-lg tracking-widest">{{ $bkashNum }}</span>
                                            <button type="button" onclick="copyText('{{ $bkashNum }}', this)" class="text-xs text-pink-600 font-bold hover:underline copy-btn"><i class="far fa-copy"></i></button>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs text-slate-500 font-semibold">Account Type</span>
                                        <span class="font-bold text-slate-900 text-sm">{{ $bkashType }}</span>
                                    </div>
                                </div>

                                <div id="account_nagad" class="account-info hidden bg-orange-50 border border-orange-100 rounded-2xl p-4 mb-4">
                                    <p class="text-xs font-black text-orange-700 uppercase tracking-widest mb-3 flex items-center gap-2">
                                        <span style="background:#F7941D" class="text-white rounded-full px-2 py-0.5 text-[10px]">Nagad</span> Account Details
                                    </p>
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-xs text-slate-500 font-semibold">Number</span>
                                        <div class="flex items-center gap-2">
                                            <span id="nagad_display" class="font-black text-slate-900 text-lg tracking-widest">{{ $nagadNum }}</span>
                                            <button type="button" onclick="copyText('{{ $nagadNum }}', this)" class="text-xs text-orange-600 font-bold hover:underline copy-btn"><i class="far fa-copy"></i></button>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs text-slate-500 font-semibold">Account Type</span>
                                        <span class="font-bold text-slate-900 text-sm">{{ $nagadType }}</span>
                                    </div>
                                </div>

                                <div id="account_bank" class="account-info hidden bg-blue-50 border border-blue-100 rounded-2xl p-4 mb-4">
                                    <p class="text-xs font-black text-blue-700 uppercase tracking-widest mb-3 flex items-center gap-2">
                                        <span class="bg-blue-600 text-white rounded-full px-2 py-0.5 text-[10px]"><i class="fas fa-university"></i></span> Bank Details
                                    </p>
                                    <div class="space-y-2 text-sm">
                                        <div class="flex justify-between"><span class="text-slate-500 font-semibold">Bank</span><span class="font-black text-slate-900">{{ $bankName }}</span></div>
                                        <div class="flex justify-between"><span class="text-slate-500 font-semibold">Account Name</span><span class="font-bold text-slate-900">{{ $bankAccName }}</span></div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-slate-500 font-semibold">Account No.</span>
                                            <div class="flex items-center gap-2">
                                                <span class="font-black text-slate-900 tracking-widest">{{ $bankAccNum }}</span>
                                                <button type="button" onclick="copyText('{{ $bankAccNum }}', this)" class="text-xs text-blue-600 font-bold hover:underline copy-btn"><i class="far fa-copy"></i></button>
                                            </div>
                                        </div>
                                        <div class="flex justify-between"><span class="text-slate-500 font-semibold">Routing</span><span class="font-bold text-slate-900">{{ $bankRouting }}</span></div>
                                        <div class="flex justify-between"><span class="text-slate-500 font-semibold">Branch</span><span class="font-bold text-slate-900">{{ $bankBranch }}</span></div>
                                    </div>
                                </div>

                                <!-- Transaction ID + Amount -->
                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 px-1">Transaction ID / Reference <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <input type="text" name="transaction_id" id="transaction_id" class="w-full bg-white border border-slate-100 rounded-2xl py-4 px-6 pl-14 focus:outline-none focus:ring-4 focus:ring-primary-600/10 focus:border-primary-600 transition-all font-bold text-slate-900" placeholder="Enter your TrxID or Ref. number">
                                        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-primary-600 text-lg pointer-events-none"><i class="fas fa-hashtag"></i></div>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 px-1">Amount Sent (৳) <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <input type="number" name="advance_amount" id="advance_amount" class="w-full bg-white border border-slate-100 rounded-2xl py-4 px-6 pl-14 focus:outline-none focus:ring-4 focus:ring-primary-600/10 focus:border-primary-600 transition-all font-bold text-slate-900" placeholder="Minimum ৳{{ $minAdvance }}" min="{{ $minAdvance }}">
                                        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-primary-600 text-lg pointer-events-none"><i class="fas fa-taka-sign"></i></div>
                                    </div>
                                    <p class="text-xs text-slate-400 mt-1 px-2">Minimum advance: ৳{{ number_format((int)$minAdvance, 0) }}</p>
                                </div>

                                <div class="flex gap-3">
                                    <button type="button" id="backToStep2" class="flex-1 bg-slate-100 text-slate-700 py-4 rounded-[1.5rem] font-bold text-base hover:bg-slate-200 active:scale-95 transition-all">
                                        <i class="fas fa-arrow-left mr-2"></i> Back
                                    </button>
                                    <button type="submit" id="submitBooking" class="flex-2 flex-grow bg-primary-600 text-white py-4 rounded-[1.5rem] font-bold text-base shadow-xl shadow-primary-200 hover:bg-primary-700 hover:-translate-y-0.5 active:scale-95 transition-all duration-300">
                                        <i class="fas fa-check-circle mr-2"></i> Confirm Booking
                                    </button>
                                </div>
                            </div>

                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css">
<style>
    .flatpickr-calendar {
        border-radius: 1.5rem !important;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25) !important;
        border: 1px solid #e2e8f0 !important;
        overflow: hidden;
        font-family: inherit !important;
    }
    .flatpickr-day.selected, .flatpickr-day.selected:hover {
        background: #4f46e5 !important;
        border-color: #4f46e5 !important;
        border-radius: 0.75rem !important;
    }
    .flatpickr-day:hover {
        background: #eef2ff !important;
        border-radius: 0.75rem !important;
    }
    .flatpickr-day.today { border-color: #4f46e5 !important; border-radius: 0.75rem !important; }
    .flatpickr-day { border-radius: 0.75rem !important; }

    /* Payment method tab active state */
    input[type="radio"].sr-only:checked + .pm-tab-btn {
        border-color: #4f46e5 !important;
        background: #eef2ff !important;
        box-shadow: 0 0 0 3px rgba(79,70,229,0.15);
    }
    .step-dot { transition: all 0.4s ease; }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
$(document).ready(function() {

    // -------------------- Flatpickr --------------------
    let dateValue = '', timeValue = '09:00';

    flatpickr("#booking_date_display", {
        dateFormat: "Y-m-d",
        altInput: true,
        altFormat: "F j, Y",
        minDate: "today",
        disableMobile: true,
        monthSelectorType: "dropdown",
        onChange: function(selectedDates, dateStr) { dateValue = dateStr; }
    });

    flatpickr("#booking_time_display", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        altInput: true,
        altFormat: "h:i K",
        minTime: "08:00",
        maxTime: "20:00",
        minuteIncrement: 30,
        disableMobile: true,
        onChange: function(selectedDates, dateStr) { timeValue = dateStr; }
    });

    // -------------------- Step Navigation --------------------
    function goToStep(step) {
        $('#step1, #step2, #step3').addClass('hidden');
        $('#step' + step).removeClass('hidden');

        // Update dots
        for (let i = 1; i <= 3; i++) {
            const dot = i === 1 ? $('.step-dot').first() : $('#dot' + i);
            if (i < step) {
                dot.removeClass('bg-slate-100 text-slate-400 bg-primary-600').addClass('bg-green-500 text-white shadow-lg shadow-green-200').html('<i class="fas fa-check text-xs"></i>');
            } else if (i === step) {
                dot.removeClass('bg-slate-100 text-slate-400 bg-green-500').addClass('bg-primary-600 text-white shadow-lg shadow-primary-200').html(i);
            } else {
                dot.removeClass('bg-primary-600 bg-green-500 text-white shadow-lg shadow-primary-200 shadow-green-200').addClass('bg-slate-100 text-slate-400').html(i);
            }
        }
        // Update progress bars
        $('#progressBar1').css('width', step >= 2 ? '100%' : '0%');
        $('#progressBar2').css('width', step >= 3 ? '100%' : '0%');
    }

    // Step 1 → 2
    $('#nextToStep2').on('click', function() {
        if (!dateValue) {
            showAlert('Please select a date.', 'error'); return;
        }
        if (!timeValue) {
            showAlert('Please select a time.', 'error'); return;
        }
        $('#combined_booking_date').val(dateValue + ' ' + timeValue);
        goToStep(2);
        hideAlert();
    });

    // Step 2 → 3
    $('#nextToStep3').on('click', function() {
        const name = $('#patient_name').val().trim();
        const phone = $('#patient_phone').val().trim();
        const address = $('#patient_address').val().trim();
        
        if (!name || !phone || !address) {
            showAlert('Please fill in all patient details.', 'error');
            return;
        }

        // Account validation if checked
        if ($('#create_account').is(':checked')) {
            const email = $('#reg_email').val().trim();
            const pass = $('#reg_password').val().trim();
            if (!email || !pass) {
                showAlert('Please provide account email and password.', 'error');
                return;
            }
            if (pass.length < 8) {
                showAlert('Password must be at least 8 characters.', 'error');
                return;
            }
        }

        goToStep(3);
        hideAlert();
    });

    // Back buttons
    $('#backToStep1').on('click', function() { goToStep(1); hideAlert(); });
    $('#backToStep2').on('click', function() { goToStep(2); hideAlert(); });

    // -------------------- Guest Account Toggle --------------------
    $('#create_account').on('change', function() {
        if ($(this).is(':checked')) {
            $('#accountFields').slideDown(400);
        } else {
            $('#accountFields').slideUp(300);
        }
    });

    // -------------------- Payment Method Tabs --------------------
    $('input[name="payment_method"]').on('change', function() {
        const val = $(this).val();
        $('.account-info').addClass('hidden');
        if (val === 'bkash') $('#account_bkash').removeClass('hidden');
        else if (val === 'nagad') $('#account_nagad').removeClass('hidden');
        else if (val === 'bank_transfer') $('#account_bank').removeClass('hidden');
    });

    // -------------------- Copy to Clipboard --------------------
    window.copyText = function(text, btn) {
        navigator.clipboard.writeText(text).then(() => {
            const $btn = $(btn);
            $btn.html('<i class="fas fa-check text-green-500"></i>');
            setTimeout(() => $btn.html('<i class="far fa-copy"></i>'), 2000);
        });
    };

    // -------------------- Form Submit --------------------
    $('#bookingForm').on('submit', function(e) {
        e.preventDefault();

        // Guest Registration Validation
        if ($('#create_account').is(':checked')) {
            const email = $('#reg_email').val().trim();
            const pass = $('#reg_password').val().trim();
            if (!email || !pass) {
                showAlert('Please provide account details.', 'error');
                goToStep(2);
                return;
            }
            if (pass.length < 8) {
                showAlert('Password must be at least 8 characters.', 'error');
                goToStep(2);
                return;
            }
        }

        const method = $('input[name="payment_method"]:checked').val();
        const txn = $('#transaction_id').val().trim();
        const amt = $('#advance_amount').val();

        if (!method) { showAlert('Please select a payment method.', 'error'); return; }
        if (!txn) { showAlert('Please enter your Transaction ID.', 'error'); return; }
        if (!amt || parseFloat(amt) < {{ (int)$minAdvance }}) {
            showAlert('Advance amount must be at least ৳{{ number_format((int)$minAdvance, 0) }}.', 'error'); return;
        }

        const $btn = $('#submitBooking');
        $btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin mr-2"></i> Processing...');
        hideAlert();

        $.ajax({
            url: "{{ route('bookings.store') }}",
            type: "POST",
            data: $(this).serialize(),
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(response) {
                if (response.success) {
                    showAlert('🎉 ' + response.message, 'success');
                    $btn.html('<i class="fas fa-check-circle mr-2"></i> Booking Submitted!').addClass('bg-green-500').removeClass('bg-primary-600');
                    setTimeout(() => { window.location.href = "{{ route('bookings.index') }}"; }, 2500);
                }
            },
            error: function(xhr) {
                $btn.prop('disabled', false).html('<i class="fas fa-check-circle mr-2"></i> Confirm Booking');
                let msg = 'An error occurred. Please try again.';
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    msg = Object.values(errors).flat().join('<br>');
                }
                showAlert(msg, 'error');
            }
        });
    });

    function showAlert(msg, type) {
        const $a = $('#bookingAlert');
        $a.removeClass('hidden bg-green-50 text-green-700 bg-red-50 text-red-700');
        if (type === 'success') $a.addClass('bg-green-50 text-green-700');
        else $a.addClass('bg-red-50 text-red-700');
        $a.html(msg).removeClass('hidden');
    }
    function hideAlert() { $('#bookingAlert').addClass('hidden'); }
});
</script>
@endpush
