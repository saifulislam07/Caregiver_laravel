@extends('layouts.frontend')

@section('title', 'Server Error')

@section('content')
    <div class="min-h-[80vh] flex items-center justify-center py-20 px-4 bg-slate-50">
        <div class="max-w-2xl w-full text-center">
            <div class="relative mb-12">
                <h1 class="text-[12rem] lg:text-[18rem] font-display font-black text-amber-500/10 leading-none select-none">500</h1>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    <div class="w-32 h-32 bg-white rounded-[2.5rem] shadow-xl flex items-center justify-center text-amber-500 border border-slate-100 mb-6 group animate-float">
                        <ion-icon name="bandage-outline" class="text-6xl group-hover:rotate-12 transition-transform duration-500"></ion-icon>
                    </div>
                    <h2 class="text-3xl lg:text-5xl font-display font-black text-slate-900 tracking-tight text-amber-600">Under Repair</h2>
                </div>
            </div>

            <p class="text-xl text-slate-500 mb-12 font-medium max-w-md mx-auto">
                Our servers are currently experiencing some issues. We're working hard to get things back on track. Please try again later.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3 bg-amber-600 text-white px-10 py-5 rounded-2xl font-bold text-lg hover:bg-amber-700 hover:-translate-y-1 transition-all duration-300 shadow-xl shadow-amber-200">
                    <ion-icon name="home-outline" class="text-2xl"></ion-icon>
                    Back to Safety
                </a>
                <a href="tel:+8801234567890" class="inline-flex items-center gap-3 bg-white text-slate-900 px-10 py-5 rounded-2xl font-bold text-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-slate-100">
                    Call Support
                </a>
            </div>
        </div>
    </div>
@endsection
