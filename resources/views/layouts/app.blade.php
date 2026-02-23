<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Mutual Commitment Company Ltd (MCC)') - Infrastructure & Investment</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&family=Noto+Sans+SC:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-sans antialiased bg-white text-mcc-slate-900 overflow-x-hidden">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav x-data="{ 
                open: false, 
                scrolled: false,
                init() {
                    window.addEventListener('scroll', () => {
                        this.scrolled = window.scrollY > 50;
                    });
                }
            }" 
            :class="scrolled ? 'bg-white/95 backdrop-blur-md shadow-lg h-20' : 'bg-transparent h-24'"
            class="fixed w-full top-0 z-50 transition-all duration-500 flex items-center">
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                <div class="flex justify-between items-center transition-all duration-500">
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center group">
                            <img src="{{ asset('images/mcc-logo.png') }}" alt="MCC Ltd" class="h-12 w-auto transition-all duration-500" :class="scrolled ? 'brightness-100' : 'brightness-0 invert'">
                        </a>
                        
                        <div class="hidden lg:ml-12 lg:flex lg:space-x-10">
                            <a href="{{ route('home') }}" 
                                :class="scrolled ? ( '{{ request()->routeIs('home') }}' ? 'text-mcc-blue-600' : 'text-mcc-slate-600 hover:text-mcc-blue-600' ) : 'text-white/90 hover:text-white'"
                                class="text-sm font-semibold transition-colors duration-300">{{ __('Home') }}</a>
                            
                            <div class="relative flex items-center" x-data="{ dropdownOpen: false }">
                                <button @mouseenter="dropdownOpen = true" @click="dropdownOpen = !dropdownOpen" 
                                    :class="scrolled ? 'text-mcc-slate-600 hover:text-mcc-blue-600' : 'text-white/90 hover:text-white'"
                                    class="inline-flex items-center text-sm font-semibold transition-colors duration-300">
                                    {{ __('About Us') }}
                                    <svg class="ml-1.5 h-4 w-4 transform transition-transform duration-300" :class="dropdownOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                                <div x-show="dropdownOpen" 
                                    @mouseleave="dropdownOpen = false" 
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 translate-y-2"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    class="absolute top-full left-0 w-56 pt-4">
                                    <div class="bg-white border border-mcc-slate-100 shadow-2xl rounded-xl overflow-hidden py-2">
                                        <a href="{{ route('about') }}" class="block px-6 py-3 text-sm text-mcc-slate-700 hover:bg-mcc-blue-50 hover:text-mcc-blue-700 transition-colors">{{ __('Company Overview') }}</a>
                                        <a href="{{ route('chairman') }}" class="block px-6 py-3 text-sm text-mcc-slate-700 hover:bg-mcc-blue-50 hover:text-mcc-blue-700 transition-colors">{{ __('Chairman\'s Message') }}</a>
                                        <a href="{{ route('awards') }}" class="block px-6 py-3 text-sm text-mcc-slate-700 hover:bg-mcc-blue-50 hover:text-mcc-blue-700 transition-colors">{{ __('Awards & Recognition') }}</a>
                                        <a href="{{ route('training') }}" class="block px-6 py-3 text-sm text-mcc-slate-700 hover:bg-mcc-blue-50 hover:text-mcc-blue-700 transition-colors">{{ __('Talent & Development') }}</a>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('services') }}" 
                                :class="scrolled ? ( '{{ request()->routeIs('services') }}' ? 'text-mcc-blue-600' : 'text-mcc-slate-600 hover:text-mcc-blue-600' ) : 'text-white/90 hover:text-white'"
                                class="text-sm font-semibold transition-colors duration-300">{{ __('Expertise') }}</a>

                            <a href="{{ route('projects.index') }}"
                                :class="scrolled ? ( '{{ request()->routeIs('projects.*') }}' ? 'text-mcc-blue-600' : 'text-mcc-slate-600 hover:text-mcc-blue-600' ) : 'text-white/90 hover:text-white'"
                                class="text-sm font-semibold transition-colors duration-300">{{ __('Projects') }}</a>

                            <a href="{{ route('articles.index') }}" 
                                :class="scrolled ? ( '{{ request()->routeIs('articles.*') }}' ? 'text-mcc-blue-600' : 'text-mcc-slate-600 hover:text-mcc-blue-600' ) : 'text-white/90 hover:text-white'"
                                class="text-sm font-semibold transition-colors duration-300">{{ __('Insights') }}</a>

                            <a href="{{ route('careers') }}" 
                                :class="scrolled ? ( '{{ request()->routeIs('careers') }}' ? 'text-mcc-blue-600' : 'text-mcc-slate-600 hover:text-mcc-blue-600' ) : 'text-white/90 hover:text-white'"
                                class="text-sm font-semibold transition-colors duration-300">{{ __('Careers') }}</a>
                            
                            <a href="{{ route('contact') }}" 
                                :class="scrolled ? ( '{{ request()->routeIs('contact') }}' ? 'text-mcc-blue-600' : 'text-mcc-slate-600 hover:text-mcc-blue-600' ) : 'text-white/90 hover:text-white'"
                                class="text-sm font-semibold transition-colors duration-300">{{ __('Contact') }}</a>
                        </div>
                    </div>

                    <div class="hidden lg:flex items-center space-x-8">
                        <!-- Bilingual Switcher -->
                        <div class="flex items-center bg-black/10 rounded-full p-1" :class="scrolled ? 'bg-mcc-slate-100' : 'bg-white/10'">
                            <a href="{{ route('lang.switch', 'en') }}" 
                               class="px-3 py-1 rounded-full text-xs font-bold transition-all duration-300 {{ app()->getLocale() == 'en' ? 'bg-mcc-blue-600 text-white shadow-sm' : 'text-mcc-slate-400 hover:text-mcc-blue-600' }}">EN</a>
                            <a href="{{ route('lang.switch', 'zh') }}" 
                               class="px-3 py-1 rounded-full text-xs font-bold transition-all duration-300 {{ app()->getLocale() == 'zh' ? 'bg-mcc-blue-600 text-white shadow-sm' : 'text-mcc-slate-400 hover:text-mcc-blue-600' }}">中文</a>
                        </div>

                        <a href="{{ route('contact') }}" 
                            :class="scrolled ? 'bg-mcc-blue-700 hover:bg-mcc-blue-800' : 'bg-white text-mcc-blue-900 hover:bg-mcc-blue-50'"
                            class="inline-flex items-center px-6 py-2.5 border border-transparent text-sm font-bold rounded-full shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                            {{ __('Partner with Us') }}
                        </a>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="flex items-center lg:hidden">
                        <button @click="open = !open" 
                            :class="scrolled ? 'text-mcc-slate-600' : 'text-white'"
                            class="inline-flex items-center justify-center p-2 rounded-md transition-colors">
                            <svg class="h-8 w-8" :class="{'hidden': open, 'block': !open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                            <svg class="h-8 w-8" :class="{'block': open, 'hidden': !open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu -->
            <div x-show="open" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 -translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0"
                class="lg:hidden absolute top-full left-0 w-full bg-white shadow-2xl border-t border-mcc-slate-100">
                <div class="pt-4 pb-6 space-y-2 px-4">
                    <a href="{{ route('home') }}" class="block px-4 py-3 rounded-xl {{ request()->routeIs('home') ? 'bg-mcc-blue-50 text-mcc-blue-700' : 'text-mcc-slate-600' }} text-base font-bold">{{ __('Home') }}</a>
                    <a href="{{ route('about') }}" class="block px-4 py-3 text-mcc-slate-600 text-base font-bold">{{ __('About Us') }}</a>
                    <a href="{{ route('awards') }}" class="block px-4 py-3 text-mcc-slate-600 text-base font-bold">{{ __('Awards & Recognition') }}</a>
                    <a href="{{ route('training') }}" class="block px-4 py-3 text-mcc-slate-600 text-base font-bold">{{ __('Talent & Development') }}</a>
                    <a href="{{ route('articles.index') }}" class="block px-4 py-3 rounded-xl {{ request()->routeIs('articles.*') ? 'bg-mcc-blue-50 text-mcc-blue-700' : 'text-mcc-slate-600' }} text-base font-bold">{{ __('Insights') }}</a>
                    <a href="{{ route('careers') }}" class="block px-4 py-3 rounded-xl {{ request()->routeIs('careers') ? 'bg-mcc-blue-50 text-mcc-blue-700' : 'text-mcc-slate-600' }} text-base font-bold">{{ __('Careers') }}</a>
                    <a href="{{ route('projects.index') }}" class="block px-4 py-3 rounded-xl {{ request()->routeIs('projects.*') ? 'bg-mcc-blue-50 text-mcc-blue-700' : 'text-mcc-slate-600' }} text-base font-bold">{{ __('Projects') }}</a>
                    <a href="{{ route('contact') }}" class="block px-4 py-3 rounded-xl {{ request()->routeIs('contact') ? 'bg-mcc-blue-50 text-mcc-blue-700' : 'text-mcc-slate-600' }} text-base font-bold">{{ __('Contact') }}</a>
                    
                    <div class="pt-4 border-t border-mcc-slate-100 flex items-center justify-between px-4">
                        <div class="flex items-center bg-mcc-slate-100 rounded-full p-1">
                            <a href="{{ route('lang.switch', 'en') }}" class="px-4 py-1.5 rounded-full text-xs font-bold {{ app()->getLocale() == 'en' ? 'bg-mcc-blue-600 text-white' : 'text-mcc-slate-500' }}">EN</a>
                            <a href="{{ route('lang.switch', 'zh') }}" class="px-4 py-1.5 rounded-full text-xs font-bold {{ app()->getLocale() == 'zh' ? 'bg-mcc-blue-600 text-white' : 'text-mcc-slate-500' }}">中文</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="flex-grow pt-0">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-mcc-slate-900 text-white pt-24 pb-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8 pb-16 border-b border-white/10">
                    <div class="space-y-6">
                        <a href="{{ route('home') }}" class="inline-flex">
                            <img src="{{ asset('images/mcc-logo.png') }}" alt="MCC Ltd" class="h-14 w-auto brightness-0 invert">
                        </a>
                        <p class="text-mcc-slate-400 text-sm leading-relaxed max-w-xs">
                            {{ __('Mutual Commitment Company Ltd is a global leader in engineering, infrastructure, and investment, dedicated to sustainable development across Africa and Asia.') }}
                        </p>
                        <div class="flex space-x-4">
                            <!-- Social icons placeholder -->
                            <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-mcc-blue-600 transition-colors duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-mcc-blue-600 transition-colors duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.84 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                            </a>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-mcc-gold font-bold text-xs uppercase tracking-widest mb-8">{{ __('Quick Links') }}</h3>
                        <ul class="space-y-4">
                            <li><a href="{{ route('home') }}" class="text-mcc-slate-400 hover:text-white transition-colors duration-300">{{ __('Home') }}</a></li>
                            <li><a href="{{ route('about') }}" class="text-mcc-slate-400 hover:text-white transition-colors duration-300">{{ __('Company Overview') }}</a></li>
                            <li><a href="{{ route('chairman') }}" class="text-mcc-slate-400 hover:text-white transition-colors duration-300">{{ __('Chairman\'s Message') }}</a></li>
                            <li><a href="{{ route('awards') }}" class="text-mcc-slate-400 hover:text-white transition-colors duration-300">{{ __('Awards & Recognition') }}</a></li>
                            <li><a href="{{ route('training') }}" class="text-mcc-slate-400 hover:text-white transition-colors duration-300">{{ __('Talent & Development') }}</a></li>
                            <li><a href="{{ route('projects.index') }}" class="text-mcc-slate-400 hover:text-white transition-colors duration-300">{{ __('Projects') }}</a></li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-mcc-gold font-bold text-xs uppercase tracking-widest mb-8">{{ __('Sectors') }}</h3>
                        <ul class="space-y-4">
                            @foreach($global_sectors as $sector)
                            <li><a href="{{ route('sectors.show', $sector->slug) }}" class="text-mcc-slate-400 hover:text-white transition-colors duration-300">{{ $sector->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="space-y-8">
                        <div>
                            <h3 class="text-mcc-gold font-bold text-xs uppercase tracking-widest mb-8">{{ __('Contact Information') }}</h3>
                            <ul class="space-y-4">
                                <li class="text-white font-medium">{{ __('Nigeria HQ') }}: <span class="text-mcc-slate-400 block mt-1 font-normal">Abuja, Nigeria.</span></li>
                                <li class="text-white font-medium">{{ __('China HQ') }}: <span class="text-mcc-slate-400 block mt-1 font-normal">Chaoyang District, Beijing.</span></li>
                                <li class="text-white font-medium">Email: <span class="text-mcc-slate-400 block mt-1 font-normal select-all">info@mccltd.com</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="mt-12 flex flex-col md:flex-row justify-between items-center text-xs text-mcc-slate-500 gap-4">
                    <p>&copy; {{ date('Y') }} Mutual Commitment Company Ltd. {{ __('All rights reserved.') }}</p>
                    <div class="flex space-x-8">
                        <a href="{{ route('login') }}" class="hover:text-white transition-colors transition-duration-300">{{ __('Management Login') }}</a>
                        <a href="#" class="hover:text-white transition-colors transition-duration-300">Privacy Policy</a>
                        <a href="#" class="hover:text-white transition-colors transition-duration-300">Terms of Service</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Scroll Reveal Logic -->
    <script>
        const revealCallback = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        };
        const revealObserver = new IntersectionObserver(revealCallback, {
            threshold: 0.1
        });
        document.querySelectorAll('[reveal]').forEach(el => revealObserver.observe(el));
    </script>
</body>
</html>
