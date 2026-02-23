@extends('layouts.app')

@section('title', __('Careers & Talent'))

@section('content')
<!-- Careers Hero -->
<div class="relative pt-32 pb-48 lg:pb-64 bg-mcc-slate-900 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-1.2.1&auto=format&fit=crop&w=2000&q=80" 
             class="w-full h-full object-cover opacity-30 transform scale-105">
        <div class="absolute inset-0 bg-gradient-to-b from-mcc-slate-900/50 via-mcc-slate-900 to-white"></div>
    </div>

    <div class="container-wide relative z-10 text-center">
        <div class="inline-flex items-center space-x-2 px-3 py-1 bg-mcc-gold/20 border border-mcc-gold/30 rounded-full mb-6">
            <span class="text-mcc-gold text-[10px] font-bold uppercase tracking-widest">{{ __('Join Our Legacy') }}</span>
        </div>
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-8 tracking-tight">
            {{ __('Build Your Future with MCC') }}
        </h1>
        <p class="text-xl text-mcc-blue-100 max-w-3xl mx-auto font-light leading-relaxed">
            {{ __('Join a global team of experts engineering the future of transnational infrastructure and investment.') }}
        </p>
    </div>
</div>

<!-- Job Board -->
<section class="-mt-32 relative z-20 pb-32">
    <div class="container-wide">
        <div class="bg-white p-12 md:p-20 rounded-[3rem] shadow-2xl border border-mcc-slate-100">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-8 mb-16 border-b border-mcc-slate-100 pb-12">
                <div>
                    <h2 class="text-2xl font-bold text-mcc-slate-900">{{ __('Current Opportunities') }}</h2>
                    <p class="text-mcc-slate-500 font-light">{{ __('Strategic roles across our African and Asian operations.') }}</p>
                </div>
                <div class="flex gap-4">
                    <span class="inline-flex items-center px-4 py-2 bg-mcc-blue-50 text-mcc-blue-700 text-xs font-bold rounded-xl">{{ $jobs->count() }} {{ __('Active Postings') }}</span>
                </div>
            </div>

            <div class="space-y-6">
                @forelse($jobs as $job)
                <div class="group lg:flex items-center justify-between p-8 bg-mcc-slate-50 rounded-3xl border border-mcc-slate-100 hover:border-mcc-blue-600 hover:bg-white hover:shadow-xl transition-all duration-300">
                    <div class="lg:flex-1 space-y-4">
                        <div class="flex items-center gap-4">
                            <span class="text-[10px] font-bold text-mcc-gold uppercase tracking-widest">{{ $job->department }}</span>
                            <span class="w-[1px] h-3 bg-mcc-slate-200"></span>
                            <span class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ $job->type }}</span>
                        </div>
                        <h3 class="text-xl font-bold text-mcc-slate-900 group-hover:text-mcc-blue-600 transition-colors">{{ $job->title }}</h3>
                        <div class="flex items-center text-mcc-slate-500 text-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            {{ $job->location }}
                        </div>
                    </div>
                    <div class="mt-8 lg:mt-0">
                        <a href="mailto:careers@mcc.global" class="btn-corporate bg-mcc-blue-900 text-white hover:bg-mcc-blue-600 transition-all">
                            {{ __('Apply Now') }}
                        </a>
                    </div>
                </div>
                @empty
                <div class="py-24 text-center">
                    <p class="text-mcc-slate-400 italic">{{ __('No active job openings at the moment. Please check back later.') }}</p>
                </div>
                @endforelse
            </div>

            <div class="mt-20 pt-16 border-t border-mcc-slate-100 text-center">
                <h3 class="text-xl font-bold text-mcc-slate-900 mb-4">{{ __('Don\'t see a position that fits?') }}</h3>
                <p class="text-mcc-slate-500 font-light mb-8 max-w-xl mx-auto">
                    {{ __('We are always looking for exceptional talent in engineering, finance, and strategic investment. Send us your CV for future consideration.') }}
                </p>
                <a href="mailto:talent@mcc.global" class="text-mcc-blue-600 font-bold hover:text-mcc-blue-900 transition-colors">talent@mcc.global</a>
            </div>
        </div>
    </div>
</section>
@endsection
