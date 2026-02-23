@extends('layouts.app')

@section('title', $sector->name)

@section('content')
<!-- Sector Hero -->
<div class="relative pt-32 pb-20 bg-mcc-slate-900 overflow-hidden">
    <div class="absolute inset-0 opacity-30">
        <img src="https://images.unsplash.com/photo-1541888946425-d81bb19480c5?ixlib=rb-1.2.1&auto=format&fit=crop&w=2000&q=80" class="w-full h-full object-cover">
    </div>
    <div class="container-wide relative z-10">
        <div class="inline-flex items-center space-x-2 px-3 py-1 bg-mcc-gold/20 border border-mcc-gold/30 rounded-full mb-6">
            <span class="text-mcc-gold text-[10px] font-bold uppercase tracking-widest">{{ __('Business Sector') }}</span>
        </div>
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 tracking-tight">
            {{ $sector->name }}
        </h1>
        <p class="text-xl text-mcc-blue-100 max-w-3xl font-light leading-relaxed">
            {{ $sector->description ?? __('Leading the way in global infrastructure development within the :name sector.', ['name' => $sector->name]) }}
        </p>
    </div>
</div>

<section class="section-padding bg-white">
    <div class="container-wide">
        <div class="lg:grid lg:grid-cols-12 lg:gap-20">
            <!-- Main Content -->
            <div class="lg:col-span-8 space-y-16">
                <div class="space-y-8" reveal>
                    <h2 class="text-3xl font-bold text-mcc-slate-900 tracking-tight">{{ __('Strategic Expertise & Solutions') }}</h2>
                    <div class="prose prose-xl prose-mcc text-mcc-slate-600 max-w-none space-y-6 font-light">
                        <p>
                            {{ __('Mutual Commitment Company Ltd provides end-to-end solutions in the :name sector. Our approach combines cutting-edge technology with sustainable practices to deliver high-quality infrastructure that meets international standards.', ['name' => $sector->name]) }}
                        </p>
                        <p>
                            {{ __('From feasibility studies and design to construction and maintenance, our multidisciplinary teams ensure every phase of the project is executed with precision and care.') }}
                        </p>
                    </div>
                </div>

                <div class="space-y-10" reveal>
                    <div class="flex items-center justify-between border-b border-mcc-slate-100 pb-6">
                        <h3 class="text-2xl font-bold text-mcc-slate-900">{{ __('Sector Portfolio') }}</h3>
                        <span class="text-xs font-bold text-mcc-gold uppercase tracking-widest">{{ $sector->projects->count() }} {{ __('Projects') }}</span>
                    </div>

                    @if($sector->projects->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @foreach($sector->projects as $project)
                        <a href="{{ route('projects.show', $project->slug) }}" class="group block bg-white rounded-3xl overflow-hidden border border-mcc-slate-100 shadow-sm transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                            <div class="aspect-[16/10] relative overflow-hidden bg-mcc-slate-200">
                                @if($project->image_path)
                                <img src="{{ asset('storage/'.$project->image_path) }}" 
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                @else
                                <div class="w-full h-full flex items-center justify-center bg-mcc-slate-50">
                                    <img src="{{ asset('images/mcc-logo.png') }}" alt="MCC Ltd" class="w-24 h-auto opacity-20">
                                </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-mcc-slate-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            </div>
                            <div class="p-8">
                                <div class="flex items-center justify-between mb-3 text-xs font-bold text-mcc-gold uppercase tracking-widest">
                                    <span>{{ $project->location }}</span>
                                    <span>{{ $project->completion_date ? $project->completion_date->format('Y') : '' }}</span>
                                </div>
                                <h4 class="text-xl font-bold text-mcc-slate-900 group-hover:text-mcc-blue-600 transition-colors duration-300">{{ $project->title }}</h4>
                                <div class="mt-6 flex items-center text-sm font-bold text-mcc-blue-600 transition-all duration-300 opacity-0 transform translate-x-[-10px] group-hover:opacity-100 group-hover:translate-x-0">
                                    {{ __('View Case Study') }}
                                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    @else
                    <div class="p-20 bg-mcc-slate-50 rounded-[3rem] text-center border-2 border-dashed border-mcc-slate-100">
                        <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-mcc-slate-300 mx-auto mb-6 shadow-sm">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <p class="text-mcc-slate-500 font-light truncate max-w-xs mx-auto">
                            {{ __('No projects currently listed in this sector.') }}
                        </p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-4 mt-16 lg:mt-0">
                <div class="sticky top-32 space-y-8" reveal>
                    <!-- Services Card -->
                    <div class="bg-mcc-slate-900 rounded-[2.5rem] p-10 text-white shadow-2xl relative overflow-hidden">
                        <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/5 rounded-full blur-2xl"></div>
                        <h3 class="text-mcc-gold text-[10px] font-bold uppercase tracking-[0.2em] mb-10">{{ __('Our Solutions') }}</h3>
                        <ul class="space-y-6">
                            <li class="flex items-center space-x-4">
                                <div class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-mcc-gold">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <span class="text-sm font-medium tracking-wide">{{ __('Strategic Planning') }}</span>
                            </li>
                            <li class="flex items-center space-x-4">
                                <div class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-mcc-gold">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                </div>
                                <span class="text-sm font-medium tracking-wide">{{ __('Turnkey Construction') }}</span>
                            </li>
                            <li class="flex items-center space-x-4">
                                <div class="w-10 h-10 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-mcc-gold">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                </div>
                                <span class="text-sm font-medium tracking-wide">{{ __('Sustainable Maintenance') }}</span>
                            </li>
                        </ul>
                        
                        <a href="{{ route('contact') }}" class="btn-corporate w-full bg-white text-mcc-slate-900 border-white hover:bg-mcc-gold hover:border-mcc-gold justify-center mt-12 py-5">
                            {{ __('Discuss a Project') }}
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
