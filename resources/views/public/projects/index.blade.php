@extends('layouts.app')

@section('title', __('Projects & Experience'))

@section('content')
    <!-- Header Section -->
    <div class="relative pt-32 pb-20 bg-mcc-slate-900 overflow-hidden">
        <div class="absolute inset-0 opacity-40">
            <img src="{{ asset('images/mcc-logo.png') }}" alt="Chinese Engineering Excellence"
                class="w-full h-full object-cover">
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


    <!-- Projects & Map Section -->
    <!-- Projects & Map Section -->
    <section x-data="{ 
                        showModal: false, 
                        activeProject: null,
                        currentSlide: 0,
                        showMap: true,
                        nextSlide() {
                            if (this.activeProject && this.activeProject.images.length > 0) {
                                this.currentSlide = (this.currentSlide + 1) % this.activeProject.images.length;
                            }
                        },
                        prevSlide() {
                            if (this.activeProject && this.activeProject.images.length > 0) {
                                this.currentSlide = (this.currentSlide - 1 + this.activeProject.images.length) % this.activeProject.images.length;
                            }
                        },
                        openProject(project) {
                            this.activeProject = project;
                            this.currentSlide = 0;
                            this.showModal = true;
                            document.body.style.overflow = 'hidden';
                        },
                        closeModal() {
                            this.showModal = false;
                            document.body.style.overflow = 'auto';
                        },
                        loading: false,
                        searchQuery: '{{ request('search', '') }}',
                        selectedState: '{{ request('state', '') }}',
                        selectedSector: '{{ request('sector', '') }}',
                        selectedStatus: '{{ request('status', '') }}',
                        fetchProjects() {
                            this.loading = true;
                            const url = new URL('{{ route('projects.index') }}');
                            if (this.searchQuery) url.searchParams.set('search', this.searchQuery);
                            if (this.selectedState) url.searchParams.set('state', this.selectedState);
                            if (this.selectedSector) url.searchParams.set('sector', this.selectedSector);
                            if (this.selectedStatus) url.searchParams.set('status', this.selectedStatus);

                            fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                            .then(response => response.json())
                            .then(data => {
                                document.getElementById('project-list-container').innerHTML = data.list;
                                document.getElementById('project-stats-container').innerHTML = data.stats;
                                this.$dispatch('projects-updated', data.statesWithProjects);
                                this.loading = false;
                            })
                            .catch(error => { console.error('Error:', error); this.loading = false; });
                        }
                    }" @state-selected.window="selectedState = $event.detail; fetchProjects()"
        @status-selected.window="selectedStatus = $event.detail; fetchProjects()"
        class="bg-mcc-slate-50 border-t border-mcc-slate-100 overflow-hidden relative pb-20">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 relative z-20">
            <!-- Statistics Dashboard -->
            <div id="project-stats-container"
                class="bg-white rounded-2xl shadow-xl shadow-mcc-slate-200/50 p-6 border border-mcc-slate-100 mb-12 transform hover:-translate-y-1 transition-transform duration-300">
                @include('public.projects._stats', ['stats' => $stats])
            </div>

            <!-- Interactive Map & Projects Sidebar Section -->
            <div class="flex flex-col lg:flex-row gap-8 lg:h-[700px] mb-12">
                <!-- Left Pane: Map (65%) -->
                <div class="w-full lg:w-[65%] h-auto lg:h-full flex flex-col">
                    <div class="bg-white rounded-3xl shadow-sm border border-mcc-slate-100 overflow-hidden flex-1 flex flex-col transition-all duration-500"
                        :class="showMap ? 'h-auto opacity-100' : 'h-24 opacity-90'">
                        <!-- Map Header Controls -->
                        <div
                            class="p-6 border-b border-mcc-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-mcc-slate-50/50 shrink-0">
                            <div>
                                <h2
                                    class="text-xl lg:text-2xl font-black text-mcc-slate-900 tracking-tight flex items-center gap-3">
                                    {{ __('Project Footprint') }}
                                    <div class="h-max relative flex items-center justify-center">
                                        <span
                                            class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-mcc-blue-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-2 w-2 bg-mcc-blue-600"></span>
                                    </div>
                                </h2>
                                <p class="text-sm text-mcc-slate-500 mt-1 font-medium">
                                    {{ __('Explore our presence across Nigeria by selecting a state.') }}
                                </p>
                            </div>

                            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full sm:w-auto mt-4 sm:mt-0">
                                <!-- Search Bar -->
                                <div class="relative flex-1 sm:w-64">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-4 w-4 text-mcc-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>
                                    <input type="text" x-model="searchQuery" @input.debounce.500ms="fetchProjects()"
                                        placeholder="{{ __('Search projects...') }}"
                                        class="block w-full pl-10 pr-3 py-2 border border-mcc-slate-200 rounded-full leading-5 bg-white placeholder-mcc-slate-400 focus:outline-none focus:bg-white focus:ring-1 focus:ring-mcc-blue-500 focus:border-mcc-blue-500 text-sm transition-all shadow-sm">
                                </div>

                                <div
                                    class="flex items-center bg-white rounded-full border border-mcc-slate-200 p-1 shadow-sm shrink-0 w-32 sm:w-40 relative">
                                    <span
                                        class="pl-3 pr-1 text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Sector') }}</span>
                                    <select x-model="selectedSector" @change="fetchProjects()"
                                        class="w-full text-xs font-bold border-none bg-transparent py-1.5 pl-1 pr-6 text-mcc-slate-700 focus:ring-0 cursor-pointer hover:text-mcc-blue-600 transition-colors truncate appearance-none">
                                        <option value="">{{ __('All Sectors') }}</option>
                                        @foreach($sectors as $sector)
                                            <option value="{{ $sector->slug }}">{{ $sector->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                        <svg class="h-4 w-4 text-mcc-slate-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>

                                <button @click="showMap = !showMap"
                                    class="p-2.5 rounded-full bg-white border border-mcc-slate-200 text-mcc-slate-500 hover:text-mcc-blue-600 hover:border-mcc-blue-200 hover:bg-mcc-blue-50 transition-all shadow-sm shrink-0"
                                    :title="showMap ? 'Hide Map' : 'Show Map'">
                                    <svg x-show="showMap" class="w-5 h-5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 15l7-7 7 7"></path>
                                    </svg>
                                    <svg x-show="!showMap" class="w-5 h-5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Map Container -->
                        <div x-show="showMap" x-collapse
                            class="flex-1 relative bg-mcc-slate-50/30 p-4 sm:p-8 flex items-center justify-center min-h-[400px]">
                            <div class="max-w-4xl w-full">
                                <x-nigeria-map :states-with-projects="$statesWithProjects" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Pane: Projects Sidebar (35%) -->
                <div
                    class="w-full lg:w-[35%] lg:h-full min-h-[600px] lg:min-h-0 bg-white rounded-3xl shadow-sm border border-mcc-slate-100 flex flex-col overflow-hidden relative">
                    <!-- Header for List -->
                    <div class="p-6 border-b border-mcc-slate-100 bg-mcc-slate-50/50 flex flex-col gap-4 shrink-0">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-black text-mcc-slate-900 tracking-tight flex items-center">
                                {{ __('Directory') }}
                                <span
                                    class="ml-3 px-2 py-0.5 rounded-full bg-mcc-blue-50 text-mcc-blue-700 text-[10px] font-bold border border-mcc-blue-100/50"
                                    x-text="'{{ $projects->count() }}'"></span>
                            </h3>

                            <!-- Active Filters Display -->
                            <template x-if="searchQuery || selectedState || selectedSector || selectedStatus">
                                <button
                                    @click="searchQuery = ''; selectedState = ''; selectedSector = ''; selectedStatus = ''; fetchProjects(); $dispatch('reset-map')"
                                    class="flex items-center gap-1 px-2.5 py-1 rounded bg-red-50 text-red-600 hover:bg-red-100 hover:text-red-700 transition-colors border border-red-100 text-[9px] font-bold uppercase tracking-widest shadow-sm">
                                    <span>✕</span> Clear
                                </button>
                            </template>
                        </div>
                    </div>

                    <!-- Project Scrollable List -->
                    <div class="flex-1 relative min-h-0 bg-mcc-slate-50/30">
                        <div x-show="loading"
                            class="absolute inset-0 bg-white/80 backdrop-blur-[2px] z-30 flex flex-col items-center justify-center">
                            <div
                                class="w-8 h-8 border-4 border-mcc-blue-100 border-t-mcc-blue-600 rounded-full animate-spin mb-3">
                            </div>
                            <p class="text-[10px] font-bold text-mcc-slate-500 uppercase tracking-widest animate-pulse">
                                {{ __('Updating...') }}
                            </p>
                        </div>

                        <div id="project-list-container"
                            class="absolute inset-0 overflow-y-auto custom-scrollbar p-5 space-y-4 transition-opacity duration-300 scroll-smooth"
                            :class="loading ? 'opacity-30' : 'opacity-100'">
                            @include('public.projects._list')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div x-show="showModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-mcc-slate-900/80 backdrop-blur-sm"
            style="display: none;" @click.away="closeModal()">

            <div x-show="showModal" x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="bg-white rounded-[2.5rem] overflow-hidden shadow-2xl max-w-6xl w-full max-h-[90vh] flex flex-col md:flex-row relative p-3 md:p-4 gap-4">

                <!-- Floating Close Button -->
                <button @click="closeModal()"
                    class="absolute top-6 right-6 z-50 bg-white/50 hover:bg-mcc-slate-100 backdrop-blur-md text-mcc-slate-600 hover:text-mcc-slate-900 p-2.5 rounded-full shadow-sm transition-all hover:scale-105 border border-mcc-slate-200/50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>

                <!-- Left: Card-in-Card Slideshow Section -->
                <div
                    class="w-full md:w-3/5 bg-mcc-slate-50 rounded-3xl relative group h-64 md:h-auto shrink-0 overflow-hidden shadow-[inset_0_2px_10px_rgba(0,0,0,0.05)] border border-mcc-slate-100">
                    <template x-if="activeProject && activeProject.images.length > 0">
                        <div class="h-full w-full relative">
                            <img :src="activeProject.images[currentSlide]"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105"
                                alt="Project Image">

                            <!-- Subtle Dark Gradient Overlay -->
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent opacity-90 pointer-events-none">
                            </div>

                            <!-- Slideshow Controls (Glassmorphic) -->
                            <template x-if="activeProject.images.length > 1">
                                <div
                                    class="absolute inset-0 flex items-center justify-between p-6 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <button @click="prevSlide()"
                                        class="bg-white/20 hover:bg-white/90 backdrop-blur-md text-white hover:text-mcc-slate-900 p-3 rounded-full shadow-xl border border-white/30 transition-all hover:-translate-x-1">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                    </button>
                                    <button @click="nextSlide()"
                                        class="bg-white/20 hover:bg-white/90 backdrop-blur-md text-white hover:text-mcc-slate-900 p-3 rounded-full shadow-xl border border-white/30 transition-all hover:translate-x-1">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </button>
                                </div>
                            </template>

                            <!-- Glassmorphic Slide Counter -->
                            <div
                                class="absolute bottom-6 left-1/2 -translate-x-1/2 flex items-center gap-2 p-2.5 bg-black/30 backdrop-blur-md rounded-full border border-white/20 shadow-xl">
                                <template x-for="(img, index) in activeProject.images" :key="index">
                                    <button @click="currentSlide = index"
                                        class="h-1.5 rounded-full transition-all duration-300"
                                        :class="currentSlide === index ? 'bg-white w-6 shadow-[0_0_8px_rgba(255,255,255,0.9)]' : 'bg-white/40 w-1.5 hover:bg-white/80'"></button>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Right: Content Section (Scrollable) -->
                <div class="w-full md:w-2/5 flex flex-col bg-white overflow-y-auto custom-scrollbar relative rounded-3xl">
                    <div class="p-6 md:p-8 pt-10 md:pt-8 flex-1 flex flex-col">

                        <!-- Badges Row -->
                        <div class="flex items-center gap-2 flex-wrap mb-5 pr-8">
                            <template x-if="activeProject?.sector">
                                <span
                                    class="inline-flex items-center px-3 py-1.5 rounded-lg text-[9px] font-bold bg-mcc-slate-100 text-mcc-slate-700 uppercase tracking-widest border border-mcc-slate-200/60 shadow-sm"
                                    x-text="activeProject.sector"></span>
                            </template>

                            <!-- Dynamic Status Badge -->
                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-[9px] font-bold uppercase tracking-widest text-white shadow-md border border-white/10"
                                :class="{
                                    'bg-green-500 shadow-green-500/20': activeProject?.status === 'completed',
                                    'bg-blue-500 shadow-blue-500/20': activeProject?.status === 'ongoing',
                                    'bg-indigo-500 shadow-indigo-500/20': activeProject?.status === 'operational',
                                    'bg-amber-500 shadow-amber-500/20': activeProject?.status === 'suspended',
                                    'bg-mcc-slate-600': !['completed', 'ongoing', 'operational', 'suspended'].includes(activeProject?.status)
                                }">
                                <div class="w-1.5 h-1.5 rounded-full animate-pulse" :class="{
                                    'bg-green-100': activeProject?.status === 'completed',
                                    'bg-blue-100': activeProject?.status === 'ongoing',
                                    'bg-indigo-100': activeProject?.status === 'operational',
                                    'bg-amber-100': activeProject?.status === 'suspended',
                                    'bg-white': !['completed', 'ongoing', 'operational', 'suspended'].includes(activeProject?.status)
                                }"></div>
                                <span x-text="activeProject?.status"></span>
                            </span>
                        </div>

                        <!-- Title -->
                        <h2 class="text-3xl md:text-4xl font-black text-mcc-slate-900 leading-[1.15] mb-8 tracking-tight"
                            x-text="activeProject?.title"></h2>

                        <!-- Premium Metadata Grid -->
                        <div class="flex flex-col gap-3 mb-10">
                            <!-- Location -->
                            <template x-if="activeProject?.location">
                                <div
                                    class="flex items-center p-4 bg-mcc-slate-50 rounded-2xl border border-mcc-slate-100 transition-colors hover:bg-mcc-slate-100/80">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-white shadow-sm border border-mcc-slate-100 flex items-center justify-center shrink-0 mr-4 text-mcc-blue-500">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <span
                                            class="block text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest mb-0.5">{{ __('Location') }}</span>
                                        <span class="block text-sm font-bold text-mcc-slate-800"
                                            x-text="activeProject.location"></span>
                                    </div>
                                </div>
                            </template>

                            <!-- State -->
                            <template x-if="activeProject?.state">
                                <div
                                    class="flex items-center p-4 bg-mcc-slate-50 rounded-2xl border border-mcc-slate-100 transition-colors hover:bg-mcc-slate-100/80">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-white shadow-sm border border-mcc-slate-100 flex items-center justify-center shrink-0 mr-4 text-mcc-blue-500">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <span
                                            class="block text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest mb-0.5">{{ __('State') }}</span>
                                        <span class="block text-sm font-bold text-mcc-slate-800"
                                            x-text="activeProject.state"></span>
                                    </div>
                                </div>
                            </template>

                            <!-- Award Date -->
                            <template x-if="activeProject?.award_date">
                                <div
                                    class="flex items-center p-4 bg-mcc-slate-50 rounded-2xl border border-mcc-slate-100 transition-colors hover:bg-mcc-slate-100/80">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-white shadow-sm border border-mcc-slate-100 flex items-center justify-center shrink-0 mr-4 text-mcc-blue-500">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <span
                                            class="block text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest mb-0.5">{{ __('Award Date') }}</span>
                                        <span class="block text-sm font-bold text-mcc-slate-800"
                                            x-text="activeProject.award_date"></span>
                                    </div>
                                </div>
                            </template>
                        </div>

                        <!-- Description -->
                        <div class="flex-1 relative">
                            <h4
                                class="text-[11px] font-bold text-mcc-gold uppercase tracking-[0.2em] mb-5 flex items-center">
                                <span class="w-8 h-px bg-mcc-gold/60 mr-3"></span>
                                {{ __('Project Details') }}
                            </h4>
                            <!-- Use x-html and process newlines to <br> for proper formatting, adding max-width constraint -->
                            <div class="text-mcc-slate-600 leading-relaxed text-[15px] whitespace-pre-line prose prose-slate"
                                x-html="activeProject?.description ? activeProject.description.replace(/\n/g, '<br>') : ''">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 5px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(241, 245, 249, 0.5);
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #2563eb;
            border-radius: 10px;
            transition: all 0.3s;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #1d4ed8;
        }

        /* For Firefox */
        .custom-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #2563eb rgba(241, 245, 249, 0.5);
        }
    </style>
@endsection