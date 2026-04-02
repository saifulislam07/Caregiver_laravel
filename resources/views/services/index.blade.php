@extends('layouts.frontend')

@section('title', 'Our Services')

@section('content')
    <!-- Page Header -->
    <section class="pt-32 pb-20 bg-slate-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(#4f46e5_1px,transparent_1px)] [background-size:30px_30px]"></div>
        </div>
        <div class="absolute -right-24 -bottom-24 w-96 h-96 bg-primary-600 rounded-full blur-[120px] opacity-20"></div>
        <div class="container mx-auto px-4 relative z-10 text-center">
            <h1 class="text-4xl lg:text-6xl font-display font-black text-white mb-6">
                Professional <span class="text-primary-400">Home Care</span> Services
            </h1>
            <p class="text-xl text-slate-400 max-w-2xl mx-auto font-medium">
                Choose from our wide range of specialized healthcare solutions tailored for your family's needs.
            </p>
        </div>
    </section>

    <!-- Services Grid -->
    <div class="container mx-auto px-4 py-24">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($services as $service)
                <div class="group relative fade-in-up" style="animation-delay: {{ $loop->index * 0.1 }}s">
                    <div class="absolute inset-0 bg-primary-600 rounded-[2rem] rotate-0 group-hover:rotate-2 transition-transform duration-500"></div>
                    <div class="relative h-[480px] bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-premium transition-transform duration-500 group-hover:-translate-y-2 flex flex-col">
                        <div class="h-48 relative overflow-hidden">
                            <img src="{{ $service->image ?? 'https://images.unsplash.com/photo-1576091160550-217359f42f8c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80' }}" alt="{{ $service->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute top-4 right-4">
                                <div class="bg-white/90 backdrop-blur-md px-3 py-1 rounded-xl text-xs font-black text-primary-600 shadow-sm uppercase tracking-wider">
                                    ${{ number_format($service->price, 2) }}
                                </div>
                            </div>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <h3 class="text-xl font-display font-black text-slate-900 mb-3 group-hover:text-primary-600 transition-colors">
                                {{ $service->name }}
                            </h3>
                            <p class="text-slate-500 text-sm leading-relaxed mb-8 flex-grow line-clamp-3">
                                {{ $service->description }}
                            </p>
                            <a href="{{ route('services.show', $service->slug) }}" class="w-full flex items-center justify-center gap-2 bg-slate-900 text-white py-3 rounded-xl font-bold group-hover:bg-primary-600 transition-all active:scale-95">
                                <span>Book Now</span>
                                <ion-icon name="arrow-forward"></ion-icon>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center">
                    <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center text-slate-400 mx-auto mb-6">
                        <ion-icon name="folder-open-outline" class="text-4xl"></ion-icon>
                    </div>
                    <p class="text-slate-500 font-bold">No services found matching your criteria.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-16">
            {{ $services->links() }}
        </div>
    </div>
@endsection
