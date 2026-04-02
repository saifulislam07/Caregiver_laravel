@extends('layouts.frontend')

@section('title', $page->title)
@section('meta_description', $page->meta_description)

@section('content')
    <!-- Page Header -->
    <section class="pt-40 pb-20 bg-slate-50 relative overflow-hidden">
        <div class="absolute inset-0 bg-primary-600/5 clip-path-hero"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl lg:text-6xl font-display font-black text-slate-900 mb-6">
                    {{ $page->title }}
                </h1>
                <div class="flex items-center justify-center gap-4 text-slate-500 font-medium">
                    <a href="{{ route('home') }}" class="hover:text-primary-600 transition-colors">Home</a>
                    <ion-icon name="chevron-forward-outline"></ion-icon>
                    <span class="text-primary-600">Dynamic Page</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Page Content -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto prose prose-lg prose-slate prose-headings:font-display prose-headings:font-black prose-a:text-primary-600">
                {!! $page->content !!}
            </div>
        </div>
    </section>
@endsection
