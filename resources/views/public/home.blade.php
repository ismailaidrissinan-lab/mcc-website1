@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative h-screen min-h-[700px] flex items-center overflow-hidden bg-mcc-slate-900">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0 scale-105 animate-slow-zoom">
        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" 
             alt="Engineering Excellence" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-mcc-blue-950/90 via-mcc-blue-950/70 to-transparent"></div>
    </div>

    <div class="container-wide relative z-10 pt-20">
        <div class="max-w-3xl space-y-8">
            <div class="inline-flex items-center space-x-2 px-3 py-1 bg-mcc-gold/20 border border-mcc-gold/30 rounded-full">
                <span class="w-2 h-2 rounded-full bg-mcc-gold animate-pulse"></span>
                <span class="text-mcc-gold text-[10px] font-bold uppercase tracking-widest">{{ __('Engineering Excellence') }}</span>
            </div>
            
            <h1 class="text-5xl md:text-7xl font-bold text-white leading-[1.1] tracking-tight">
                {{ __('Building Sustainable Infrastructure for Global Development') }}
            </h1>
            
            <p class="text-xl text-mcc-slate-300 font-light max-w-2xl leading-relaxed">
                {{ __('Engineering Excellence Across Africa and Asia.') }} {{ __('We leverage international expertise and local knowledge to deliver projects that power communities and drive economic growth.') }}
            </p>
            
            <div class="flex flex-col sm:flex-row gap-5 pt-4">
                <a href="{{ route('projects.index') }}" class="btn-corporate bg-mcc-blue-600 text-white hover:bg-mcc-blue-700 shadow-mcc-blue-600/30">
                    {{ __('Explore Our Projects') }}
                    <svg class="ml-2 -mr-1 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
                <a href="{{ route('about') }}" class="btn-corporate bg-white/10 backdrop-blur-sm text-white border border-white/20 hover:bg-white/20">
                    {{ __('Learn More') }}
                </a>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center space-y-2 opacity-50">
        <span class="text-white text-[10px] uppercase tracking-[0.2em] font-bold">{{ __('Scroll') }}</span>
        <div class="w-[1px] h-12 bg-gradient-to-b from-white to-transparent"></div>
    </div>
</div>

<!-- Mission, Vision, Values -->
<section class="section-padding bg-mcc-slate-50 relative overflow-hidden" reveal>
    <div class="absolute top-0 right-0 w-1/3 h-full bg-mcc-blue-100/30 -skew-x-12 translate-x-1/2 z-0"></div>
    
    <div class="container-wide relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 lg:gap-8">
            <div class="group p-10 bg-white rounded-3xl shadow-xl transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 border border-mcc-slate-100 reveal-delay-100">
                <div class="w-16 h-16 bg-mcc-blue-50 rounded-2xl flex items-center justify-center text-mcc-blue-600 mb-8 transform transition-transform duration-500 group-hover:scale-110">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-mcc-slate-900">{{ __('Our Mission') }}</h3>
                <p class="text-mcc-slate-600 leading-relaxed font-light">
                    {{ __('To bridge the developmental gap between nations through innovative engineering and sustainable infrastructure solutions.') }}
                </p>
            </div>
            
            <div class="group p-10 bg-mcc-blue-900 rounded-3xl shadow-2xl transition-all duration-500 hover:scale-[1.02] relative overflow-hidden reveal-delay-200">
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/5 rounded-full scale-150 transition-transform duration-700 group-hover:scale-[2]"></div>
                <div class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center text-mcc-gold mb-8 transform transition-transform duration-500 group-hover:rotate-12">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-white">{{ __('Our Vision') }}</h3>
                <p class="text-mcc-blue-100 leading-relaxed font-light">
                    {{ __('To be the preferred global partner for high-impact infrastructure projects, recognized for integrity, excellence, and shared prosperity.') }}
                </p>
            </div>
            
            <div class="group p-10 bg-white rounded-3xl shadow-xl transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 border border-mcc-slate-100 reveal-delay-300">
                <div class="w-16 h-16 bg-mcc-blue-50 rounded-2xl flex items-center justify-center text-mcc-blue-600 mb-8 transform transition-transform duration-500 group-hover:scale-110">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-mcc-slate-900">{{ __('Our Values') }}</h3>
                <p class="text-mcc-slate-600 leading-relaxed font-light">
                    {{ __('Mutual Commitment, Integrity, Excellence, Sustainability, and Global Citizenship drive every decision we make.') }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-24 bg-white" reveal>
    <div class="container-wide">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-12 text-center">
            <div class="space-y-3">
                <div class="text-5xl font-bold text-mcc-blue-900" data-count="150">150+</div>
                <div class="text-xs font-bold text-mcc-gold uppercase tracking-[0.2em]">{{ __('Completed Projects') }}</div>
            </div>
            <div class="space-y-3">
                <div class="text-5xl font-bold text-mcc-blue-900" data-count="20">20+</div>
                <div class="text-xs font-bold text-mcc-gold uppercase tracking-[0.2em]">{{ __('Years Experience') }}</div>
            </div>
            <div class="space-y-3">
                <div class="text-5xl font-bold text-mcc-blue-900" data-count="12">12+</div>
                <div class="text-xs font-bold text-mcc-gold uppercase tracking-[0.2em]">{{ __('Global Markets') }}</div>
            </div>
            <div class="space-y-3">
                <div class="text-5xl font-bold text-mcc-blue-900" data-count="5000">5,000+</div>
                <div class="text-xs font-bold text-mcc-gold uppercase tracking-[0.2em]">{{ __('Dedicated Staff') }}</div>
            </div>
        </div>
    </div>
</section>

<!-- Sector Highlights -->
<section class="section-padding bg-mcc-slate-50 overflow-hidden">
    <div class="container-wide">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6" reveal>
            <div class="max-w-2xl">
                <h2 class="text-mcc-gold font-bold text-xs uppercase tracking-[0.2em] mb-4">{{ __('Core Sectors') }}</h2>
                <h3 class="text-4xl md:text-5xl font-bold tracking-tight text-mcc-slate-900 leading-tight">
                    {{ __('Engineering Solutions for a Changing World') }}
                </h3>
            </div>
            <a href="{{ route('projects.index') }}" class="group inline-flex items-center font-bold text-mcc-blue-700 hover:text-mcc-blue-900 transition-colors">
                {{ __('View Our Full Portfolio') }}
                <svg class="ml-2 w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach(\App\Models\Sector::take(4)->get() as $sector)
            <a href="{{ route('sectors.show', $sector->slug) }}" class="group relative aspect-[4/5] rounded-[2.5rem] overflow-hidden shadow-xl transition-all duration-700 hover:shadow-2xl hover:-translate-y-4" reveal>
                <img src="https://images.unsplash.com/photo-1541888946425-d81bb19480c5?auto=format&fit=crop&w=800&q=80" 
                     alt="{{ $sector->name }}" 
                     class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-mcc-blue-950 via-mcc-blue-950/40 to-transparent"></div>
                <div class="absolute inset-x-0 bottom-0 p-10 transform translate-y-4 transition-transform duration-500 group-hover:translate-y-0">
                    <h4 class="text-2xl font-bold text-white mb-4">{{ $sector->name }}</h4>
                    <p class="text-mcc-blue-100/70 text-sm line-clamp-2 font-light mb-6 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        {{ $sector->description }}
                    </p>
                    <div class="flex items-center text-mcc-gold font-bold text-xs uppercase tracking-widest">
                        {{ __('Learn More') }}
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Corporate News & Insights -->
<section class="section-padding bg-white overflow-hidden">
    <div class="container-wide">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6" reveal>
            <div class="max-w-2xl">
                <h2 class="text-mcc-gold font-bold text-xs uppercase tracking-[0.2em] mb-4">{{ __('Latest Updates') }}</h2>
                <h3 class="text-4xl md:text-5xl font-bold tracking-tight text-mcc-slate-900 leading-tight">
                    {{ __('Corporate News & Insights') }}
                </h3>
            </div>
            <a href="#" class="group inline-flex items-center font-bold text-mcc-blue-700 hover:text-mcc-blue-900 transition-colors">
                {{ __('View All News') }}
                <svg class="ml-2 w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            @foreach($latestArticles as $article)
            <div class="group flex flex-col bg-white rounded-3xl overflow-hidden border border-mcc-slate-100 shadow-sm hover:shadow-2xl transition-all duration-500" reveal>
                <div class="aspect-[16/9] overflow-hidden relative">
                    <img src="{{ $article->image_path ? asset('storage/'.$article->image_path) : 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800&q=80' }}" 
                         alt="{{ $article->title }}" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute top-4 left-4 bg-mcc-blue-900/80 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full">
                        {{ $article->published_at->format('M d, Y') }}
                    </div>
                </div>
                <div class="p-8 flex-grow flex flex-col">
                    <h4 class="text-xl font-bold text-mcc-slate-900 mb-4 line-clamp-2 min-h-[3.5rem] group-hover:text-mcc-blue-600 transition-colors">
                        {{ $article->title }}
                    </h4>
                    <p class="text-mcc-slate-500 text-sm font-light leading-relaxed mb-8 line-clamp-3">
                        {{ $article->summary }}
                    </p>
                    <div class="mt-auto pt-6 border-t border-mcc-slate-50">
                        <a href="{{ route('articles.show', $article->slug) }}" class="inline-flex items-center text-xs font-bold text-mcc-blue-600 uppercase tracking-widest hover:text-mcc-blue-900 transition-colors">
                            {{ __('Read Article') }}
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 bg-white">
    <div class="container-wide">
        <div class="bg-mcc-blue-900 rounded-[3rem] p-12 md:p-20 text-white relative overflow-hidden shadow-2xl" reveal>
            <div class="absolute top-0 right-0 w-1/2 h-full bg-mcc-blue-800/20 -skew-x-12 translate-x-1/2"></div>
            <div class="relative z-10 max-w-3xl space-y-8">
                <h2 class="text-3xl md:text-5xl font-bold leading-tight">{{ __('Ready to power your next major developmental leap?') }}</h2>
                <p class="text-xl text-mcc-blue-100 font-light leading-relaxed">
                    {{ __('Partner with MCC for world-class engineering and strategic investment expertise across African and Asian markets.') }}
                </p>
                <div class="flex flex-col sm:flex-row gap-6 pt-4">
                    <a href="{{ route('contact') }}" class="btn-corporate bg-mcc-gold text-mcc-slate-900 hover:bg-white justify-center shadow-lg">
                        {{ __('Contact Our Global Offices') }}
                    </a>
                    <a href="{{ route('projects.index') }}" class="btn-corporate bg-white/10 text-white border-white/20 hover:bg-white/20 justify-center">
                        {{ __('Explore Experience') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
