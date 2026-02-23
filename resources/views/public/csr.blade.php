@extends('layouts.app')

@section('title', __('Community Impact & CSR'))

@section('content')
<!-- CSR Hero -->
<div class="relative pt-32 pb-48 lg:pb-64 bg-mcc-slate-900 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-1.2.1&auto=format&fit=crop&w=2000&q=80" 
             class="w-full h-full object-cover opacity-30 transform scale-105">
        <div class="absolute inset-0 bg-gradient-to-b from-mcc-slate-900/50 via-mcc-slate-900 to-white"></div>
    </div>

    <div class="container-wide relative z-10 text-center">
        <div class="inline-flex items-center space-x-2 px-3 py-1 bg-mcc-gold/20 border border-mcc-gold/30 rounded-full mb-6">
            <span class="text-mcc-gold text-[10px] font-bold uppercase tracking-widest">{{ __('Global Citizenship') }}</span>
        </div>
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-8 tracking-tight">
            {{ __('Community Impact & Social Responsibility') }}
        </h1>
        <p class="text-xl text-mcc-blue-100 max-w-3xl mx-auto font-light leading-relaxed">
            {{ __('Beyond engineering excellence, we are committed to empowering communities through education, health, and sustainable development initiatives.') }}
        </p>
    </div>
</div>

<section class="-mt-32 relative z-20 pb-32">
    <div class="container-wide">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($projects as $project)
            <div class="group flex flex-col bg-white rounded-3xl overflow-hidden border border-mcc-slate-100 shadow-sm hover:shadow-2xl transition-all duration-500" reveal>
                <div class="aspect-[16/9] overflow-hidden relative">
                    <img src="{{ $project->image_path ? asset('storage/'.$project->image_path) : 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?auto=format&fit=crop&w=800&q=80' }}" 
                         alt="{{ $project->title }}" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute top-4 left-4 bg-mcc-blue-900/80 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full">
                        {{ $project->location }}
                    </div>
                </div>
                <div class="p-8 flex-grow flex flex-col text-left">
                    <a href="{{ route('csr.show', $project->slug) }}" class="group/title">
                        <h4 class="text-xl font-bold text-mcc-slate-900 mb-4 group-hover/title:text-mcc-blue-600 transition-colors">{{ $project->title }}</h4>
                    </a>
                    <p class="text-mcc-slate-500 text-sm font-light leading-relaxed mb-8">
                        {{ $project->summary }}
                    </p>
                    <div class="mt-auto pt-6 border-t border-mcc-slate-50">
                        <a href="{{ route('csr.show', $project->slug) }}" class="inline-flex items-center text-xs font-bold text-mcc-blue-600 uppercase tracking-widest hover:text-mcc-blue-900 transition-colors">
                            {{ __('Impact Report') }}
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full bg-white p-12 md:p-20 rounded-[3rem] shadow-2xl border border-mcc-slate-100 text-center">
                <div class="max-w-3xl mx-auto space-y-8">
                    <h2 class="text-3xl font-bold text-mcc-slate-900">{{ __('Our Commitment to Shared Prosperity') }}</h2>
                    <p class="text-mcc-slate-600 leading-relaxed text-lg font-light">
                        {{ __('MCC believes that infrastructure is only as strong as the communities it serves. Detailed community engagement reports will be available shortly.') }}
                    </p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
