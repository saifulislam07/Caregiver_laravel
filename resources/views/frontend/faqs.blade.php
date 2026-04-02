@extends('layouts.frontend')

@section('title', 'Frequently Asked Questions - TakeFamilyCare')

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-20 overflow-hidden bg-slate-50 border-b border-slate-100">
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-5xl lg:text-7xl font-display font-black text-slate-900 mb-6 leading-[1.1]">
            Common <span class="text-primary-600">Questions</span>
        </h1>
        <p class="text-xl text-slate-600 mb-8 leading-relaxed max-w-2xl mx-auto italic">
            Find answers to our most frequently asked questions about healthcare services, caregiver bookings, and specialized medical support.
        </p>
    </div>
</section>

<!-- FAQ Accordion -->
<section class="py-24 bg-white relative overflow-hidden">
    <!-- Abstract Background -->
    <div class="absolute -right-40 top-40 w-96 h-96 bg-primary-50 rounded-full blur-[100px] opacity-40"></div>
    <div class="absolute -left-40 bottom-40 w-96 h-96 bg-secondary-50 rounded-full blur-[100px] opacity-40"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto space-y-6">
            @forelse($faqs as $faq)
            <div class="faq-item group border border-slate-100 rounded-[2rem] p-2 transition-all duration-300 hover:border-primary-100 hover:bg-primary-50/10">
                <button class="faq-toggle w-full text-left p-8 flex justify-between items-start gap-6 transition-all duration-300">
                    <span class="text-xl lg:text-2xl font-display font-black text-slate-900 group-hover:text-primary-600 transition-colors leading-snug">
                        {{ $faq->question }}
                    </span>
                    <div class="faq-icon w-12 h-12 flex-shrink-0 rounded-2xl bg-slate-50 flex items-center justify-center text-slate-500 group-hover:bg-primary-600 group-hover:text-white transition-all duration-500 shadow-sm">
                        <ion-icon name="add-outline" class="text-2xl"></ion-icon>
                    </div>
                </button>
                <div class="faq-content px-8 pb-8 text-lg text-slate-500 leading-relaxed font-medium hidden animate-fade-in">
                    {{ $faq->answer }}
                </div>
            </div>
            @empty
            <div class="py-20 text-center">
                <p class="text-2xl text-slate-400 font-bold italic">No questions found at the moment. Please check back later.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Still have questions? -->
<section class="pb-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="bg-slate-900 rounded-[3rem] p-12 lg:p-20 text-white relative overflow-hidden shadow-2xl">
            <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between gap-12 text-center lg:text-left">
                <div class="max-w-xl">
                    <h2 class="text-4xl lg:text-5xl font-display font-black mb-6 leading-tight">Still have <span class="text-primary-400">questions</span>?</h2>
                    <p class="text-xl text-slate-400 font-medium leading-relaxed">Our support team is available 24/7. Call us or send a message for immediate assistance.</p>
                </div>
                <div class="flex flex-col sm:flex-row gap-6">
                    <a href="tel:+8801234567890" class="px-10 py-6 bg-primary-600 text-white rounded-[2rem] font-bold text-xl hover:bg-primary-700 hover:-translate-y-1 transition-all shadow-xl shadow-primary-900/50">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const faqs = document.querySelectorAll('.faq-item');
        
        faqs.forEach(faq => {
            const toggle = faq.querySelector('.faq-toggle');
            const icon = faq.querySelector('.faq-icon ion-icon');
            const content = faq.querySelector('.faq-content');
            
            toggle.addEventListener('click', () => {
                const isOpen = !content.classList.contains('hidden');
                
                // Close all others
                document.querySelectorAll('.faq-content').forEach(c => c.classList.add('hidden'));
                document.querySelectorAll('.faq-icon ion-icon').forEach(i => i.setAttribute('name', 'add-outline'));
                
                if (!isOpen) {
                    content.classList.remove('hidden');
                    icon.setAttribute('name', 'remove-outline');
                    faq.classList.add('bg-primary-50/10', 'border-primary-100');
                } else {
                    faq.classList.remove('bg-primary-50/10', 'border-primary-100');
                }
            });
        });
    });
</script>
@endsection
