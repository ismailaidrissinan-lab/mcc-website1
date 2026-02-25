@extends('layouts.app')

@section('title', __('Talent & Development'))

@section('content')
    <!-- Talent Hero -->
    <div class="relative pt-32 pb-20 bg-mcc-slate-900 overflow-hidden">
        <div class="absolute inset-0 opacity-40">
            <img src="{{ asset('images/mcc-logo.png') }}"
                alt="Modern Training Environment" class="w-full h-full object-cover">
        </div>
        <div class="container-wide relative z-10">
            <div
                class="inline-flex items-center space-x-2 px-3 py-1 bg-mcc-gold/20 border border-mcc-gold/30 rounded-full mb-6">
                <span
                    class="text-mcc-gold text-[10px] font-bold uppercase tracking-widest">{{ __('Internal Investment') }}</span>
            </div>
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 tracking-tight">
                {{ __('Empowering Our Global Workforce') }}
            </h1>
            <p class="text-xl text-mcc-blue-100 max-w-3xl font-light leading-relaxed">
                {{ __('At MCC, we believe that infrastructure is only as strong as the people who build it. Our talent development programs are core to our mission of shared prosperity.') }}
            </p>
        </div>
    </div>

    <!-- Philosophy Section -->
    <section class="section-padding bg-white">
        <div class="container-wide">
            <div class="lg:grid lg:grid-cols-2 lg:gap-20 items-center">
                <div class="space-y-8" reveal>
                    <h2 class="text-3xl font-bold text-mcc-slate-900 tracking-tight leading-tight">
                        {{ __('Building Local Capacity, Meeting Global Standards') }}
                    </h2>
                    <div class="prose prose-xl prose-mcc text-mcc-slate-600 max-w-none space-y-6 font-light">
                        <p>
                            {{ __('We are committed to maintaining a workforce that is at least 85% local in every country we operate. This is more than a policy; it is a commitment to long-term economic stability and technological transfer.') }}
                        </p>
                        <p>
                            {{ __('Through our training centers in Nigeria and China, we provide specialized education in engineering, project management, and sustainable construction practices.') }}
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-8 pt-6">
                        <div class="p-6 bg-mcc-slate-50 rounded-2xl border border-mcc-slate-100">
                            <div class="text-4xl font-bold text-mcc-blue-600 mb-1">85%+</div>
                            <div class="text-xs font-bold text-mcc-gold uppercase tracking-widest">
                                {{ __('Local Workforce') }}</div>
                        </div>
                        <div class="p-6 bg-mcc-slate-50 rounded-2xl border border-mcc-slate-100">
                            <div class="text-4xl font-bold text-mcc-blue-600 mb-1">2,000+</div>
                            <div class="text-xs font-bold text-mcc-gold uppercase tracking-widest">
                                {{ __('Alumni Engineers') }}</div>
                        </div>
                    </div>
                </div>

                <div class="mt-16 lg:mt-0 relative" reveal>
                    <div class="aspect-[4/5] bg-mcc-slate-100 rounded-[3rem] overflow-hidden shadow-2xl relative z-10">
                        <img src="{{ asset('images/mcc-logo.png') }}"
                            alt="Training Session" class="w-full h-full object-cover">
                    </div>
                    <div class="absolute -top-10 -right-10 w-48 h-48 bg-mcc-gold/10 rounded-full blur-3xl"></div>
                    <div class="absolute -bottom-10 -left-10 w-48 h-48 bg-mcc-blue-900/10 rounded-full blur-3xl"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Active Programs -->
    <section class="section-padding bg-mcc-slate-900 text-white overflow-hidden">
        <div class="container-wide">
            <div class="text-center max-w-3xl mx-auto mb-20" reveal>
                <h2 class="text-mcc-gold font-bold text-xs uppercase tracking-[0.2em] mb-4">
                    {{ __('Development Portfolio') }}</h2>
                <h3 class="text-4xl font-bold tracking-tight">{{ __('Strategic Training Programs') }}</h3>
                <p class="mt-6 text-mcc-slate-400 font-light text-lg">
                    {{ __('Our programs are designed to bridge the gap between academic theory and high-impact industrial application.') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($programs as $program)
                    <div class="group relative bg-white/5 backdrop-blur-md rounded-[2.5rem] p-10 border border-white/10 transition-all duration-500 hover:bg-white/10"
                        reveal>
                        <div class="flex flex-col h-full justify-between">
                            <div>
                                <div
                                    class="inline-flex items-center space-x-2 px-3 py-1 bg-mcc-gold/20 border border-mcc-gold/30 rounded-full mb-8">
                                    <span
                                        class="text-mcc-gold text-[10px] font-bold uppercase tracking-widest">{{ $program->location }}</span>
                                </div>
                                <h4 class="text-2xl font-bold mb-4 group-hover:text-mcc-gold transition-colors">
                                    {{ $program->title }}</h4>
                                <p class="text-mcc-slate-400 font-light leading-relaxed">
                                    {{ $program->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-24 bg-white">
        <div class="container-wide">
            <div
                class="lg:grid lg:grid-cols-2 lg:gap-20 items-center bg-mcc-slate-50 rounded-[4rem] p-12 md:p-20 shadow-xl overflow-hidden relative">
                <div class="absolute top-0 right-0 w-1/2 h-full bg-white -skew-x-12 translate-x-1/2 z-0"></div>

                <div class="relative z-10" reveal>
                    <h2 class="text-3xl md:text-5xl font-bold text-mcc-slate-900 leading-tight mb-8">
                        {{ __('Join the MCC Talent Ecosystem') }}
                    </h2>
                    <p class="text-xl text-mcc-slate-600 font-light leading-relaxed mb-10">
                        {{ __('We are always looking for visionary talent to help us build the next generation of global infrastructure.') }}
                    </p>
                    <a href="{{ route('contact') }}"
                        class="btn-corporate bg-mcc-blue-900 text-white hover:bg-mcc-blue-950 justify-center">
                        {{ __('Explore Careers & Training') }}
                    </a>
                </div>

                <div class="mt-16 lg:mt-0 relative z-10" reveal>
                    <img src="{{ asset('images/mcc-logo.png') }}"
                        alt="Team Work" class="rounded-3xl shadow-lg w-full">
                </div>
            </div>
        </div>
    </section>
@endsection