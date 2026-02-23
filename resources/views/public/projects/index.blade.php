@extends('layouts.app')

@section('title', __('Projects & Experience'))

@section('content')
<!-- Header Section -->
<div class="relative pt-32 pb-20 bg-mcc-slate-900 overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <img src="https://images.unsplash.com/photo-1541888946425-d81bb19480c5?auto=format&fit=crop&w=2000&q=80" class="w-full h-full object-cover">
    </div>
    <div class="container-wide relative z-10 text-center">
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 tracking-tight animate-fade-in-up">
            {{ __('Projects Portfolio') }}
        </h1>
        <p class="text-xl text-mcc-blue-100 max-w-2xl mx-auto font-light leading-relaxed">
            {{ __('Explore our track record of excellence across the globe.') }}
        </p>
    </div>
</div>

<!-- Filter Section -->
<div class="bg-white border-b border-mcc-slate-100 sticky top-20 z-40 shadow-sm">
    <div class="container-wide py-4">
        <div class="flex flex-wrap items-center justify-center gap-2">
            <a href="{{ route('projects.index') }}" 
               class="px-6 py-2 rounded-full text-sm font-bold transition-all duration-300 {{ !request('sector') ? 'bg-mcc-blue-600 text-white shadow-lg' : 'text-mcc-slate-500 hover:text-mcc-blue-600 hover:bg-mcc-blue-50' }}">
                {{ __('All') }}
            </a>
            @foreach($sectors as $sector)
            <a href="{{ route('projects.index', ['sector' => $sector->slug]) }}" 
               class="px-6 py-2 rounded-full text-sm font-bold transition-all duration-300 {{ request('sector') == $sector->slug ? 'bg-mcc-blue-600 text-white shadow-lg' : 'text-mcc-slate-500 hover:text-mcc-blue-600 hover:bg-mcc-blue-50' }}">
                {{ $sector->name }}
            </a>
            @endforeach
        </div>
    </div>
</div>

<!-- Projects Grid -->
<section class="section-padding bg-mcc-slate-50 min-h-screen">
    <div class="container-wide">
        @if($projects->count() > 0)
        <div class="grid gap-10 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @foreach($projects as $project)
            <div class="group bg-white rounded-3xl overflow-hidden shadow-lg border border-mcc-slate-100 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2" reveal>
                <div class="aspect-[16/10] overflow-hidden relative">
                    <img src="{{ $project->image_path ? asset('storage/'.$project->image_path) : 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80' }}" 
                         alt="{{ $project->title }}" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    
                    <div class="absolute top-4 left-4">
                        <span class="px-4 py-1.5 bg-mcc-blue-900/90 backdrop-blur-md text-white text-[10px] font-bold rounded-full shadow-sm uppercase tracking-widest">
                            {{ __($project->status == 'completed' ? 'Completed' : 'Ongoing') }}
                        </span>
                    </div>
                    
                    <!-- Overlay on Hover -->
                    <div class="absolute inset-0 bg-mcc-blue-950/40 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center">
                        <a href="{{ route('projects.show', $project->slug) }}" class="w-14 h-14 bg-white rounded-full flex items-center justify-center text-mcc-blue-900 transform scale-75 group-hover:scale-100 transition-transform duration-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
                
                <div class="p-8">
                    <div class="flex items-center text-xs text-mcc-gold font-bold uppercase tracking-[0.2em] mb-3">
                        {{ $project->sector->name }}
                    </div>
                    <h3 class="text-2xl font-bold text-mcc-slate-900 mb-4 group-hover:text-mcc-blue-700 transition-colors">
                        <a href="{{ route('projects.show', $project->slug) }}">
                            {{ $project->title }}
                        </a>
                    </h3>
                    <p class="text-mcc-slate-600 text-sm line-clamp-2 leading-relaxed mb-6">{{ $project->description }}</p>
                    
                    <div class="pt-6 border-t border-mcc-slate-100 flex items-center justify-between">
                        <div class="flex items-center text-mcc-slate-400 text-xs">
                            <svg class="h-4 w-4 mr-1.5 text-mcc-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            {{ $project->location }}
                        </div>
                        <a href="{{ route('projects.show', $project->slug) }}" class="text-mcc-blue-600 font-bold text-xs uppercase tracking-widest hover:text-mcc-blue-800 transition-colors">
                            {{ __('View Details') }}
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="mt-20">
            {{ $projects->links() }}
        </div>
        @else
        <div class="max-w-xl mx-auto text-center py-20 bg-white rounded-3xl shadow-xl border border-mcc-slate-100">
            <div class="w-20 h-20 bg-mcc-blue-50 rounded-full flex items-center justify-center text-mcc-blue-400 mx-auto mb-6">
                <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path></svg>
            </div>
            <h3 class="text-2xl font-bold text-mcc-slate-900 mb-2">{{ __('No projects found') }}</h3>
            <p class="text-mcc-slate-500 mb-8">{{ __("We couldn't find any projects matching your criteria.") }}</p>
            <a href="{{ route('projects.index') }}" class="btn-corporate bg-mcc-blue-600 text-white hover:bg-mcc-blue-700">
                {{ __('Clear all filters') }}
            </a>
        </div>
        @endif
    </div>
</section>
@endsection
