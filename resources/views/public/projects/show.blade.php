@extends('layouts.app')

@section('title', $project->title)

@section('content')
    <!-- Project Hero -->
    <div class="relative pt-32 pb-48 lg:pb-64 bg-mcc-slate-900 overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ $project->image_url }}" class="w-full h-full object-cover opacity-30 transform scale-105">
            <div class="absolute inset-0 bg-gradient-to-b from-mcc-slate-900/50 via-mcc-slate-900 to-white"></div>
        </div>

        <div class="container-wide relative z-10">
            <nav class="flex text-xs text-mcc-blue-200/60 mb-8 uppercase tracking-widest font-bold" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-3">
                    <li><a href="{{ route('projects.index') }}"
                            class="hover:text-white transition-colors">{{ __('Projects') }}</a></li>
                    <li><span class="text-white/20">/</span></li>
                    <li class="text-white">{{ $project->sector->name }}</li>
                </ol>
            </nav>

            <div class="max-w-4xl">
                <div class="inline-flex items-center space-x-3 mb-6">
                    <span class="w-12 h-[1px] bg-mcc-gold"></span>
                    <span
                        class="text-mcc-gold text-xs font-bold uppercase tracking-[0.3em]">{{ $project->sector->name }}</span>
                </div>
                <h1 class="text-4xl md:text-6xl font-bold text-white tracking-tight leading-tight">
                    {{ $project->title }}
                </h1>

                <div class="mt-8 flex flex-wrap items-center gap-6">
                    <div class="flex items-center text-mcc-slate-300">
                        <svg class="h-5 w-5 mr-2 text-mcc-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                        </svg>
                        <span class="text-sm font-medium">{{ $project->location }}</span>
                    </div>
                    <div class="flex items-center">
                        @php
                            $statusColor = match($project->status) {
                                'completed' => 'bg-green-500',
                                'operational' => 'bg-blue-500',
                                'suspended' => 'bg-red-500',
                                default => 'bg-amber-500',
                            };
                            $statusText = match($project->status) {
                                'completed' => __('Completed'),
                                'operational' => __('Operational'),
                                'suspended' => __('Suspended'),
                                default => __('Ongoing'),
                            };
                        @endphp
                        <span class="w-2 h-2 rounded-full mr-2 {{ $statusColor }}"></span>
                        <span class="text-sm font-bold uppercase tracking-widest {{ str_replace('bg-', 'text-', $statusColor) }}">
                            {{ $statusText }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Project Details Section -->
    <section class="-mt-32 lg:-mt-48 relative z-20 pb-32">
        <div class="container-wide">
            <div class="lg:grid lg:grid-cols-12 lg:gap-16">
                <!-- Left: Main Content -->
                <div class="lg:col-span-8">
                    <!-- Main Visual -->
                    <div class="bg-white p-2 rounded-[2.5rem] shadow-2xl mb-16 overflow-hidden border border-mcc-slate-100">
                        <img src="{{ $project->image_url }}"
                            class="w-full h-auto rounded-[2.2rem] shadow-inner">
                    </div>

                    <div class="space-y-12">
                        <div class="prose prose-xl prose-mcc max-w-none">
                            <h2 class="text-3xl font-bold text-mcc-slate-900 border-b border-mcc-slate-100 pb-6 mb-8">
                                {{ __('Project Overview') }}</h2>
                            <p class="text-lg leading-relaxed text-mcc-slate-600">{{ $project->description }}</p>

                            <div
                                class="mt-12 bg-white rounded-3xl p-10 shadow-lg border border-mcc-slate-100 italic text-mcc-slate-700 leading-relaxed relative">
                                <span
                                    class="absolute top-4 left-4 text-6xl text-mcc-blue-100 font-serif opacity-50">&ldquo;</span>
                                <div class="relative z-10">
                                    {!! $project->content ?? 'Detailed project report coming soon...' !!}
                                </div>
                            </div>
                        </div>

                        <!-- Gallery -->
                        @if($project->images->count() > 0)
                            <div>
                                <h2 class="text-3xl font-bold text-mcc-slate-900 mb-8">{{ __('Image Gallery') }}</h2>
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                    @foreach($project->images as $image)
                                        <div
                                            class="group relative overflow-hidden rounded-2xl aspect-square bg-mcc-slate-100 shadow-md">
                                            <img src="{{ $image->image_url }}"
                                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                            @if($image->caption)
                                                <div
                                                    class="absolute inset-0 bg-mcc-blue-900/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                                    <p class="text-white text-xs font-bold uppercase tracking-widest">
                                                        {{ $image->caption }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Right: Sidebar Stats -->
                <div class="lg:col-span-4 mt-16 lg:mt-0">
                    <div class="sticky top-32 space-y-10">
                        <!-- Stats Card -->
                        <div class="bg-mcc-slate-900 rounded-3xl p-10 shadow-2xl text-white relative overflow-hidden">
                            <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/5 rounded-full scale-150"></div>

                            <h3
                                class="text-mcc-gold text-xs font-bold uppercase tracking-[0.2em] mb-8 border-b border-white/10 pb-4">
                                {{ __('Project Vital Stats') }}
                            </h3>

                            <dl class="space-y-8 relative z-10">
                                <div class="space-y-2">
                                    <dt class="text-mcc-slate-500 text-[10px] font-bold uppercase tracking-widest">
                                        {{ __('Sector') }}</dt>
                                    <dd class="text-xl font-medium">{{ $project->sector->name }}</dd>
                                </div>
                                <div class="space-y-2">
                                    <dt class="text-mcc-slate-500 text-[10px] font-bold uppercase tracking-widest">
                                        {{ __('Location') }}</dt>
                                    <dd class="text-xl font-medium">{{ $project->location }}</dd>
                                </div>
                                <div class="space-y-2">
                                    <dt class="text-mcc-slate-500 text-[10px] font-bold uppercase tracking-widest">
                                        {{ __('Status') }}</dt>
                                    <dd class="text-xl font-medium">
                                        @switch($project->status)
                                            @case('operational')
                                                {{ __('Operational') }}
                                                @break
                                            @case('suspended')
                                                {{ __('Suspended') }}
                                                @break
                                            @case('completed')
                                                {{ __('Completed') }}
                                                @break
                                            @default
                                                {{ __('Ongoing') }}
                                        @endswitch
                                    </dd>
                                </div>
                                @if($project->award_date)
                                    <div class="space-y-2">
                                        <dt class="text-mcc-slate-500 text-[10px] font-bold uppercase tracking-widest">
                                            {{ __('Award Date') }}</dt>
                                        <dd class="text-xl font-medium">{{ $project->award_date->format('M Y') }}</dd>
                                    </div>
                                @endif
                                @if($project->completion_date)
                                    <div class="space-y-2">
                                        <dt class="text-mcc-slate-500 text-[10px] font-bold uppercase tracking-widest">
                                            {{ __('Completion Date') }}</dt>
                                        <dd class="text-xl font-medium">{{ $project->completion_date->format('M Y') }}</dd>
                                    </div>
                                @endif
                            </dl>

                            <a href="{{ route('contact') }}"
                                class="btn-corporate w-full bg-mcc-blue-600 text-white hover:bg-mcc-blue-700 shadow-mcc-blue-600/30 mt-12 justify-center">
                                {{ __('Inquire About This Project') }}
                            </a>
                        </div>

                        <!-- Trust Card -->
                        <div class="bg-mcc-blue-50 border border-mcc-blue-100 rounded-3xl p-10">
                            <h4 class="text-mcc-blue-900 font-bold text-lg mb-4">{{ __('Ready to partner with us?') }}</h4>
                            <p class="text-mcc-blue-800/70 text-sm leading-relaxed mb-8">
                                {{ __('MCC is always looking for significant development partnerships. Let\'s build the foundation for economic growth together.') }}
                            </p>
                            <a href="{{ route('contact') }}"
                                class="inline-flex items-center text-mcc-blue-700 font-bold text-sm hover:text-mcc-blue-900 transition-colors">
                                {{ __('Contact our team') }}
                                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection