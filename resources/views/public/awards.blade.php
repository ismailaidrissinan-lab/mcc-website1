@extends('layouts.app')

@section('title', __('Awards & Recognition'))

@section('content')
<!-- Awards Hero -->
<div class="relative pt-32 pb-20 bg-mcc-slate-900 overflow-hidden">
    <div class="absolute inset-0 opacity-30">
        <img src="{{ asset('images/mcc-logo.png') }}" class="w-full h-full object-cover">
    </div>
    <div class="container-wide relative z-10 text-center">
        <div class="inline-flex items-center space-x-2 px-3 py-1 bg-mcc-gold/20 border border-mcc-gold/30 rounded-full mb-6">
            <span class="text-mcc-gold text-[10px] font-bold uppercase tracking-widest">{{ __('Excellence & Recognition') }}</span>
        </div>
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 tracking-tight">
            {{ __('Honors & Achievements') }}
        </h1>
        <p class="text-xl text-mcc-blue-100 max-w-2xl mx-auto font-light leading-relaxed">
            {{ __('Celebrating decades of excellence in infrastructure, sustainable development, and global partnership.') }}
        </p>
    </div>
</div>

<section class="section-padding bg-white">
    <div class="container-wide">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            @foreach($awards as $award)
            <div class="group bg-mcc-slate-50 rounded-[3rem] p-10 border border-mcc-slate-100 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 relative overflow-hidden" reveal>
                <!-- Badge -->
                <div class="absolute top-8 right-8 text-mcc-blue-900/5 text-8xl font-black select-none z-0">
                    {{ $award->year }}
                </div>
                
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-mcc-gold mb-8 shadow-sm group-hover:bg-mcc-gold group-hover:text-white transition-colors duration-500">
                        @if($award->type == 'award')
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                        @elseif($award->type == 'csr')
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        @else
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        @endif
                    </div>
                    
                    <div class="text-xs font-bold text-mcc-gold uppercase tracking-[0.2em] mb-3">
                        {{ $award->year }} &middot; {{ __(ucfirst($award->type)) }}
                    </div>
                    
                    <h3 class="text-2xl font-bold text-mcc-slate-900 mb-4 tracking-tight group-hover:text-mcc-blue-700 transition-colors">
                        {{ $award->title }}
                    </h3>
                    
                    <p class="text-mcc-slate-600 font-light leading-relaxed">
                        {{ $award->description }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 bg-mcc-slate-50">
    <div class="container-wide">
        <div class="bg-mcc-blue-900 rounded-[3rem] p-12 md:p-20 text-white relative overflow-hidden shadow-2xl" reveal>
            <div class="absolute top-0 right-0 w-1/2 h-full bg-mcc-blue-800/20 -skew-x-12 translate-x-1/2"></div>
            <div class="relative z-10 max-w-3xl space-y-8">
                <h2 class="text-3xl md:text-5xl font-bold leading-tight">{{ __('Excellence is our Standard') }}</h2>
                <p class="text-xl text-mcc-blue-100 font-light leading-relaxed">
                    {{ __('Our awards are a testament to the dedication of our global teams and the trust of our international partners.') }}
                </p>
                <div class="pt-4">
                    <a href="{{ route('contact') }}" class="btn-corporate bg-mcc-gold text-mcc-slate-900 hover:bg-white justify-center shadow-lg">
                        {{ __('Partner with an Award-Winning Team') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
