@extends('layouts.frontend')

@section('title', 'Photo Gallery - TakeFamilyCare')

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-20 overflow-hidden bg-slate-900 border-b border-slate-100 text-white">
    <div class="absolute inset-0 bg-[radial-gradient(#4f46e5_1px,transparent_1px)] [background-size:24px_24px] opacity-10"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-5xl lg:text-7xl font-display font-black mb-6 leading-[1.1]">
            Our <span class="text-primary-400">Gallery</span>
        </h1>
        <p class="text-xl text-slate-400 mb-8 leading-relaxed max-w-2xl mx-auto italic">
            A glimpse into our facility, compassionate medical team, and community impact. 
        </p>
    </div>
</section>

<!-- Filter Tabs -->
<section class="py-12 bg-white sticky top-20 z-30 shadow-sm border-b border-slate-100">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap gap-4 justify-center">
            <a href="{{ route('gallery.index') }}" class="px-8 py-4 rounded-2xl font-bold transition-all {{ !request('category') ? 'bg-primary-600 text-white shadow-xl shadow-primary-200' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                All Photos
            </a>
            @foreach($categories as $cat)
            <a href="{{ route('gallery.index', ['category' => $cat->slug]) }}" class="px-8 py-4 rounded-2xl font-bold transition-all {{ request('category') == $cat->slug ? 'bg-primary-600 text-white shadow-xl shadow-primary-200' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                {{ $cat->name }}
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Image Grid -->
<section class="py-24 bg-white min-h-screen">
    <div class="container mx-auto px-4">
        <div class="columns-1 sm:columns-2 lg:columns-3 xl:columns-4 gap-8 space-y-8">
            @forelse($images as $image)
            <a href="{{ Str::startsWith($image->image_path, 'http') ? $image->image_path : asset($image->image_path) }}" class="glightbox block break-inside-avoid relative group rounded-[2.5rem] overflow-hidden bg-slate-100 border border-slate-100 hover:shadow-2xl hover:shadow-primary-100 transition-all duration-500 hover:-translate-y-2" data-gallery="facility-gallery" data-title="{{ $image->title }}" data-description="{{ $image->category->name }}">
                <img src="{{ Str::startsWith($image->image_path, 'http') ? $image->image_path : asset($image->image_path) }}" alt="{{ $image->title }}" class="w-full h-full object-cover">
                
                <!-- Hover Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex flex-col justify-end p-8 text-white">
                    <span class="inline-block px-3 py-1 bg-primary-600/80 backdrop-blur-sm rounded-full text-xs font-bold uppercase tracking-widest mb-4 w-fit">
                        {{ $image->category->name }}
                    </span>
                    <h3 class="text-2xl font-black mb-2 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 translate-y-4 transition-all duration-500 delay-100">{{ $image->title }}</h3>
                    <p class="text-sm font-medium text-slate-300 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 translate-y-4 transition-all duration-500 delay-200">TakeFamilyCare Health Facility</p>
                </div>

                <!-- Simple Badge if not hovered -->
                <div class="absolute top-6 left-6 group-hover:opacity-0 transition-opacity">
                    <span class="px-4 py-2 bg-white/40 backdrop-blur-md rounded-xl text-[10px] font-black uppercase text-slate-900 tracking-widest border border-white/20">
                        {{ $image->category->name }}
                    </span>
                </div>
            </a>
            @empty
            <div class="col-span-full py-20 text-center col-span-4">
                <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-400">
                    <ion-icon name="images-outline" class="text-4xl"></ion-icon>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-2">No photos found</h3>
                <p class="text-slate-500 font-medium italic">We haven't added any photos to this category yet.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-20">
            {{ $images->appends(request()->query())->links() }}
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const lightbox = GLightbox({
            selector: '.glightbox',
            touchNavigation: true,
            loop: true,
            zoomable: true
        });
    });
</script>
@endpush
