@extends('layouts.frontend')

@section('title', 'Compassionate Home Care')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-[90vh] flex items-center pt-40 pb-32 overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 bg-slate-50/50"></div>
        <div class="absolute top-0 right-0 w-1/2 h-full bg-primary-600/5 clip-path-hero hidden lg:block"></div>
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-primary-100 rounded-full blur-3xl opacity-50"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-secondary-100 rounded-full blur-3xl opacity-30"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <div class="w-full lg:w-1/2 fade-in-up">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-50 text-primary-700 text-sm font-bold mb-8 shadow-sm border border-primary-100/50 animate-float">
                        <span class="flex h-2 w-2 rounded-full bg-primary-500 animate-ping"></span>
                        Trusted by 5,000+ Families
                    </div>
                    <h1 class="text-5xl lg:text-7xl font-display font-black leading-[1.1] text-slate-900 mb-8">
                        Quality Care for Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-primary-400">Loved Ones.</span>
                    </h1>
                    <p class="text-xl text-slate-600 leading-relaxed mb-10 max-w-xl">
                        ActiveCare provides professional and compassionate home-based caregiver and nursing services. Trust us to bring hospital-grade care to your doorstep.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('services.index') }}" class="group flex items-center gap-2 bg-primary-600 text-white px-8 py-4 rounded-2xl font-bold shadow-xl shadow-primary-200 hover:bg-primary-700 hover:-translate-y-1 transition-all duration-300">
                            Our Services
                            <ion-icon name="arrow-forward" class="text-xl group-hover:translate-x-1 transition-transform"></ion-icon>
                        </a>
                        <a href="#" class="flex items-center gap-2 bg-white text-slate-900 px-8 py-4 rounded-2xl font-bold shadow-premium hover:shadow-premium-hover hover:-translate-y-1 transition-all duration-300 border border-slate-100">
                            Watch Video
                            <ion-icon name="play-circle-outline" class="text-2xl text-primary-600"></ion-icon>
                        </a>
                    </div>

                    <div class="mt-12 flex items-center gap-6">
                        <div class="flex -space-x-4">
                            <img src="https://i.pravatar.cc/150?u=1" class="w-12 h-12 rounded-2xl border-4 border-white shadow-sm" alt="User">
                            <img src="https://i.pravatar.cc/150?u=2" class="w-12 h-12 rounded-2xl border-4 border-white shadow-sm" alt="User">
                            <img src="https://i.pravatar.cc/150?u=3" class="w-12 h-12 rounded-2xl border-4 border-white shadow-sm" alt="User">
                            <div class="w-12 h-12 rounded-2xl border-4 border-white shadow-sm bg-slate-900 flex items-center justify-center text-white text-xs font-bold font-display">+2k</div>
                        </div>
                        <div class="text-sm">
                            <div class="flex text-amber-400 mb-1">
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                            </div>
                            <span class="text-slate-500 font-medium">4.9/5 from 2,000+ reviews</span>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/2 relative fade-in-up" style="animation-delay: 0.2s">
                    <div class="relative z-10 rounded-[2.5rem] overflow-hidden shadow-2xl shadow-primary-900/10 border-[12px] border-white group">
                        <img src="{{ asset('images/hero.png') }}" alt="Compassionate Care" class="w-full h-auto scale-105 group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-primary-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>
                    
                    <!-- Floating Cards -->
                    <div class="absolute -bottom-8 -left-8 glass-effect p-6 rounded-3xl animate-float z-20">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-secondary-500 rounded-xl flex items-center justify-center text-white text-2xl shadow-lg shadow-secondary-200">
                                <ion-icon name="shield-checkmark"></ion-icon>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">Certified</h4>
                                <p class="text-xs text-slate-500 font-medium">Expert Nurses</p>
                            </div>
                        </div>
                    </div>

                    <div class="absolute -top-8 -right-8 glass-effect p-6 rounded-3xl animate-float z-20" style="animation-delay: -3s">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-primary-500 rounded-xl flex items-center justify-center text-white text-2xl shadow-lg shadow-primary-200">
                                <ion-icon name="heart"></ion-icon>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900">24/7 Care</h4>
                                <p class="text-xs text-slate-500 font-medium">Always here</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-32 bg-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary-50 rounded-full blur-3xl opacity-50 -translate-y-1/2 translate-x-1/2"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-end gap-8 mb-16">
                <div class="max-w-2xl fade-in-up">
                    <h2 class="text-4xl lg:text-5xl font-display font-black text-slate-900 mb-6 tracking-tight">
                        Our Specialized <span class="text-primary-600">Services</span>
                    </h2>
                    <p class="text-lg text-slate-600 leading-relaxed font-medium">
                        Tailored healthcare solutions for every stage of life. From neonatal support to geriatric care, we've got you covered.
                    </p>
                </div>
                <a href="{{ route('services.index') }}" class="group flex items-center gap-2 text-primary-600 font-bold text-lg hover:gap-4 transition-all duration-300">
                    Explore All Services
                    <ion-icon name="arrow-forward"></ion-icon>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($services as $service)
                    <div class="group relative fade-in-up" style="animation-delay: {{ $loop->index * 0.1 }}s">
                        <div class="absolute inset-0 bg-primary-600 rounded-[2.5rem] rotate-0 group-hover:rotate-3 transition-transform duration-500"></div>
                        <div class="relative h-[450px] bg-white rounded-[2.5rem] overflow-hidden border border-slate-100 shadow-premium transition-transform duration-500 group-hover:-translate-y-2 flex flex-col">
                            <div class="h-1/2 relative overflow-hidden">
                                <img src="{{ $service->image ?? 'https://images.unsplash.com/photo-1576091160550-217359f42f8c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80' }}" alt="{{ $service->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                <div class="absolute bottom-6 left-8">
                                    <span class="px-4 py-1.5 rounded-full bg-white/20 backdrop-blur-md text-white text-xs font-bold uppercase tracking-widest border border-white/30">
                                        ActiveCare Pro
                                    </span>
                                </div>
                            </div>
                            <div class="p-8 flex flex-col flex-grow">
                                <h3 class="text-2xl font-display font-black text-slate-900 mb-4 group-hover:text-primary-600 transition-colors">
                                    {{ $service->name }}
                                </h3>
                                <p class="text-slate-500 leading-relaxed mb-8 flex-grow line-clamp-2">
                                    {{ $service->description }}
                                </p>
                                <a href="{{ route('services.show', $service->slug) }}" class="flex items-center justify-between group/btn">
                                    <span class="font-bold text-slate-900 group-hover/btn:text-primary-600 transition-colors">Learn More</span>
                                    <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center text-slate-900 group-hover/btn:bg-primary-600 group-hover/btn:text-white transition-all">
                                        <ion-icon name="chevron-forward"></ion-icon>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center text-slate-400 mx-auto mb-6">
                            <ion-icon name="folder-open-outline" class="text-4xl"></ion-icon>
                        </div>
                        <p class="text-slate-500 font-bold">No services found at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-32 bg-slate-50 relative overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center gap-20">
                <div class="w-full lg:w-5/12 fade-in-up">
                    <h2 class="text-4xl lg:text-5xl font-display font-black text-slate-900 mb-8 leading-tight">
                        Why Thousands Choose <span class="text-primary-600">ActiveCare</span>
                    </h2>
                    <p class="text-lg text-slate-600 leading-relaxed mb-12 font-medium">
                        We don't just provide care; we build relationships. Our holistic approach ensures physical recovery and emotional well-being.
                    </p>
                    
                    <div class="space-y-8">
                        <div class="flex gap-6 group">
                            <div class="w-16 h-16 rounded-[1.25rem] bg-white shadow-premium flex items-center justify-center text-primary-600 text-3xl group-hover:bg-primary-600 group-hover:text-white transition-all duration-500 group-hover:-rotate-6">
                                <ion-icon name="medal-outline"></ion-icon>
                            </div>
                            <div>
                                <h4 class="text-xl font-display font-black text-slate-900 mb-2">Certified Excellence</h4>
                                <p class="text-slate-500 leading-relaxed">Our caregivers undergo 200+ hours of specialized clinical training.</p>
                            </div>
                        </div>

                        <div class="flex gap-6 group">
                            <div class="w-16 h-16 rounded-[1.25rem] bg-white shadow-premium flex items-center justify-center text-primary-600 text-3xl group-hover:bg-primary-600 group-hover:text-white transition-all duration-500 group-hover:-rotate-6">
                                <ion-icon name="time-outline"></ion-icon>
                            </div>
                            <div>
                                <h4 class="text-xl font-display font-black text-slate-900 mb-2">24/7 Rapid Response</h4>
                                <p class="text-slate-500 leading-relaxed">Emergency nursing support available within 30 minutes in metro areas.</p>
                            </div>
                        </div>

                        <div class="flex gap-6 group">
                            <div class="w-16 h-16 rounded-[1.25rem] bg-white shadow-premium flex items-center justify-center text-primary-600 text-3xl group-hover:bg-primary-600 group-hover:text-white transition-all duration-500 group-hover:-rotate-6">
                                <ion-icon name="heart-outline"></ion-icon>
                            </div>
                            <div>
                                <h4 class="text-xl font-display font-black text-slate-900 mb-2">Compassion First</h4>
                                <p class="text-slate-500 leading-relaxed">We match patients with caregivers based on personality and expertise.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-7/12 relative fade-in-up" style="animation-delay: 0.2s">
                    <div class="grid grid-cols-2 gap-6 scale-95 hover:scale-100 transition-transform duration-700">
                        <div class="pt-12">
                            <div class="rounded-[2.5rem] overflow-hidden shadow-2xl mb-6 border-8 border-white">
                                <img src="https://images.unsplash.com/photo-1581056771107-24ca5f033842?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Care" class="w-full h-auto">
                            </div>
                            <div class="rounded-[2.5rem] overflow-hidden shadow-2xl border-8 border-white">
                                <img src="https://images.unsplash.com/photo-1544161515-4ab6ce6db874?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Care 2" class="w-full h-auto">
                            </div>
                        </div>
                        <div>
                            <div class="rounded-[2.5rem] overflow-hidden shadow-2xl mb-6 border-8 border-white">
                                <img src="https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Care 3" class="w-full h-auto">
                            </div>
                            <div class="rounded-[2.5rem] overflow-hidden shadow-2xl border-8 border-white">
                                <img src="https://images.unsplash.com/photo-1586773860418-d3ad479603df?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Care 4" class="w-full h-auto">
                            </div>
                        </div>
                    </div>
                    <!-- Stats Badge -->
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-48 h-48 bg-primary-600 rounded-full flex flex-col items-center justify-center text-white text-center shadow-2xl shadow-primary-900/40 border-[12px] border-white z-20">
                        <span class="text-4xl font-display font-black leading-none">15k+</span>
                        <span class="text-xs font-bold uppercase tracking-widest mt-1">Lives<br>Impacted</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-32 bg-white relative overflow-hidden">
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-20 fade-in-up">
                <h2 class="text-4xl lg:text-5xl font-display font-black text-slate-900 mb-6">
                    How it <span class="text-primary-600">Works?</span>
                </h2>
                <p class="text-lg text-slate-600 font-medium">
                    Getting professional care for your loved ones is now simpler than ever. Just follow these three easy steps.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative">
                <!-- Connecting Line (Desktop) -->
                <div class="hidden md:block absolute top-1/4 left-0 w-full h-0.5 bg-slate-100 -z-10"></div>
                
                <!-- Step 1 -->
                <div class="group text-center fade-in-up" style="animation-delay: 0.1s">
                    <div class="w-20 h-20 bg-primary-50 rounded-3xl flex items-center justify-center text-primary-600 text-3xl mx-auto mb-8 shadow-glow border border-primary-100 group-hover:bg-primary-600 group-hover:text-white transition-all duration-500 group-hover:-translate-y-2">
                        1
                    </div>
                    <h4 class="text-2xl font-display font-black text-slate-900 mb-4">Initial Consultation</h4>
                    <p class="text-slate-500 leading-relaxed px-4">Contact us for a free assessment where we discuss your needs and medical requirements.</p>
                </div>

                <!-- Step 2 -->
                <div class="group text-center fade-in-up" style="animation-delay: 0.2s">
                    <div class="w-20 h-20 bg-primary-50 rounded-3xl flex items-center justify-center text-primary-600 text-3xl mx-auto mb-8 shadow-glow border border-primary-100 group-hover:bg-primary-600 group-hover:text-white transition-all duration-500 group-hover:-translate-y-2">
                        2
                    </div>
                    <h4 class="text-2xl font-display font-black text-slate-900 mb-4">Caregiver Matching</h4>
                    <p class="text-slate-500 leading-relaxed px-4">We match you with a certified caregiver who best fits the required clinical profile and personality.</p>
                </div>

                <!-- Step 3 -->
                <div class="group text-center fade-in-up" style="animation-delay: 0.3s">
                    <div class="w-20 h-20 bg-primary-50 rounded-3xl flex items-center justify-center text-primary-600 text-3xl mx-auto mb-8 shadow-glow border border-primary-100 group-hover:bg-primary-600 group-hover:text-white transition-all duration-500 group-hover:-translate-y-2">
                        3
                    </div>
                    <h4 class="text-2xl font-display font-black text-slate-900 mb-4">Start Your Care</h4>
                    <p class="text-slate-500 leading-relaxed px-4">Your caregiver begins providing compassionate support, followed by regular health progress reviews.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Packages Section -->
    <section class="py-32 bg-white relative">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-20 fade-in-up">
                <h2 class="text-4xl lg:text-5xl font-display font-black text-slate-900 mb-6">
                    Affordable Care <span class="text-primary-600">Packages</span>
                </h2>
                <p class="text-lg text-slate-600 font-medium">
                    Flexible plans designed to provide maximum value and peace of mind for your family.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($packages as $package)
                    <div class="group relative fade-in-up" style="animation-delay: {{ $loop->index * 0.1 }}s">
                        @if($loop->iteration == 2)
                            <div class="absolute -top-5 left-1/2 -translate-x-1/2 z-20">
                                <span class="bg-primary-600 text-white px-6 py-2 rounded-full text-xs font-black uppercase tracking-widest shadow-lg shadow-primary-200">
                                    Most Popular
                                </span>
                            </div>
                        @endif
                        
                        <div class="relative h-full bg-white rounded-[2.5rem] p-10 border-2 {{ $loop->iteration == 2 ? 'border-primary-600 shadow-2xl shadow-primary-900/10' : 'border-slate-100 shadow-premium' }} transition-all duration-500 hover:-translate-y-2">
                            <div class="text-center mb-10">
                                <h4 class="text-xl font-display font-black text-slate-900 mb-6">{{ $package->name }}</h4>
                                <div class="flex items-center justify-center gap-1">
                                    <span class="text-2xl font-bold text-slate-400 self-start mt-2">$</span>
                                    <span class="text-6xl font-display font-black text-slate-900 tracking-tight">{{ number_format($package->price, 0) }}</span>
                                    <span class="text-slate-400 font-bold self-end mb-2">/mo</span>
                                </div>
                            </div>
                            
                            <div class="h-px bg-slate-100 w-full mb-10"></div>
                            
                            <ul class="space-y-5 mb-12">
                                @if($package->features)
                                    @foreach($package->features as $feature)
                                        <li class="flex items-start gap-4">
                                            <div class="w-6 h-6 rounded-lg bg-primary-50 flex-shrink-0 flex items-center justify-center text-primary-600">
                                                <ion-icon name="checkmark-done" class="text-lg"></ion-icon>
                                            </div>
                                            <span class="text-slate-600 font-medium leading-tight">{{ $feature }}</span>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                            
                            <button class="w-full py-4 rounded-2xl font-bold transition-all duration-300 {{ $loop->iteration == 2 ? 'bg-primary-600 text-white shadow-xl shadow-primary-200 hover:bg-primary-700' : 'bg-slate-100 text-slate-900 hover:bg-slate-200' }}">
                                Get Started Now
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <p class="text-slate-500 font-bold">No packages available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-32 bg-slate-50 relative overflow-hidden">
        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-16 mb-20 text-center lg:text-left">
                <div class="w-full lg:w-1/2 fade-in-up">
                    <h2 class="text-4xl lg:text-5xl font-display font-black text-slate-900 mb-6">
                        Stories of <span class="text-primary-600">Recovery</span> and Happiness
                    </h2>
                    <p class="text-lg text-slate-600 font-medium leading-relaxed">
                        Don't just take our word for it. Hear from the families who have experienced the life-changing impact of ActiveCare.
                    </p>
                </div>
                <div class="w-full lg:w-1/2 flex justify-center lg:justify-end gap-12 fade-in-up" style="animation-delay: 0.2s">
                    <div class="text-center">
                        <span class="block text-4xl font-display font-black text-slate-900 mb-2">98%</span>
                        <span class="text-sm font-bold text-slate-500 uppercase tracking-widest">Satisfaction Rate</span>
                    </div>
                    <div class="text-center">
                        <span class="block text-4xl font-display font-black text-slate-900 mb-2">500+</span>
                        <span class="text-sm font-bold text-slate-500 uppercase tracking-widest">Success Stories</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white p-10 rounded-[2.5rem] shadow-premium hover-lift">
                    <div class="flex text-amber-400 mb-8 text-xl">
                        <ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon>
                    </div>
                    <p class="text-xl text-slate-700 leading-relaxed italic mb-10 font-medium">
                        "ActiveCare provided my father with exceptional nursing care after his surgery. The caregiver wasn't just professional but also felt like family. Highly recommended!"
                    </p>
                    <div class="flex items-center gap-4">
                        <img src="https://i.pravatar.cc/150?u=4" class="w-16 h-16 rounded-2xl grayscale hover:grayscale-0 transition-all duration-500" alt="Sarah Ahmed">
                        <div>
                            <h5 class="font-display font-black text-slate-900">Sarah Ahmed</h5>
                            <p class="text-sm text-slate-500 font-medium">Daughter of Patient</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white p-10 rounded-[2.5rem] shadow-premium hover-lift">
                    <div class="flex text-amber-400 mb-8 text-xl">
                        <ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon><ion-icon name="star"></ion-icon>
                    </div>
                    <p class="text-xl text-slate-700 leading-relaxed italic mb-10 font-medium">
                        "As a busy professional, I needed someone I could trust for my mother's daily needs. ActiveCare exceeded our expectations. Truly a professional and dependable service."
                    </p>
                    <div class="flex items-center gap-4">
                        <img src="https://i.pravatar.cc/150?u=5" class="w-16 h-16 rounded-2xl grayscale hover:grayscale-0 transition-all duration-500" alt="Rahman Mirza">
                        <div>
                            <h5 class="font-display font-black text-slate-900">Rahman Mirza</h5>
                            <p class="text-sm text-slate-500 font-medium">Verified Client</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-32 bg-white relative">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-20 fade-in-up">
                <h2 class="text-4xl lg:text-5xl font-display font-black text-slate-900 mb-6 font-primary">
                    Frequently Asked <span class="text-primary-600">Questions</span>
                </h2>
                <p class="text-lg text-slate-600 font-medium">
                    Got questions? We've got answers. If you can't find what you're looking for, feel free to contact us.
                </p>
            </div>

            <div class="max-w-4xl mx-auto space-y-6">
                <!-- FAQ Item 1 -->
                <div class="faq-item group border border-slate-100 rounded-3xl p-2 transition-all duration-300 hover:border-primary-100 hover:bg-primary-50/10">
                    <button class="faq-toggle w-full text-left p-6 flex justify-between items-center transition-all duration-300">
                        <span class="text-xl font-display font-black text-slate-900 group-hover:text-primary-600 font-primary">How do you vet your caregivers?</span>
                        <div class="faq-icon w-10 h-10 rounded-xl bg-slate-50 flex items-center justify-center text-slate-500 group-hover:bg-primary-600 group-hover:text-white transition-all duration-300">
                            <ion-icon name="add-outline" class="text-xl"></ion-icon>
                        </div>
                    </button>
                    <div class="faq-content px-6 pb-6 text-slate-500 leading-relaxed hidden">
                        All our caregivers undergo a rigorous background check, including clinical skills assessment, police verification, and personality matching.
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="faq-item group border border-slate-100 rounded-3xl p-2 transition-all duration-300 hover:border-primary-100 hover:bg-primary-50/10">
                    <button class="faq-toggle w-full text-left p-6 flex justify-between items-center transition-all duration-300">
                        <span class="text-xl font-display font-black text-slate-900 group-hover:text-primary-600 font-primary">Can I request a specific caregiver?</span>
                        <div class="faq-icon w-10 h-10 rounded-xl bg-slate-50 flex items-center justify-center text-slate-500 group-hover:bg-primary-600 group-hover:text-white transition-all duration-300">
                            <ion-icon name="add-outline" class="text-xl"></ion-icon>
                        </div>
                    </button>
                    <div class="faq-content px-6 pb-6 text-slate-500 leading-relaxed hidden">
                        Yes, if you've worked with someone before or have a specific gender or language preference, we do our best to accommodate your request.
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="faq-item group border border-slate-100 rounded-3xl p-2 transition-all duration-300 hover:border-primary-100 hover:bg-primary-50/10">
                    <button class="faq-toggle w-full text-left p-6 flex justify-between items-center transition-all duration-300">
                        <span class="text-xl font-display font-black text-slate-900 group-hover:text-primary-600 font-primary">Do you provide 24/7 support?</span>
                        <div class="faq-icon w-10 h-10 rounded-xl bg-slate-50 flex items-center justify-center text-slate-500 group-hover:bg-primary-600 group-hover:text-white transition-all duration-300">
                            <ion-icon name="add-outline" class="text-xl"></ion-icon>
                        </div>
                    </button>
                    <div class="faq-content px-6 pb-6 text-slate-500 leading-relaxed hidden">
                        Absolutely. We have specialized 24/7 care packages and a rapid response team for emergency clinical support.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Appointment CTA -->
        <div class="container mx-auto px-4">
            <div class="relative rounded-[3rem] bg-slate-900 overflow-hidden shadow-2xl p-12 lg:p-20">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-10 pointer-events-none">
                    <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(#4f46e5_1px,transparent_1px)] [background-size:20px_20px]"></div>
                </div>
                <div class="absolute -right-24 -bottom-24 w-96 h-96 bg-primary-600 rounded-full blur-[120px] opacity-40"></div>
                
                <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between gap-12 text-center lg:text-left">
                    <div class="max-w-2xl">
                        <h2 class="text-4xl lg:text-5xl font-display font-black text-white mb-6">
                            Need <span class="text-primary-400">Immediate</span> Consultation?
                        </h2>
                        <p class="text-xl text-slate-400 font-medium">
                            Our health experts are ready to help you choose the perfect care plan for your family's unique requirements.
                        </p>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="tel:+8801234567890" class="group flex items-center gap-3 bg-white text-slate-900 px-10 py-5 rounded-[2rem] font-bold text-lg hover:-translate-y-1 transition-all duration-300 shadow-2xl shadow-white/5">
                            <ion-icon name="call" class="text-2xl text-primary-600 group-hover:rotate-12 transition-transform"></ion-icon>
                            +880 1234 567 890
                        </a>
                        <a href="#" class="flex items-center gap-3 bg-slate-800 text-white px-10 py-5 rounded-[2rem] font-bold text-lg hover:bg-slate-700 transition-all duration-300 border border-slate-700">
                            Book Online
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    .clip-path-hero {
        clip-path: polygon(20% 0%, 100% 0%, 100% 100%, 0% 100%);
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        $('.faq-toggle').on('click', function() {
            const item = $(this).closest('.faq-item');
            const content = item.find('.faq-content');
            const icon = item.find('.faq-icon ion-icon');
            
            $('.faq-content').not(content).addClass('hidden');
            $('.faq-icon ion-icon').not(icon).attr('name', 'add-outline');
            
            content.toggleClass('hidden');
            if(content.hasClass('hidden')) {
                icon.attr('name', 'add-outline');
            } else {
                icon.attr('name', 'remove-outline');
            }
        });
    });
</script>
@endpush
