@extends('layouts.frontend')

@section('title', 'Specialized Departments - TakeFamilyCare')

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-20 overflow-hidden bg-slate-900 text-white">
    <div class="absolute inset-0 bg-[radial-gradient(#4f46e5_1px,transparent_1px)] [background-size:32px_32px] opacity-10"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl">
            <h1 class="text-5xl lg:text-7xl font-display font-black mb-8 leading-[1.1]">
                Specialized <span class="text-primary-400">Centers</span> of Excellence
            </h1>
            <p class="text-xl text-slate-400 leading-relaxed max-w-xl">
                Explore our world-class healthcare departments. Each center represents a pillar of clinical excellence and compassionate service.
            </p>
        </div>
    </div>
</section>

<!-- Department Grid -->
<section class="py-32 bg-white relative">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 xl:gap-12">
            @foreach($departments as $dept)
            <a href="{{ route('departments.show', $dept->slug) }}" class="group relative bg-white rounded-[3rem] p-10 border border-slate-100 shadow-premium hover:shadow-2xl hover:shadow-primary-600/10 transition-all duration-500 hover:-translate-y-2 flex flex-col items-center text-center">
                <div class="w-24 h-24 rounded-[2rem] bg-slate-50 flex items-center justify-center text-primary-600 text-5xl mb-8 group-hover:bg-primary-600 group-hover:text-white transition-all duration-500 group-hover:-rotate-6 shadow-glow">
                    <ion-icon name="medical-outline"></ion-icon>
                </div>
                
                <h3 class="text-3xl font-display font-black text-slate-900 mb-6 group-hover:text-primary-600 transition-colors">
                    {{ $dept->name }}
                </h3>
                
                <p class="text-slate-500 leading-relaxed mb-10 flex-grow font-medium">
                    {{ $dept->description ?? 'World-class medical facilities and specialized care team for all patients.' }}
                </p>
                
                <div class="inline-flex items-center gap-3 text-primary-600 font-bold group-hover:gap-5 transition-all">
                    View Department
                    <ion-icon name="arrow-forward-outline" class="text-xl"></ion-icon>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Information Banner -->
<section class="pb-32 bg-white">
    <div class="container mx-auto px-4">
        <div class="bg-primary-600 rounded-[3rem] p-12 lg:p-20 text-white relative overflow-hidden shadow-2xl shadow-primary-200">
            <div class="absolute right-0 top-0 w-1/3 h-full bg-white/10 skew-x-12"></div>
            <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between gap-12">
                <div class="max-w-xl text-center lg:text-left">
                    <h2 class="text-3xl lg:text-5xl font-display font-black mb-6 leading-tight">Need help choosing a department?</h2>
                    <p class="text-xl text-primary-100 font-medium">Our consultants are available 24/7 to guide you to the right medical expert.</p>
                </div>
                <a href="#" class="px-10 py-6 bg-white text-primary-600 rounded-[2rem] font-bold text-xl hover:shadow-xl hover:-translate-y-1 transition-all">Get Guidance Now</a>
            </div>
        </div>
    </div>
</section>
@endsection
