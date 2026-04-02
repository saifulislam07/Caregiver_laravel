<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', $settings['site_name'] ?? 'HealoraHealth') {{ $settings['meta_title_suffix'] ?? '- Premium Home Care & Nursing' }}</title>
    @if(isset($settings['site_favicon']))
        <link rel="icon" type="image/png" href="{{ asset($settings['site_favicon']) }}">
    @endif

    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('meta_description', $settings['meta_description_default'] ?? 'HealoraHealth provides professional, hospital-quality caregiver and nursing services at home.')">
    <meta name="keywords" content="@yield('meta_keywords', $settings['meta_keywords_default'] ?? 'caregiver, nursing, HealoraHealth')">
    <meta name="author" content="HealoraHealth Team">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title') {{ $settings['meta_title_suffix'] ?? '- HealoraHealth' }}">
    <meta property="og:description" content="@yield('meta_description', $settings['meta_description_default'] ?? 'Professional caregiver services at home.')">
    <meta property="og:image" content="{{ asset($settings['site_logo'] ?? 'images/og-image.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title') {{ $settings['meta_title_suffix'] ?? '- HealoraHealth' }}">
    <meta property="twitter:description" content="@yield('meta_description', $settings['meta_description_default'] ?? 'Professional caregiver services at home.')">
    <meta property="twitter:image" content="{{ asset($settings['site_logo'] ?? 'images/og-image.jpg') }}">

    <!-- JSON-LD Structured Data for Local Business & Medical Service -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "MedicalOrganization",
      "name": "{{ $settings['site_name'] ?? 'HealoraHealth' }}",
      "url": "{{ url('/') }}",
      "logo": "{{ asset($settings['site_logo'] ?? 'images/logo.png') }}",
      "description": "{{ $settings['meta_description_default'] ?? 'HealoraHealth provides premium home care services.' }}",
      "slogan": "{{ $settings['site_slogan'] ?? 'Your Health, Our Trust' }}",
      "contactPoint": {
        "@@type": "ContactPoint",
        "telephone": "{{ $settings['contact_phone'] ?? '+880 1700 000 000' }}",
        "contactType": "customer service",
        "areaServed": "BD",
        "availableLanguage": ["en", "bn"]
      },
      "address": {
        "@@type": "PostalAddress",
        "streetAddress": "{{ $settings['address'] ?? 'Dhaka' }}",
        "addressLocality": "Dhaka",
        "addressRegion": "Dhaka",
        "addressCountry": "BD"
      }
    }
    </script>

    <!-- Ionicons -->
    <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- FontAwesome for comprehensive social media icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
                    {{ $settings['contact_phone'] ?? '+880 1234 567 890' }}
                </span>
                <span class="flex items-center gap-2 hover:text-white transition-colors cursor-pointer">
                    <ion-icon name="mail-outline" class="text-primary-400 text-sm"></ion-icon>
                    {{ $settings['contact_email'] ?? 'info@takefamilycare.com' }}
                </span>
            </div>
            <div class="flex items-center gap-5">
                @if(isset($settings['facebook_url']) && !empty($settings['facebook_url']))
                    <a href="{{ $settings['facebook_url'] }}" target="_blank" class="hover:text-white transition-colors"><i class="fab fa-facebook-f"></i></a>
                @endif
                @if(isset($settings['twitter_url']) && !empty($settings['twitter_url']))
                    <a href="{{ $settings['twitter_url'] }}" target="_blank" class="hover:text-white transition-colors"><i class="fab fa-twitter"></i></a>
                @endif
                @if(isset($settings['linkedin_url']) && !empty($settings['linkedin_url']))
                    <a href="{{ $settings['linkedin_url'] }}" target="_blank" class="hover:text-white transition-colors"><i class="fab fa-linkedin-in"></i></a>
                @endif
                @if(isset($settings['instagram_url']) && !empty($settings['instagram_url']))
                    <a href="{{ $settings['instagram_url'] }}" target="_blank" class="hover:text-white transition-colors"><i class="fab fa-instagram"></i></a>
                @endif
                @if(isset($settings['youtube_url']) && !empty($settings['youtube_url']))
                    <a href="{{ $settings['youtube_url'] }}" target="_blank" class="hover:text-white transition-colors"><i class="fab fa-youtube"></i></a>
                @endif
                @if(isset($settings['whatsapp_url']) && !empty($settings['whatsapp_url']))
                    <a href="{{ $settings['whatsapp_url'] }}" target="_blank" class="hover:text-[#25D366] transition-colors"><i class="fab fa-whatsapp"></i></a>
                @endif
                @if(isset($settings['messenger_url']) && !empty($settings['messenger_url']))
                    <a href="{{ $settings['messenger_url'] }}" target="_blank" class="hover:text-[#00B2FF] transition-colors"><i class="fab fa-facebook-messenger"></i></a>
                @endif
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <header class="sticky top-0 z-50 transition-all duration-500 py-6" id="main-nav">
        <div class="container mx-auto px-4">
            <div id="nav-inner" class="bg-white/70 backdrop-blur-xl border border-white/40 rounded-[2rem] shadow-glass px-8 py-3 flex items-center justify-between transition-all duration-500">
                <!-- Branding -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    @if(isset($settings['site_logo']))
                        <img src="{{ asset($settings['site_logo']) }}" alt="{{ $settings['site_name'] ?? 'TakeFamilyCare' }}" class="h-10">
                    @else
                        <div class="w-11 h-11 bg-primary-600 rounded-2xl flex items-center justify-center text-white shadow-xl shadow-primary-200 group-hover:scale-110 group-hover:rotate-3 transition-all duration-500">
                            <ion-icon name="heart" class="text-2xl"></ion-icon>
                        </div>
                        <span class="text-2xl font-display font-black tracking-tight text-slate-900 group-hover:text-primary-600 transition-colors">
                            Healora<span class="text-primary-600">Health</span>
                        </span>
                    @endif
                </a>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center gap-2">
                    <ul class="flex items-center gap-1 mr-4">
                        @foreach($header_menus as $menu)
                            @if($menu->children->count() > 0)
                                <li class="relative group/dropdown">
                                    <button class="px-4 py-2 text-slate-600 font-bold transition-all duration-300 rounded-xl hover:text-primary-600 hover:bg-primary-50 text-sm flex items-center gap-1">
                                        {{ $menu->name }}
                                        <ion-icon name="chevron-down-outline" class="text-xs"></ion-icon>
                                    </button>
                                    <ul class="absolute left-0 top-full pt-2 opacity-0 invisible group-hover/dropdown:opacity-100 group-hover/dropdown:visible transition-all duration-300 transform translate-y-2 group-hover/dropdown:translate-y-0 z-50">
                                        <div class="bg-white rounded-2xl shadow-xl border border-slate-100 p-2 min-w-[200px]">
                                            @foreach($menu->children as $child)
                                                <li>
                                                    <a href="{{ url($child->url) }}" class="block px-4 py-2.5 text-slate-600 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-all text-sm font-semibold">
                                                        {{ $child->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </div>
                                    </ul>
                                </li>
                            @else
                                <li>
                                    <a href="{{ url($menu->url) }}" class="px-4 py-2 text-slate-600 font-bold transition-all duration-300 rounded-xl hover:text-primary-600 hover:bg-primary-50 text-sm {{ request()->is(trim($menu->url, '/')) ? 'text-primary-600 bg-primary-50' : '' }}">
                                        {{ $menu->name }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    
                    <div class="h-8 w-px bg-slate-200 mx-2"></div>

                    @guest
                        <a href="{{ route('login') }}" class="px-5 py-2.5 text-slate-600 font-bold hover:text-primary-600 transition-colors text-sm">Login</a>
                        <a href="{{ route('register') }}" class="bg-primary-600 text-white px-7 py-3 rounded-2xl font-bold shadow-xl shadow-primary-200 hover:bg-primary-700 hover:-translate-y-0.5 transition-all duration-300 text-sm">Join Now</a>
                    @else
                        <div class="flex items-center gap-4">
                            @role('Admin')
                                <!-- Admin Panel link removed upon request -->
                            @endrole
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
                @foreach($header_menus as $menu)
                    @if($menu->children->count() > 0)
                        <li class="space-y-2">
                            <div class="flex items-center justify-between p-4 rounded-2xl font-bold text-slate-400 uppercase text-[10px] tracking-widest bg-slate-50/50">
                                {{ $menu->name }}
                            </div>
                            @foreach($menu->children as $child)
                                <a href="{{ url($child->url) }}" class="flex items-center gap-4 p-4 rounded-2xl font-bold text-slate-900 hover:bg-primary-50 hover:text-primary-600 transition-all {{ request()->is(trim($child->url, '/')) ? 'bg-primary-50 text-primary-600' : '' }}">
                                     {{ $child->name }}
                                </a>
                            @endforeach
                        </li>
                    @else
                        <li>
                            <a href="{{ url($menu->url) }}" class="flex items-center gap-4 p-4 rounded-2xl font-bold text-slate-900 {{ request()->is(trim($menu->url, '/')) ? 'bg-primary-50 text-primary-600' : 'hover:bg-slate-50' }}">
                                {{ $menu->name }}
                            </a>
                        </li>
                    @endif
                @endforeach
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
                        @if(isset($settings['site_logo_white']))
                            <img src="{{ asset($settings['site_logo_white']) }}" alt="{{ $settings['site_name'] ?? 'HealoraHealth' }}" class="h-12 mb-4">
                        @elseif(isset($settings['site_logo']))
                            <img src="{{ asset($settings['site_logo']) }}" alt="{{ $settings['site_name'] ?? 'HealoraHealth' }}" class="h-12 mb-4">
                        @else
                            <div class="w-11 h-11 bg-primary-600 rounded-2xl flex items-center justify-center text-white shadow-xl shadow-primary-900/50">
                                <ion-icon name="heart" class="text-2xl"></ion-icon>
                            </div>
                            <span class="text-2xl font-display font-black tracking-tight text-white">
                                Healora<span class="text-primary-400">Health</span>
                            </span>
                        @endif
                    </a>
                    <p class="leading-relaxed mb-8">Providing compassionate and professional caregiver services and nursing at your doorstep. We bring hospital-quality care to the comfort of your home.</p>
                    <div class="flex flex-wrap gap-4 mt-6">
                        @if(isset($settings['facebook_url']) && !empty($settings['facebook_url']))
                            <a href="{{ $settings['facebook_url'] }}" target="_blank" class="w-11 h-11 rounded-2xl bg-slate-800 flex items-center justify-center text-white hover:bg-[#1877F2] hover:-translate-y-1 transition-all duration-300">
                                <i class="fab fa-facebook-f text-xl"></i>
                            </a>
                        @endif
                        @if(isset($settings['instagram_url']) && !empty($settings['instagram_url']))
                            <a href="{{ $settings['instagram_url'] }}" target="_blank" class="w-11 h-11 rounded-2xl bg-slate-800 flex items-center justify-center text-white hover:bg-[#E4405F] hover:-translate-y-1 transition-all duration-300">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                        @endif
                        @if(isset($settings['twitter_url']) && !empty($settings['twitter_url']))
                            <a href="{{ $settings['twitter_url'] }}" target="_blank" class="w-11 h-11 rounded-2xl bg-slate-800 flex items-center justify-center text-white hover:bg-[#1DA1F2] hover:-translate-y-1 transition-all duration-300">
                                <i class="fab fa-twitter text-xl"></i>
                            </a>
                        @endif
                        @if(isset($settings['linkedin_url']) && !empty($settings['linkedin_url']))
                            <a href="{{ $settings['linkedin_url'] }}" target="_blank" class="w-11 h-11 rounded-2xl bg-slate-800 flex items-center justify-center text-white hover:bg-[#0A66C2] hover:-translate-y-1 transition-all duration-300">
                                <i class="fab fa-linkedin-in text-xl"></i>
                            </a>
                        @endif
                        @if(isset($settings['youtube_url']) && !empty($settings['youtube_url']))
                            <a href="{{ $settings['youtube_url'] }}" target="_blank" class="w-11 h-11 rounded-2xl bg-slate-800 flex items-center justify-center text-white hover:bg-[#FF0000] hover:-translate-y-1 transition-all duration-300">
                                <i class="fab fa-youtube text-xl"></i>
                            </a>
                        @endif
                        @if(isset($settings['whatsapp_url']) && !empty($settings['whatsapp_url']))
                            <a href="{{ $settings['whatsapp_url'] }}" target="_blank" class="w-11 h-11 rounded-2xl bg-slate-800 flex items-center justify-center text-white hover:bg-[#25D366] hover:-translate-y-1 transition-all duration-300">
                                <i class="fab fa-whatsapp text-xl"></i>
                            </a>
                        @endif
                        @if(isset($settings['messenger_url']) && !empty($settings['messenger_url']))
                            <a href="{{ $settings['messenger_url'] }}" target="_blank" class="w-11 h-11 rounded-2xl bg-slate-800 flex items-center justify-center text-white hover:bg-[#00B2FF] hover:-translate-y-1 transition-all duration-300">
                                <i class="fab fa-facebook-messenger text-xl"></i>
                            </a>
                        @endif
                    </div>
                </div>

                @foreach($footer_menus as $index => $footerMenu)
                    <div class="fade-in-up" style="animation-delay: {{ 0.1 * ($index + 1) }}s">
                        <h5 class="text-white font-display font-bold text-lg mb-8 uppercase tracking-widest">{{ $footerMenu->name }}</h5>
                        <ul class="space-y-4">
                            @if($footerMenu->children->count() > 0)
                                @foreach($footerMenu->children as $child)
                                    <li><a href="{{ $child->url }}" class="footer-link">{{ $child->name }}</a></li>
                                @endforeach
                            @elseif($footerMenu->url)
                                <li><a href="{{ $footerMenu->url }}" class="footer-link">{{ $footerMenu->name }}</a></li>
                            @endif
                        </ul>
                    </div>
                @endforeach

                <div class="fade-in-up" style="animation-delay: 0.3s">
                    <h5 class="text-white font-display font-bold text-lg mb-8 uppercase tracking-widest">Contact Info</h5>
                    <ul class="space-y-6">
                            <span class="text-sm text-slate-400">{{ $settings['address'] ?? 'DHAKA, BANGLADESH' }}</span>
                            <span class="text-sm text-slate-400">{{ $settings['contact_phone'] ?? '+880 1234 567 890' }}</span>
                    </ul>
                </div>
            </div>

            <div class="pt-8 border-t border-slate-800 flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-sm text-slate-500">&copy; {{ date('Y') }} {{ $settings['site_name'] ?? 'HealoraHealth' }}. All rights reserved.</p>
                <div class="flex gap-6 items-center">
                    <span class="text-xs uppercase tracking-widest font-bold text-slate-600">Secure Payments</span>
                    <!-- Payment Methods Icon removed as external source is down -->
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
    <x-floating-chat />
    @stack('scripts')
</body>
</html>
