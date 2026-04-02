@extends('layouts.frontend')

@section('title', $product->name . ' - TakeFamilyCare Shop')

@section('content')
<section class="pt-32 pb-40 min-h-screen bg-slate-50">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-3 text-sm text-slate-400 mb-12">
            <a href="{{ route('home') }}" class="hover:text-primary-600 transition-colors">Home</a>
            <ion-icon name="chevron-forward-outline"></ion-icon>
            <a href="{{ route('shop.index') }}" class="hover:text-primary-600 transition-colors">Shop</a>
            <ion-icon name="chevron-forward-outline"></ion-icon>
            <span class="text-slate-900 font-medium">{{ $product->name }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 xl:gap-24">
            <!-- Product Gallery -->
            <div class="space-y-6">
                <div class="aspect-square rounded-[3rem] bg-white border border-slate-100 overflow-hidden shadow-2xl shadow-slate-200/50">
                    <img src="{{ $product->image ?? 'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae' }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Product Info -->
            <div class="flex flex-col">
                <div class="flex-1">
                    <div class="mb-8">
                        @if($product->stock > 0)
                            <span class="inline-flex items-center gap-2 bg-green-50 text-green-700 px-4 py-2 rounded-xl text-sm font-bold border border-green-100 mb-6">
                                <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                                In Stock ({{ $product->stock }} Left)
                            </span>
                        @else
                            <span class="inline-flex items-center gap-2 bg-red-50 text-red-700 px-4 py-2 rounded-xl text-sm font-bold border border-red-100 mb-6">
                                <span class="w-2 h-2 rounded-full bg-red-500"></span>
                                Currently Unavailable
                            </span>
                        @endif
                        
                        <h1 class="text-4xl lg:text-5xl font-display font-black text-slate-900 mb-4">{{ $product->name }}</h1>
                        <div class="flex items-center gap-4">
                            <span class="text-4xl font-black text-primary-600">৳{{ number_format($product->price, 2) }}</span>
                            @if($product->old_price)
                            <span class="text-2xl text-slate-300 line-through">৳{{ number_format($product->old_price, 2) }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="prose prose-slate max-w-none mb-12">
                        <p class="text-xl text-slate-600 leading-relaxed">
                            {{ $product->description }}
                        </p>
                    </div>

                    <!-- Actions -->
                    <div class="flex flex-col sm:flex-row gap-4 mb-12">
                        @if($product->stock > 0)
                        <div class="flex items-center bg-white border border-slate-200 rounded-2xl p-1 shadow-sm">
                            <button class="w-12 h-12 flex items-center justify-center text-slate-400 hover:text-primary-600 transition-colors"><ion-icon name="remove-outline" class="text-xl"></ion-icon></button>
                            <input type="number" value="1" class="w-16 text-center font-bold text-slate-900 bg-transparent border-none focus:ring-0">
                            <button class="w-12 h-12 flex items-center justify-center text-slate-400 hover:text-primary-600 transition-colors"><ion-icon name="add-outline" class="text-xl"></ion-icon></button>
                        </div>
                        <button class="flex-1 bg-primary-600 text-white px-8 py-5 rounded-2xl font-bold text-lg hover:bg-primary-700 hover:-translate-y-1 transition-all duration-300 shadow-xl shadow-primary-200">
                            Add to Cart
                        </button>
                        @else
                        <button class="flex-1 bg-slate-900 text-white px-8 py-5 rounded-2xl font-bold text-lg hover:bg-slate-800 hover:-translate-y-1 transition-all duration-300 shadow-xl">
                            Notify Me
                        </button>
                        <a href="{{ route('pages.show', 'pre-order') }}" class="flex-1 bg-white text-slate-900 border border-slate-200 px-8 py-5 rounded-2xl font-bold text-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300 text-center">
                            Submit Pre-Order
                        </a>
                        @endif
                    </div>
                </div>

                <!-- Features -->
                <div class="grid grid-cols-2 gap-6 pt-12 border-t border-slate-200">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-white flex items-center justify-center text-primary-600 shadow-sm border border-slate-100">
                            <ion-icon name="shield-checkmark-outline" class="text-2xl"></ion-icon>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900">Original Product</h4>
                            <p class="text-xs text-slate-500">100% Quality Guaranteed</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-white flex items-center justify-center text-primary-600 shadow-sm border border-slate-100">
                            <ion-icon name="flash-outline" class="text-2xl"></ion-icon>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900">Fast Delivery</h4>
                            <p class="text-xs text-slate-500">Within 24-48 Hours</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
@if($relatedProducts->count() > 0)
<section class="py-32 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-display font-black text-slate-900 mb-12">Related Products</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($relatedProducts as $related)
            <div class="group bg-white rounded-3xl border border-slate-100 p-4 hover:shadow-2xl transition-all duration-500">
                <div class="relative aspect-square rounded-2xl overflow-hidden bg-slate-50 mb-4">
                    <img src="{{ $related->image ?? 'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae' }}" alt="{{ $related->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <h3 class="font-bold text-slate-900 mb-1 truncate"><a href="{{ route('shop.show', $related->slug) }}">{{ $related->name }}</a></h3>
                <span class="text-lg font-black text-primary-600">৳{{ number_format($related->price, 2) }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
