@extends('layouts.app')

@section('title', $project->title . ' - ' . __('Community Impact'))

@section('content')
    <!-- Project Hero -->
    <div class="relative pt-32 pb-48 lg:pb-64 bg-mcc-slate-900 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ $project->image_url }}" class="w-full h-full object-cover opacity-30 transform scale-105">
            <div class="absolute inset-0 bg-gradient-to-b from-mcc-slate-900/50 via-mcc-slate-900 to-white"></div>
        </div>

        <div class="container-wide relative z-10 text-center">
            <div
                class="inline-flex items-center space-x-2 px-3 py-1 bg-mcc-gold/20 border border-mcc-gold/30 rounded-full mb-6">
                <span class="text-mcc-gold text-[10px] font-bold uppercase tracking-widest">{{ $project->location }}</span>
            </div>
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-8 tracking-tight">
                {{ $project->title }}
            </h1>
            <div class="flex items-center justify-center space-x-6 text-mcc-blue-100/60 font-medium">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2 text-mcc-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    <span>{{ $project->published_at->format('F Y') }}</span>
                </div>
            </div>
        </div>
    </div>

    <section class="-mt-32 relative z-20 pb-32">
        <div class="container-wide max-w-5xl">
            <div class="bg-white rounded-[3rem] p-10 md:p-20 shadow-2xl border border-mcc-slate-100">
                <div class="prose prose-lg prose-mcc max-w-none">
                    <div class="mb-12">
                        <h3 class="text-2xl font-bold text-mcc-slate-900 mb-6">{{ __('Impact Summary') }}</h3>
                        <p class="text-xl text-mcc-slate-600 font-light leading-relaxed italic">
                            "{{ $project->summary }}"
                        </p>
                    </div>

                    <div class="content text-mcc-slate-700 leading-relaxed font-light space-y-6">
                        {!! nl2br(e($project->content)) !!}
                    </div>
                </div>

                <div
                    class="mt-20 pt-10 border-t border-mcc-slate-50 flex flex-col md:flex-row items-center justify-between">
                    <a href="{{ route('csr') }}"
                        class="inline-flex items-center text-xs font-bold text-mcc-slate-400 hover:text-mcc-blue-600 uppercase tracking-widest transition-colors mb-6 md:mb-0">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        {{ __('Back to All Initiatives') }}
                    </a>

                    <div class="flex items-center space-x-4">
                        <span
                            class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Share Report') }}</span>
                        <div class="flex items-center space-x-2">
                            <!-- Placeholder social buttons -->
                            <div
                                class="w-8 h-8 rounded-full bg-mcc-slate-50 flex items-center justify-center text-mcc-slate-400 hover:bg-mcc-blue-600 hover:text-white transition-all cursor-pointer">
                                <i class="fab fa-linkedin-in text-xs"></i>
                            </div>
                            <div
                                class="w-8 h-8 rounded-full bg-mcc-slate-50 flex items-center justify-center text-mcc-slate-400 hover:bg-mcc-blue-600 hover:text-white transition-all cursor-pointer">
                                <i class="fab fa-twitter text-xs"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection