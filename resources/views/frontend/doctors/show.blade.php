@extends('layouts.frontend')

@section('title', $doctor->user->name . ' - Doctor Profile')

@section('content')
<section class="pt-32 pb-40 min-h-screen bg-slate-50">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-3 text-sm text-slate-400 mb-12">
            <a href="{{ route('home') }}" class="hover:text-primary-600 transition-colors">Home</a>
            <ion-icon name="chevron-forward-outline"></ion-icon>
            <a href="{{ route('doctors.index') }}" class="hover:text-primary-600 transition-colors">Doctors</a>
            <ion-icon name="chevron-forward-outline"></ion-icon>
            <span class="text-slate-900 font-medium">{{ $doctor->user->name }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 xl:gap-24">
            <!-- Left: Stats & Image -->
            <div class="lg:col-span-4 space-y-8">
                <div class="relative rounded-[3.5rem] bg-white border border-slate-100 overflow-hidden shadow-2xl shadow-slate-200/50">
                    <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&q=80&w=870" alt="{{ $doctor->user->name }}" class="w-full h-full object-cover">
                    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 w-[90%] bg-white/30 backdrop-blur-md rounded-2xl p-4 border border-white/40 flex items-center justify-between text-white">
                        <div>
                            <span class="block text-xs font-bold uppercase tracking-widest opacity-80">Consultancy Fee</span>
                            <span class="text-xl font-black">৳{{ $doctor->consultation_fee }}</span>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-primary-600 flex items-center justify-center shadow-lg">
                            <ion-icon name="card-outline" class="text-2xl"></ion-icon>
                        </div>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm text-center">
                        <span class="block text-3xl font-black text-slate-900 mb-1">{{ $doctor->experience_years }}+</span>
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Years Exp.</span>
                    </div>
                    <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm text-center">
                        <span class="block text-3xl font-black text-slate-900 mb-1">5k+</span>
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Patients</span>
                    </div>
                </div>
                
                <!-- Quick Info -->
                <div class="bg-slate-900 rounded-[2.5rem] p-8 text-white">
                    <h4 class="text-xl font-black mb-6">Contact Info</h4>
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center text-primary-400"><ion-icon name="call-outline" class="text-xl"></ion-icon></div>
                            <div>
                                <span class="block text-xs text-slate-400 font-bold uppercase">Phone</span>
                                <span class="text-sm font-bold">{{ $doctor->phone ?? '+880 1234 567 890' }}</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center text-primary-400"><ion-icon name="mail-outline" class="text-xl"></ion-icon></div>
                            <div>
                                <span class="block text-xs text-slate-400 font-bold uppercase">Email</span>
                                <span class="text-sm font-bold">{{ $doctor->user->email }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Details -->
            <div class="lg:col-span-8 flex flex-col">
                <div class="flex-1">
                    <div class="mb-12">
                        <span class="inline-flex items-center gap-2 bg-primary-50 text-primary-600 px-4 py-2 rounded-xl text-sm font-bold border border-primary-100 mb-6 uppercase tracking-widest">
                            <ion-icon name="ribbon-outline"></ion-icon>
                            Specialist in {{ $doctor->department->name }}
                        </span>
                        <h1 class="text-5xl lg:text-7xl font-display font-black text-slate-900 mb-6 leading-tight">{{ $doctor->user->name }}</h1>
                        <p class="text-2xl text-slate-500 font-medium leading-relaxed max-w-2xl">
                            {{ $doctor->qualification }}
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-16">
                        <div>
                            <h4 class="text-xl font-black text-slate-900 mb-4 flex items-center gap-3">
                                <span class="w-2 h-8 bg-primary-600 rounded-full"></span>
                                Biography
                            </h4>
                            <p class="text-lg text-slate-500 leading-relaxed">
                                {{ $doctor->bio ?? 'A dedicated medical professional with extensive expertise in ' . $doctor->department->name . '. Committed to providing hospital-grade care and personalized medical advice to every patient.' }}
                            </p>
                        </div>
                        <div>
                            <h4 class="text-xl font-black text-slate-900 mb-4 flex items-center gap-3">
                                <span class="w-2 h-8 bg-secondary-500 rounded-full"></span>
                                Expertise
                            </h4>
                            <ul class="space-y-3">
                                <li class="flex items-center gap-3 text-slate-600 font-medium">
                                    <ion-icon name="checkmark-circle" class="text-primary-600"></ion-icon> Specialized Consultations
                                </li>
                                <li class="flex items-center gap-3 text-slate-600 font-medium">
                                    <ion-icon name="checkmark-circle" class="text-primary-600"></ion-icon> Diagnostic Reviews
                                </li>
                                <li class="flex items-center gap-3 text-slate-600 font-medium">
                                    <ion-icon name="checkmark-circle" class="text-primary-600"></ion-icon> Chronic Condition Management
                                </li>
                                <li class="flex items-center gap-3 text-slate-600 font-medium">
                                    <ion-icon name="checkmark-circle" class="text-primary-600"></ion-icon> Evidence-Based Medicine
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Appointment Card Wrapper -->
                    <div class="bg-white p-12 rounded-[3.5rem] border border-slate-100 shadow-premium flex flex-col md:flex-row items-center justify-between gap-12">
                        <div class="max-w-md">
                            <h3 class="text-3xl font-display font-black text-slate-900 mb-4">Book Your Appointment</h3>
                            <p class="text-slate-500 font-medium italic">Available for in-person and video consultations starting tomorrow at 9:00 AM.</p>
                        </div>
                        <a href="{{ route('services.index') }}" class="group flex items-center gap-4 bg-primary-600 text-white px-10 py-6 rounded-2xl font-bold text-xl hover:bg-primary-700 hover:-translate-y-1 transition-all duration-300 shadow-xl shadow-primary-200">
                            Book Now
                            <ion-icon name="arrow-forward" class="text-2xl group-hover:translate-x-2 transition-transform"></ion-icon>
                        </a>
                    </div>
                </div>

                <!-- Verified Badge -->
                <div class="mt-20 pt-12 border-t border-slate-200 flex flex-wrap items-center gap-8">
                    <div class="flex items-center gap-4 bg-slate-100 px-6 py-3 rounded-2xl">
                        <ion-icon name="shield-checkmark" class="text-2xl text-green-600"></ion-icon>
                        <span class="text-sm font-bold text-slate-600">BMDC Certified: {{ $doctor->bmdc_number }}</span>
                    </div>
                    <div class="flex items-center gap-4 bg-slate-100 px-6 py-3 rounded-2xl">
                        <ion-icon name="ribbon" class="text-2xl text-amber-500"></ion-icon>
                        <span class="text-sm font-bold text-slate-600">TakeFamilyCare Verified Team</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
