@extends('layouts.frontend')

@section('title', 'Health Shop - TakeFamilyCare')

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-20 overflow-hidden bg-slate-50">
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl">
            <h1 class="text-5xl lg:text-7xl font-display font-black text-slate-900 mb-6 leading-[1.1]">
                Wellness <span class="text-primary-600">Shop</span>
            </h1>
            <p class="text-xl text-slate-600 mb-8 leading-relaxed">
                Find all your essential medicines and healthcare products in one place. Curated by our experts for your well-being.
            </p>
        </div>
    </div>
</section>

<!-- Shop Content -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-12">
            <!-- Sidebar Filters -->
            <aside class="w-full lg:w-72 flex-shrink-0">
                <div class="sticky top-32 space-y-8">
                    <!-- Search -->
                    <div class="bg-slate-50 p-6 rounded-3xl border border-slate-100">
                        <h4 class="text-lg font-bold text-slate-900 mb-4">Search Products</h4>
                        <div class="relative">
                            <input type="text" placeholder="Search..." class="w-full pl-12 pr-4 py-3 bg-white border border-slate-200 rounded-2xl focus:ring-2 focus:ring-primary-600/20 focus:border-primary-600 transition-all outline-none">
                            <ion-icon name="search-outline" class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xl"></ion-icon>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="bg-slate-50 p-6 rounded-3xl border border-slate-100">
                        <h4 class="text-lg font-bold text-slate-900 mb-4">Categories</h4>
                        <div class="space-y-3">
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="checkbox" class="w-5 h-5 rounded-lg border-slate-300 text-primary-600 focus:ring-primary-600/20">
                                <span class="text-slate-600 group-hover:text-primary-600 transition-colors">Medicine</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="checkbox" class="w-5 h-5 rounded-lg border-slate-300 text-primary-600 focus:ring-primary-600/20">
                                <span class="text-slate-600 group-hover:text-primary-600 transition-colors">Wellness</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="checkbox" class="w-5 h-5 rounded-lg border-slate-300 text-primary-600 focus:ring-primary-600/20">
                                <span class="text-slate-600 group-hover:text-primary-600 transition-colors">Devices</span>
                            </label>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Product Grid -->
            <div class="flex-1">
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                    @forelse($products as $product)
                    <div class="group bg-white rounded-[2.5rem] border border-slate-100 p-4 hover:shadow-2xl hover:shadow-slate-200 transition-all duration-500 hover:-translate-y-2">
                        <div class="relative aspect-square rounded-[2rem] overflow-hidden bg-slate-100 mb-6">
                            <img src="{{ $product->image ?? 'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae' }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            
                            @if($product->stock <= 0)
                            <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-[2px] flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <a href="{{ route('shop.show', $product->slug) }}" class="bg-white text-slate-900 px-6 py-3 rounded-2xl font-bold hover:bg-primary-600 hover:text-white transition-all transform translate-y-4 group-hover:translate-y-0 duration-500">Pre-Order Now</a>
                            </div>
                            <div class="absolute top-4 left-4">
                                <span class="bg-red-500 text-white text-xs font-bold px-3 py-1.5 rounded-full uppercase tracking-wider shadow-lg">Out of Stock</span>
                            </div>
                            @endif
                        </div>

                        <div class="px-2 pb-2">
                            <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-primary-600 transition-colors">
                                <a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                            </h3>
                            <div class="flex items-center justify-between">
                                <span class="text-2xl font-black text-slate-900">৳{{ number_format($product->price, 2) }}</span>
                                <button class="w-12 h-12 rounded-2xl bg-slate-100 text-slate-900 flex items-center justify-center hover:bg-primary-600 hover:text-white transition-all duration-300">
                                    <ion-icon name="cart-outline" class="text-xl"></ion-icon>
                                </button>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full py-20 text-center">
                        <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-400">
                            <ion-icon name="cube-outline" class="text-4xl"></ion-icon>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-2">No products found</h3>
                        <p class="text-slate-500">We're updating our inventory. Please check back later!</p>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="mt-20">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
