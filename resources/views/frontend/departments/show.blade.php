@extends('layouts.frontend')

@section('title', $department->name . ' - Specialty Department')

@section('content')
<!-- Department Hero -->
<section class="relative pt-32 pb-32 lg:pt-48 lg:pb-48 overflow-hidden bg-slate-900 text-white">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&q=80&w=2053')] bg-cover bg-center mix-blend-overlay opacity-30"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/80 to-transparent"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-16 lg:gap-24">
            <div class="w-full lg:w-2/3">
                <nav class="flex items-center gap-3 text-sm text-slate-400 mb-8 uppercase tracking-widest font-bold">
                    <a href="{{ route('home') }}" class="hover:text-primary-400 transition-colors">Home</a>
                    <ion-icon name="chevron-forward-outline"></ion-icon>
                    <a href="{{ route('departments.index') }}" class="hover:text-primary-400 transition-colors">Departments</a>
                </nav>
                <h1 class="text-5xl lg:text-8xl font-display font-black mb-8 leading-[1.1]">{{ $department->name }}</h1>
                <p class="text-xl lg:text-2xl text-slate-400 leading-relaxed max-w-2xl font-medium">
                    {{ $department->description ?? 'Providing world-class medical expertise and specialized healthcare services for patients with complex medical needs.' }}
                </p>
            </div>
            <div class="w-full lg:w-1/3">
                <div class="bg-white/10 backdrop-blur-md rounded-[3rem] p-12 border border-white/20 text-center">
                    <div class="text-5xl font-black mb-2 text-primary-400">{{ $doctors->count() }}</div>
                    <div class="text-sm font-bold uppercase tracking-widest opacity-80 mb-8">Specialist Doctors</div>
                    <a href="#specialists" class="inline-block px-8 py-4 bg-primary-600 rounded-2xl font-bold hover:bg-primary-700 transition-all shadow-xl shadow-primary-900/50">Meet the Team</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Department Specialties -->
<section class="py-32 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-20">
            <div class="w-full lg:w-5/12">
                <h2 class="text-4xl lg:text-5xl font-display font-black text-slate-900 mb-8 leading-tight">Clinical Features of <span class="text-primary-600">{{ $department->name }}</span></h2>
                <p class="text-lg text-slate-600 leading-relaxed mb-12 font-medium">
                    Our department is equipped with state-of-the-art diagnostic tools and a team of globally trained medical professionals.
                </p>
                <div class="space-y-6">
                    <div class="flex items-center gap-6 p-6 rounded-3xl bg-slate-50 border border-slate-100 hover:bg-white hover:shadow-xl transition-all duration-300">
                        <div class="w-12 h-12 rounded-xl bg-primary-600 flex items-center justify-center text-white text-2xl shadow-lg">
                            <ion-icon name="pulse-outline"></ion-icon>
                        </div>
                        <h4 class="text-xl font-bold text-slate-900">Advanced Diagnostics</h4>
                    </div>
                    <div class="flex items-center gap-6 p-6 rounded-3xl bg-slate-50 border border-slate-100 hover:bg-white hover:shadow-xl transition-all duration-300">
                        <div class="w-12 h-12 rounded-xl bg-secondary-500 flex items-center justify-center text-white text-2xl shadow-lg">
                            <ion-icon name="people-outline"></ion-icon>
                        </div>
                        <h4 class="text-xl font-bold text-slate-900">Multidisciplinary Team</h4>
                    </div>
                    <div class="flex items-center gap-6 p-6 rounded-3xl bg-slate-50 border border-slate-100 hover:bg-white hover:shadow-xl transition-all duration-300">
                        <div class="w-12 h-12 rounded-xl bg-slate-900 flex items-center justify-center text-white text-2xl shadow-lg">
                            <ion-icon name="time-outline"></ion-icon>
                        </div>
                        <h4 class="text-xl font-bold text-slate-900">Zero Waiting Time</h4>
                    </div>
                </div>
            </div>
            
            <div id="specialists" class="w-full lg:w-7/12">
                <h3 class="text-3xl font-display font-black text-slate-900 mb-12">Department Specialists</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @forelse($doctors as $doctor)
                    <div class="group bg-slate-50 rounded-[2.5rem] p-6 hover:bg-white hover:shadow-2xl transition-all duration-500 border border-transparent hover:border-slate-100">
                        <div class="relative w-full aspect-square rounded-[2rem] overflow-hidden mb-6">
                            <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&q=80&w=870" alt="{{ $doctor->user->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <a href="{{ route('doctors.show', $doctor->id) }}" class="absolute inset-0 bg-slate-900/40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-500">
                                <span class="px-6 py-3 bg-white text-slate-900 rounded-xl font-bold">Profile Details</span>
                            </a>
                        </div>
                        <h4 class="text-xl font-black text-slate-900 mb-2 truncate group-hover:text-primary-600 transition-colors">
                            <a href="{{ route('doctors.show', $doctor->id) }}">{{ $doctor->user->name }}</a>
                        </h4>
                        <p class="text-sm font-bold text-slate-500 mb-6 uppercase tracking-widest line-clamp-1 italic">{{ $doctor->qualification }}</p>
                        <div class="flex items-center justify-between border-t border-slate-200 pt-6">
                            <div class="flex items-center gap-2">
                                <ion-icon name="ribbon-outline" class="text-primary-600 text-xl"></ion-icon>
                                <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">{{ $doctor->experience_years }} Yrs Exp.</span>
                            </div>
                            <a href="{{ route('services.index') }}" class="w-10 h-10 rounded-xl bg-primary-600 text-white flex items-center justify-center shadow-lg hover:scale-110 transition-transform">
                                <ion-icon name="calendar-outline" class="text-xl"></ion-icon>
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full py-20 text-center">
                        <p class="text-slate-500 font-bold italic">No doctors currently listed for this department.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
