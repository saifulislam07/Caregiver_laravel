<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'ActiveCare')) - Premium Caregiver Services</title>
    <meta name="description" content="@yield('meta_description', 'Professional caregiver and nursing services at your doorstep. ActiveCare brings hospital-quality care to the comfort of your home.')">
    <meta name="keywords" content="@yield('meta_keywords', 'caregiver, nursing service, home care, elderly care, patient care, healthcare Bangladesh')">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title') - ActiveCare">
    <meta property="og:description" content="@yield('meta_description', 'Professional caregiver and nursing services at your doorstep.')">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title') - ActiveCare">
    <meta property="twitter:description" content="@yield('meta_description', 'Professional caregiver and nursing services at your doorstep.')">
    @verbatim
    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "ActiveCare",
      "url": "https://activecare.com",
      "logo": "https://activecare.com/images/logo.png",
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+880 1234 567 890",
        "contactType": "customer service",
        "areaServed": "BD",
        "availableLanguage": ["en", "bn"]
      },
      "sameAs": [
        "https://facebook.com/activecare",
        "https://twitter.com/activecare",
        "https://linkedin.com/company/activecare"
      ]
    }
    </script>
    @endverbatim


    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@@7.1.0/dist/ionicons/ionicons.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Styles moved to app.css for proper Tailwind processing */
    </style>
    @stack('styles')
</head>
<body class="antialiased selection:bg-primary-100 selection:text-primary-700">
    <!-- Top Bar (Desktop Only) -->
    <div class="hidden lg:flex bg-slate-900 py-2.5 text-[11px] font-semibold uppercase tracking-wider text-slate-400 border-b border-slate-800">
        <div class="container mx-auto px-12 flex justify-between items-center">
            <div class="flex items-center gap-8">
                <span class="flex items-center gap-2 hover:text-white transition-colors cursor-pointer">
                    <ion-icon name="call-outline" class="text-primary-400 text-sm"></ion-icon>
                    +880 1234 567 890
                </span>
                <span class="flex items-center gap-2 hover:text-white transition-colors cursor-pointer">
                    <ion-icon name="mail-outline" class="text-primary-400 text-sm"></ion-icon>
                    info@@activecare.com
                </span>
            </div>
            <div class="flex items-center gap-5">
                <a href="#" class="hover:text-white transition-colors"><ion-icon name="logo-facebook"></ion-icon></a>
                <a href="#" class="hover:text-white transition-colors"><ion-icon name="logo-twitter"></ion-icon></a>
                <a href="#" class="hover:text-white transition-colors"><ion-icon name="logo-linkedin"></ion-icon></a>
                <a href="#" class="hover:text-white transition-colors"><ion-icon name="logo-instagram"></ion-icon></a>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <header class="sticky top-0 z-50 transition-all duration-500 py-6" id="main-nav">
        <div class="container mx-auto px-4">
            <div id="nav-inner" class="bg-white/70 backdrop-blur-xl border border-white/40 rounded-[2rem] shadow-glass px-8 py-3 flex items-center justify-between transition-all duration-500">
                <!-- Branding -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-11 h-11 bg-primary-600 rounded-2xl flex items-center justify-center text-white shadow-xl shadow-primary-200 group-hover:scale-110 group-hover:rotate-3 transition-all duration-500">
                        <ion-icon name="heart" class="text-2xl"></ion-icon>
                    </div>
                    <span class="text-2xl font-display font-black tracking-tight text-slate-900 group-hover:text-primary-600 transition-colors">
                        Active<span class="text-primary-600">Care</span>
                    </span>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center gap-2">
                    <ul class="flex items-center gap-1 mr-4">
                        <li><a href="{{ route('home') }}" class="px-4 py-2 text-slate-600 font-bold transition-all duration-300 rounded-xl hover:text-primary-600 hover:bg-primary-50 text-sm {{ request()->routeIs('home') ? 'text-primary-600 bg-primary-50' : '' }}">Home</a></li>
                        <li><a href="{{ route('services.index') }}" class="px-4 py-2 text-slate-600 font-bold transition-all duration-300 rounded-xl hover:text-primary-600 hover:bg-primary-50 text-sm {{ request()->routeIs('services.*') ? 'text-primary-600 bg-primary-50' : '' }}">Services</a></li>
                        <li><a href="{{ route('caregivers.index') }}" class="px-4 py-2 text-slate-600 font-bold transition-all duration-300 rounded-xl hover:text-primary-600 hover:bg-primary-50 text-sm {{ request()->routeIs('caregivers.*') ? 'text-primary-600 bg-primary-50' : '' }}">Caregivers</a></li>
                    </ul>
                    
                    <div class="h-8 w-px bg-slate-200 mx-2"></div>

                    @guest
                        <a href="{{ route('login') }}" class="px-5 py-2.5 text-slate-600 font-bold hover:text-primary-600 transition-colors text-sm">Login</a>
                        <a href="{{ route('register') }}" class="bg-primary-600 text-white px-7 py-3 rounded-2xl font-bold shadow-xl shadow-primary-200 hover:bg-primary-700 hover:-translate-y-0.5 transition-all duration-300 text-sm">Join Now</a>
                    @else
                        <div class="flex items-center gap-4">
                            <a href="{{ route('dashboard') }}" class="px-4 py-2 text-slate-600 font-bold transition-all duration-300 rounded-xl hover:text-primary-600 hover:bg-primary-50 text-sm">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                @csrf
                                <button type="submit" class="px-4 py-2 text-red-500 font-bold transition-all duration-300 rounded-xl hover:bg-red-50 text-sm">Logout</button>
                            </form>
                        </div>
                    @endguest
                    
                    <a href="{{ route('services.index') }}" class="ml-4 flex items-center gap-2 bg-slate-900 text-white px-7 py-3 rounded-2xl font-bold hover:bg-slate-800 transition-all active:scale-95 shadow-xl shadow-slate-200 text-sm">
                        Book Now
                        <ion-icon name="arrow-forward" class="text-lg"></ion-icon>
                    </a>
                </div>

                <!-- Mobile Toggle -->
                <button class="lg:hidden w-11 h-11 flex items-center justify-center rounded-2xl bg-slate-100 text-slate-900 hover:bg-primary-50 hover:text-primary-600 transition-colors" id="mobile-menu-toggle">
                    <ion-icon name="menu-outline" class="text-2xl"></ion-icon>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Menu Overlay -->
    <div class="fixed inset-0 z-[60] bg-slate-900/60 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-300 hidden lg:hidden" id="mobile-menu-overlay">
        <div class="absolute right-0 top-0 bottom-0 w-[300px] bg-white shadow-2xl translate-x-full transition-transform duration-500 p-8 flex flex-col" id="mobile-menu-content">
            <div class="flex items-center justify-between mb-12 text-slate-900">
                <span class="text-xl font-display font-black tracking-tight">Menu</span>
                <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-100" id="mobile-menu-close">
                    <ion-icon name="close-outline" class="text-2xl"></ion-icon>
                </button>
            </div>

            <ul class="space-y-4 mb-12">
                <li><a href="{{ route('home') }}" class="flex items-center gap-4 p-4 rounded-2xl font-bold text-slate-900 {{ request()->routeIs('home') ? 'bg-primary-50 text-primary-600' : 'hover:bg-slate-50' }}">
                    <ion-icon name="home-outline" class="text-xl"></ion-icon> Home
                </a></li>
                <li><a href="{{ route('services.index') }}" class="flex items-center gap-4 p-4 rounded-2xl font-bold text-slate-900 {{ request()->routeIs('services.*') ? 'bg-primary-50 text-primary-600' : 'hover:bg-slate-50' }}">
                    <ion-icon name="grid-outline" class="text-xl"></ion-icon> Services
                </a></li>
                <li><a href="{{ route('caregivers.index') }}" class="flex items-center gap-4 p-4 rounded-2xl font-bold text-slate-900 {{ request()->routeIs('caregivers.*') ? 'bg-primary-50 text-primary-600' : 'hover:bg-slate-50' }}">
                    <ion-icon name="people-outline" class="text-xl"></ion-icon> Caregivers
                </a></li>
            </ul>

            <div class="mt-auto space-y-4">
                @guest
                    <a href="{{ route('login') }}" class="block w-full text-center py-4 rounded-2xl font-bold text-slate-900 border border-slate-100">Login</a>
                    <a href="{{ route('register') }}" class="block w-full text-center py-4 rounded-2xl font-bold text-white bg-primary-600 shadow-xl shadow-primary-200">Join Now</a>
                @else
                    <a href="{{ route('dashboard') }}" class="block w-full text-center py-4 rounded-2xl font-bold text-slate-900 border border-slate-100">Dashboard</a>
                    <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block w-full text-center py-4 rounded-2xl font-bold text-red-500 bg-red-50">Logout</button>
                @endguest
            </div>
        </div>
    </div>

    <main>
        @yield('content')
    </main>

    <footer class="pt-24 pb-12 bg-slate-900 text-slate-400 relative overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-px bg-gradient-to-r from-transparent via-slate-700 to-transparent"></div>
        
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
                <div class="fade-in-up">
                    <a href="{{ route('home') }}" class="flex items-center gap-3 mb-8">
                        <div class="w-11 h-11 bg-primary-600 rounded-2xl flex items-center justify-center text-white shadow-xl shadow-primary-900/50">
                            <ion-icon name="heart" class="text-2xl"></ion-icon>
                        </div>
                        <span class="text-2xl font-display font-black tracking-tight text-white">
                            Active<span class="text-primary-400">Care</span>
                        </span>
                    </a>
                    <p class="leading-relaxed mb-8">Providing compassionate and professional caregiver services and nursing at your doorstep. We bring hospital-quality care to the comfort of your home.</p>
                    <div class="flex gap-4">
                        <a href="#" class="w-11 h-11 rounded-2xl bg-slate-800 flex items-center justify-center text-white hover:bg-primary-600 hover:-translate-y-1 transition-all duration-300">
                            <ion-icon name="logo-facebook" class="text-xl"></ion-icon>
                        </a>
                        <a href="#" class="w-11 h-11 rounded-2xl bg-slate-800 flex items-center justify-center text-white hover:bg-primary-600 hover:-translate-y-1 transition-all duration-300">
                            <ion-icon name="logo-instagram" class="text-xl"></ion-icon>
                        </a>
                        <a href="#" class="w-11 h-11 rounded-2xl bg-slate-800 flex items-center justify-center text-white hover:bg-primary-600 hover:-translate-y-1 transition-all duration-300">
                            <ion-icon name="logo-twitter" class="text-xl"></ion-icon>
                        </a>
                    </div>
                </div>

                <div class="fade-in-up" style="animation-delay: 0.1s">
                    <h5 class="text-white font-display font-bold text-lg mb-8 uppercase tracking-widest text-sm">Quick Links</h5>
                    <ul class="space-y-4">
                        <li><a href="{{ route('home') }}" class="footer-link">Home</a></li>
                        <li><a href="{{ route('services.index') }}" class="footer-link">Our Services</a></li>
                        <li><a href="{{ route('caregivers.index') }}" class="footer-link">Caregivers</a></li>
                        <li><a href="#" class="footer-link">About Us</a></li>
                    </ul>
                </div>

                <div class="fade-in-up" style="animation-delay: 0.2s">
                    <h5 class="text-white font-display font-bold text-lg mb-8 uppercase tracking-widest text-sm">Support</h5>
                    <ul class="space-y-4">
                        <li><a href="#" class="footer-link">Help Center</a></li>
                        <li><a href="#" class="footer-link">Terms of Service</a></li>
                        <li><a href="#" class="footer-link">Privacy Policy</a></li>
                        <li><a href="#" class="footer-link">FAQ</a></li>
                    </ul>
                </div>

                <div class="fade-in-up" style="animation-delay: 0.3s">
                    <h5 class="text-white font-display font-bold text-lg mb-8 uppercase tracking-widest text-sm">Contact Info</h5>
                    <ul class="space-y-6">
                        <li class="flex gap-4">
                            <div class="w-11 h-11 rounded-2xl bg-slate-800 flex-shrink-0 flex items-center justify-center text-primary-400">
                                <ion-icon name="location-outline" class="text-xl"></ion-icon>
                            </div>
                            <span class="text-sm">House 12, Road 5, Sector 3, Uttara, Dhaka, Bangladesh</span>
                        </li>
                        <li class="flex gap-4">
                            <div class="w-11 h-11 rounded-2xl bg-slate-800 flex-shrink-0 flex items-center justify-center text-primary-400">
                                <ion-icon name="call-outline" class="text-xl"></ion-icon>
                            </div>
                            <span class="text-sm">+880 1234 567 890</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="pt-8 border-t border-slate-800 flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-sm text-slate-500">&copy; {{ date('Y') }} ActiveCare. All rights reserved.</p>
                <div class="flex gap-6 items-center">
                    <span class="text-xs uppercase tracking-widest font-bold text-slate-600">Secure Payments</span>
                    <img src="https://caregiver.activeitapps.com/frontend/img/payment-methods.png" alt="Payment Methods" class="h-6 opacity-40 grayscale hover:grayscale-0 hover:opacity-100 transition-all duration-500 cursor-pointer">
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) {
                $('#main-nav').addClass('py-3').removeClass('py-6');
                $('#nav-inner').addClass('bg-white/90 border-slate-100 shadow-premium').removeClass('bg-white/70 border-white/40 shadow-glass');
            } else {
                $('#main-nav').addClass('py-6').removeClass('py-3');
                $('#nav-inner').addClass('bg-white/70 border-white/40 shadow-glass').removeClass('bg-white/90 border-slate-100 shadow-premium');
            }
        });

        $('#mobile-menu-toggle, #mobile-menu-close, #mobile-menu-overlay').on('click', function(e) {
            if (e.target !== this && e.target.id === 'mobile-menu-overlay') return;
            const $overlay = $('#mobile-menu-overlay');
            const $content = $('#mobile-menu-content');
            
            if ($overlay.hasClass('hidden')) {
                $overlay.removeClass('hidden');
                setTimeout(() => {
                    $overlay.removeClass('opacity-0 pointer-events-none').addClass('opacity-100 pointer-events-auto');
                    $content.removeClass('translate-x-full').addClass('translate-x-0');
                }, 10);
                $('body').addClass('overflow-hidden');
            } else {
                $overlay.addClass('opacity-0 pointer-events-none').removeClass('opacity-100 pointer-events-auto');
                $content.addClass('translate-x-full').removeClass('translate-x-0');
                setTimeout(() => {
                    $overlay.addClass('hidden');
                }, 300);
                $('body').removeClass('overflow-hidden');
            }
        });

        // Intersection Observer for Reveal Animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in-up').forEach(el => {
            observer.observe(el);
        });
    </script>
    @stack('scripts')
</body>
</html>
