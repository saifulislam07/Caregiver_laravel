@extends('layouts.frontend')

@section('title', 'Our Caregivers')

@section('content')
    <!-- Page Header -->
    <section class="pt-32 pb-20 bg-slate-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(#4f46e5_1px,transparent_1px)] [background-size:30px_30px]"></div>
        </div>
        <div class="absolute -right-24 -bottom-24 w-96 h-96 bg-primary-600 rounded-full blur-[120px] opacity-20"></div>
        <div class="container mx-auto px-4 relative z-10 text-center">
            <h1 class="text-4xl lg:text-6xl font-display font-black text-white mb-6">
                Meet Our <span class="text-primary-400">Expert</span> Caregivers
            </h1>
            <p class="text-xl text-slate-400 max-w-2xl mx-auto font-medium">
                Dedicated professionals committed to providing the best home care experience with compassion and expertise.
            </p>
        </div>
    </section>

    <div class="container mx-auto px-4 py-24">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($caregivers as $caregiver)
                <div class="group fade-in-up" style="animation-delay: {{ $loop->index * 0.1 }}s">
                    <div class="relative bg-white rounded-[2.5rem] p-8 border border-slate-100 shadow-premium transition-all duration-500 hover:-translate-y-2 hover:shadow-premium-hover flex flex-col h-full">
                        <div class="flex items-center gap-6 mb-8">
                            <div class="relative">
                                <div class="w-20 h-20 rounded-2xl bg-primary-50 flex items-center justify-center text-primary-600 shadow-inner overflow-hidden">
                                    <img src="https://i.pravatar.cc/150?u={{ $caregiver->id }}" alt="{{ $caregiver->user->name }}" class="w-full h-full object-cover">
                                </div>
                                <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-secondary-500 border-4 border-white rounded-full flex items-center justify-center text-white text-xs">
                                    <ion-icon name="checkmark-circle"></ion-icon>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-xl font-display font-black text-slate-900 group-hover:text-primary-600 transition-colors">
                                    {{ $caregiver->user->name }}
                                </h3>
                                <p class="text-primary-600 font-bold text-sm uppercase tracking-wider">
                                    {{ $caregiver->speciality }}
                                </p>
                                <div class="flex items-center gap-1 text-amber-400 mt-1">
                                    @for($i = 0; $i < 5; $i++)
                                        <ion-icon name="{{ $i < floor($caregiver->rating) ? 'star' : ($i < $caregiver->rating ? 'star-half' : 'star-outline') }}" class="text-sm"></ion-icon>
                                    @endfor
                                    <span class="text-slate-400 text-xs font-bold ml-1">({{ $caregiver->rating }})</span>
                                </div>
                            </div>
                        </div>

                        <p class="text-slate-500 leading-relaxed mb-8 flex-grow">
                            {{ Str::limit($caregiver->bio, 120) }}
                        </p>

                        <div class="pt-6 border-t border-slate-50 flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-[10px] uppercase tracking-widest font-black text-slate-400">Experience</span>
                                <span class="text-slate-900 font-bold">{{ $caregiver->experience }}</span>
                            </div>
                            <a href="{{ route('services.index') }}" class="flex items-center gap-2 bg-primary-50 text-primary-600 px-6 py-2.5 rounded-xl font-bold hover:bg-primary-600 hover:text-white transition-all duration-300">
                                <span>Book</span>
                                <ion-icon name="arrow-forward"></ion-icon>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center">
                    <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center text-slate-400 mx-auto mb-6">
                        <ion-icon name="people-outline" class="text-4xl"></ion-icon>
                    </div>
                    <p class="text-slate-500 font-bold">No caregivers found at the moment.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-16">
            {{ $caregivers->links() }}
        </div>
    </div>
@endsection
