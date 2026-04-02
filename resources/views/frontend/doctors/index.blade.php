@extends('layouts.frontend')

@section('title', 'Our Doctors - TakeFamilyCare')

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-20 overflow-hidden bg-slate-50">
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-5xl lg:text-7xl font-display font-black text-slate-900 mb-6 leading-[1.1]">
            Our Specialist <span class="text-primary-600">Doctors</span>
        </h1>
        <p class="text-xl text-slate-600 mb-8 leading-relaxed max-w-2xl mx-auto">
            Meet our world-class medical team. Dedicated experts providing compassionate and personalized care for you and your family.
        </p>
    </div>
</section>

<!-- Filter & Search -->
<section class="py-12 bg-white sticky top-20 z-30 shadow-sm border-b border-slate-100">
    <div class="container mx-auto px-4">
        <form action="{{ route('doctors.index') }}" method="GET" class="flex flex-col lg:flex-row gap-6 items-center justify-between">
            <div class="flex flex-wrap gap-4 justify-center lg:justify-start">
                <a href="{{ route('doctors.index') }}" class="px-6 py-3 rounded-2xl font-bold transition-all {{ !request('department') ? 'bg-primary-600 text-white shadow-lg shadow-primary-200' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                    All Specialties
                </a>
                @foreach($departments as $dept)
                <a href="{{ route('doctors.index', ['department' => $dept->id]) }}" class="px-6 py-3 rounded-2xl font-bold transition-all {{ request('department') == $dept->id ? 'bg-primary-600 text-white shadow-lg shadow-primary-200' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                    {{ $dept->name }}
                </a>
                @endforeach
            </div>
            
            <div class="relative w-full lg:w-72">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name..." class="w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-primary-600/20 focus:border-primary-600 transition-all outline-none">
                <ion-icon name="search-outline" class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xl"></ion-icon>
            </div>
        </form>
    </div>
</section>

<!-- Doctor Grid -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @forelse($doctors as $doctor)
            <div class="group bg-white rounded-[2.5rem] border border-slate-100 p-4 hover:shadow-2xl hover:shadow-slate-200 transition-all duration-500 hover:-translate-y-2">
                <div class="relative aspect-[4/5] rounded-[2rem] overflow-hidden bg-slate-100 mb-6">
                    <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&q=80&w=870" alt="{{ $doctor->user->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-6">
                        <a href="{{ route('doctors.show', $doctor->id) }}" class="w-full bg-white text-slate-900 py-3 rounded-xl font-bold text-center hover:bg-primary-600 hover:text-white transition-all">View Profile</a>
                    </div>
                </div>

                <div class="px-2 text-center">
                    <span class="inline-block px-3 py-1 bg-primary-50 text-primary-600 text-xs font-bold rounded-full mb-3 uppercase tracking-wider">
                        {{ $doctor->department->name }}
                    </span>
                    <h3 class="text-xl font-black text-slate-900 mb-2 group-hover:text-primary-600 transition-colors">
                        {{ $doctor->user->name }}
                    </h3>
                    <p class="text-sm text-slate-500 font-medium mb-6 line-clamp-1">
                        {{ $doctor->qualification }}
                    </p>
                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                        <div class="text-left">
                            <span class="block text-xs text-slate-400 font-bold uppercase">Experience</span>
                            <span class="text-sm font-black text-slate-900">{{ $doctor->experience_years }} Years</span>
                        </div>
                        <a href="{{ route('doctors.show', $doctor->id) }}" class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center text-slate-900 hover:bg-primary-600 hover:text-white transition-all">
                            <ion-icon name="calendar-outline" class="text-xl"></ion-icon>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-20 text-center">
                <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-400">
                    <ion-icon name="medkit-outline" class="text-4xl"></ion-icon>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-2">No doctors found</h3>
                <p class="text-slate-500">Try adjusting your filters or search keywords.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-20">
            {{ $doctors->links() }}
        </div>
    </div>
</section>
@endsection
