<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Mutual Commitment Company Ltd (MCC)') - Infrastructure & Investment</title>

    <!-- Fonts (Using System Fallbacks for Performance in China) -->

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
            }" :class="scrolled ? 'bg-white/95 backdrop-blur-md shadow-lg h-20' : 'bg-transparent h-24'"
            class="fixed w-full top-0 z-50 transition-all duration-500 flex items-center">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                <div class="flex justify-between items-center transition-all duration-500">
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center group">
                            <img src="{{ asset('images/mcc-logo.png') }}" alt="MCC Ltd"
                                class="h-12 w-auto transition-all duration-500"
                                :class="scrolled ? 'brightness-100' : 'brightness-0 invert'">
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
                                    <svg class="ml-1.5 h-4 w-4 transform transition-transform duration-300"
                                        :class="dropdownOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div x-show="dropdownOpen" @mouseleave="dropdownOpen = false"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 translate-y-2"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    class="absolute top-full left-0 w-56 pt-4">
                                    <div
                                        class="bg-white border border-mcc-slate-100 shadow-2xl rounded-xl overflow-hidden py-2">
                                        <a href="{{ route('about') }}"
                                            class="block px-6 py-3 text-sm text-mcc-slate-700 hover:bg-mcc-blue-50 hover:text-mcc-blue-700 transition-colors">{{ __('Company Overview') }}</a>
                                        <a href="{{ route('gmd') }}"
                                            class="block px-6 py-3 text-sm text-mcc-slate-700 hover:bg-mcc-blue-50 hover:text-mcc-blue-700 transition-colors">{{ __('GMD\'s Message') }}</a>
                                        <a href="{{ route('awards') }}"
                                            class="block px-6 py-3 text-sm text-mcc-slate-700 hover:bg-mcc-blue-50 hover:text-mcc-blue-700 transition-colors">{{ __('Awards & Recognition') }}</a>
                                        <a href="{{ route('training') }}"
                                            class="block px-6 py-3 text-sm text-mcc-slate-700 hover:bg-mcc-blue-50 hover:text-mcc-blue-700 transition-colors">{{ __('Talent & Development') }}</a>
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


                            <a href="{{ route('contact') }}"
                                :class="scrolled ? ( '{{ request()->routeIs('contact') }}' ? 'text-mcc-blue-600' : 'text-mcc-slate-600 hover:text-mcc-blue-600' ) : 'text-white/90 hover:text-white'"
                                class="text-sm font-semibold transition-colors duration-300">{{ __('Contact') }}</a>
                        </div>
                    </div>

                    <div class="hidden lg:flex items-center space-x-8">
                        <!-- Bilingual Switcher -->
                        <div class="flex items-center bg-black/10 rounded-full p-1"
                            :class="scrolled ? 'bg-mcc-slate-100' : 'bg-white/10'">
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
                        <button @click="open = !open" :class="scrolled ? 'text-mcc-slate-600' : 'text-white'"
                            class="inline-flex items-center justify-center p-2 rounded-md transition-colors">
                            <svg class="h-8 w-8" :class="{'hidden': open, 'block': !open }" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                            <svg class="h-8 w-8" :class="{'block': open, 'hidden': !open }" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu -->
            <div x-show="open" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                class="lg:hidden absolute top-full left-0 w-full bg-white shadow-2xl border-t border-mcc-slate-100">
                <div class="pt-4 pb-6 space-y-2 px-4">
                    <a href="{{ route('home') }}"
                        class="block px-4 py-3 rounded-xl {{ request()->routeIs('home') ? 'bg-mcc-blue-50 text-mcc-blue-700' : 'text-mcc-slate-600' }} text-base font-bold">{{ __('Home') }}</a>
                    <a href="{{ route('about') }}"
                        class="block px-4 py-3 text-mcc-slate-600 text-base font-bold">{{ __('About Us') }}</a>
                    <a href="{{ route('awards') }}"
                        class="block px-4 py-3 text-mcc-slate-600 text-base font-bold">{{ __('Awards & Recognition') }}</a>
                    <a href="{{ route('training') }}"
                        class="block px-4 py-3 text-mcc-slate-600 text-base font-bold">{{ __('Talent & Development') }}</a>
                    <a href="{{ route('articles.index') }}"
                        class="block px-4 py-3 rounded-xl {{ request()->routeIs('articles.*') ? 'bg-mcc-blue-50 text-mcc-blue-700' : 'text-mcc-slate-600' }} text-base font-bold">{{ __('Insights') }}</a>
                    <a href="{{ route('projects.index') }}"
                        class="block px-4 py-3 rounded-xl {{ request()->routeIs('projects.*') ? 'bg-mcc-blue-50 text-mcc-blue-700' : 'text-mcc-slate-600' }} text-base font-bold">{{ __('Projects') }}</a>
                    <a href="{{ route('contact') }}"
                        class="block px-4 py-3 rounded-xl {{ request()->routeIs('contact') ? 'bg-mcc-blue-50 text-mcc-blue-700' : 'text-mcc-slate-600' }} text-base font-bold">{{ __('Contact') }}</a>

                    <div class="pt-4 border-t border-mcc-slate-100 flex items-center justify-between px-4">
                        <div class="flex items-center bg-mcc-slate-100 rounded-full p-1">
                            <a href="{{ route('lang.switch', 'en') }}"
                                class="px-4 py-1.5 rounded-full text-xs font-bold {{ app()->getLocale() == 'en' ? 'bg-mcc-blue-600 text-white' : 'text-mcc-slate-500' }}">EN</a>
                            <a href="{{ route('lang.switch', 'zh') }}"
                                class="px-4 py-1.5 rounded-full text-xs font-bold {{ app()->getLocale() == 'zh' ? 'bg-mcc-blue-600 text-white' : 'text-mcc-slate-500' }}">中文</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="flex-grow pt-0">
            @yield('content')
        </main>

        <!-- Premium Global Footer -->
        <footer class="bg-mcc-slate-900 border-t-4 border-mcc-blue-600 text-white pt-16 pb-6 relative overflow-hidden">
            <!-- Subtle Background Accents -->
            <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>
            <div class="absolute -top-[500px] -right-[500px] w-[1000px] h-[1000px] rounded-full bg-mcc-blue-900/10 blur-3xl pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                
                <!-- Main Footer Content Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 pb-10">
                    
                    <!-- Col 1-2: Brand & Description -->
                    <div class="lg:col-span-2 space-y-6 pr-0 lg:pr-12">
                        <a href="{{ route('home') }}" class="inline-flex items-center group">
                            <img src="{{ asset('images/mcc-logo.png') }}" alt="MCC Ltd" class="h-16 w-auto brightness-0 invert transition-transform duration-500 group-hover:scale-105">
                        </a>
                        <p class="text-mcc-slate-400 text-sm leading-[1.8] max-w-md font-medium">
                            {{ __('Mutual Commitment Company Ltd is a global leader in engineering, infrastructure, and investment, dedicated to pioneering sustainable development across Africa and Asia.') }}
                        </p>
                        <div class="flex space-x-3">
                            <a href="#" class="w-11 h-11 rounded-full bg-white/5 border border-white/10 flex items-center justify-center hover:bg-mcc-blue-600 hover:border-mcc-blue-500 hover:shadow-[0_0_15px_rgba(37,99,235,0.5)] transition-all duration-300 group">
                                <svg class="w-5 h-5 text-mcc-slate-300 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                            </a>
                            <a href="#" class="w-11 h-11 rounded-full bg-white/5 border border-white/10 flex items-center justify-center hover:bg-mcc-blue-600 hover:border-mcc-blue-500 hover:shadow-[0_0_15px_rgba(37,99,235,0.5)] transition-all duration-300 group">
                                <svg class="w-5 h-5 text-mcc-slate-300 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.84 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                </svg>
                            </a>
                            <a href="#" class="w-11 h-11 rounded-full bg-white/5 border border-white/10 flex items-center justify-center hover:bg-mcc-blue-600 hover:border-mcc-blue-500 hover:shadow-[0_0_15px_rgba(37,99,235,0.5)] transition-all duration-300 group">
                                <svg class="w-5 h-5 text-mcc-slate-300 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                     <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Col 3: Quick Links -->
                    <div>
                        <h3 class="text-white font-bold text-sm tracking-wide mb-6 flex items-center">
                            <span class="w-4 h-1 bg-mcc-blue-500 rounded-full mr-3"></span>
                            {{ __('Quick Links') }}
                        </h3>
                        <ul class="space-y-3.5 mt-1">
                            @foreach([
                                'about' => 'About Us',
                                'projects.index' => 'Our Projects',
                                'articles.index' => 'News & Insights',
                                'csr' => 'CSR',
                                'careers' => 'Careers'
                            ] as $route => $label)
                            <li>
                                <a href="{{ route($route) }}" class="text-mcc-slate-400 text-sm hover:text-white transition-all duration-300 flex items-center group">
                                    <svg class="w-3.5 h-3.5 mr-2 opacity-0 -ml-5 group-hover:opacity-100 group-hover:ml-0 transition-all duration-300 text-mcc-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                    <span class="transform group-hover:translate-x-1 transition-transform duration-300">{{ __($label) }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Col 4: Sectors -->
                    <div>
                        <h3 class="text-white font-bold text-sm tracking-wide mb-6 flex items-center">
                            <span class="w-4 h-1 bg-mcc-blue-500 rounded-full mr-3"></span>
                            {{ __('Sectors') }}
                        </h3>
                        <div class="flex flex-wrap items-center gap-y-3">
                            @foreach($global_sectors as $index => $sector)
                                @if($index > 0)
                                    <span class="text-white/20 px-3 select-none">|</span>
                                @endif
                                <a href="{{ route('sectors.show', $sector->slug) }}" class="text-mcc-slate-400 text-sm hover:text-white transition-all duration-300 group inline-flex items-center">
                                    <span class="transform group-hover:-translate-y-0.5 transition-transform duration-300">{{ $sector->name }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Col 5: Global Offices -->
                    <div>
                        <h3 class="text-white font-bold text-sm tracking-wide mb-6 flex items-center">
                            <span class="w-4 h-1 bg-mcc-blue-500 rounded-full mr-3"></span>
                            {{ __('Global Offices') }}
                        </h3>
                        
                        <div class="space-y-6">
                            <!-- West Africa -->
                            <div class="group">
                                <h4 class="text-white text-xs font-bold uppercase tracking-widest mb-3 group-hover:text-mcc-blue-400 transition-colors">{{ __('West Africa Headquarters') }}</h4>
                                <div class="flex flex-wrap items-center gap-y-2 text-sm">
                                    <div class="flex items-center text-mcc-slate-400">
                                        <svg class="w-4 h-4 mr-2 text-mcc-slate-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        <span class="leading-snug">{!! __('No. 4, Ganges Street, Maitama, Abuja, Nigeria') !!}</span>
                                    </div>
                                    <span class="text-white/20 px-3 select-none">|</span>
                                    <div class="flex items-center text-mcc-slate-400 group-hover:text-white transition-colors">
                                        <svg class="w-4 h-4 mr-2 text-mcc-slate-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                        +234 (0) 9 2208688
                                    </div>
                                    <span class="text-white/20 px-3 select-none">|</span>
                                    <div class="flex items-center text-mcc-slate-400 group-hover:text-white transition-colors">
                                        <svg class="w-4 h-4 mr-2 text-mcc-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                        <a href="mailto:mcc@mcg.com.cn" class="hover:underline">mcc@mcg.com.cn</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bottom Legal Strip -->
                <div class="pt-6 mt-2 border-t border-white/10 flex flex-col md:flex-row justify-between items-center text-xs text-mcc-slate-500 gap-4 font-medium">
                    <p>&copy; {{ date('Y') }} Mutual Commitment Company Ltd. {{ __('All rights reserved.') }}</p>
                    <div class="flex items-center space-x-6">
                        <a href="{{ route('login') }}" class="hover:text-white transition-colors duration-300 flex items-center">
                            <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            {{ __('Management Login') }}
                        </a>
                        <span class="w-1 h-1 bg-white/20 rounded-full"></span>
                        <a href="#" class="hover:text-white transition-colors duration-300">{{ __('Privacy Policy') }}</a>
                        <span class="w-1 h-1 bg-white/20 rounded-full"></span>
                        <a href="#" class="hover:text-white transition-colors duration-300">{{ __('Terms of Service') }}</a>
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
        document.querySelectorAll('[reveal], [reveal-left], [reveal-right], [reveal-scale]').forEach(el => revealObserver.observe(el));
    </script>
</body>

</html>