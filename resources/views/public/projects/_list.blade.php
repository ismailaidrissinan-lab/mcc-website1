@if($projects->count() > 0)
    @foreach($projects as $project)
        @php
            $modalData = [
                'title' => $project->title,
                'description' => $project->description,
                'sector' => $project->sector ? $project->sector->name : null,
                'state' => $project->state ? $project->state->name : null,
                'status' => $project->status,
                'award_date' => $project->award_date ? $project->award_date->format("M Y") : "N/A",
                'location' => $project->location,
                'images' => $project->images->count() > 0 ? $project->images->map(fn($img) => $img->image_url)->toArray() : [$project->image_url],
            ];

            $statusConfig = match ($project->status) {
                'completed' => ['bg' => 'bg-green-500', 'text' => 'text-green-700', 'lightBg' => 'bg-green-50', 'border' => 'border-green-200'],
                'ongoing' => ['bg' => 'bg-blue-500', 'text' => 'text-blue-700', 'lightBg' => 'bg-blue-50', 'border' => 'border-blue-200'],
                'operational' => ['bg' => 'bg-indigo-500', 'text' => 'text-indigo-700', 'lightBg' => 'bg-indigo-50', 'border' => 'border-indigo-200'],
                'suspended' => ['bg' => 'bg-amber-500', 'text' => 'text-amber-700', 'lightBg' => 'bg-amber-50', 'border' => 'border-amber-200'],
                default => ['bg' => 'bg-mcc-slate-500', 'text' => 'text-mcc-slate-700', 'lightBg' => 'bg-mcc-slate-50', 'border' => 'border-mcc-slate-200'],
            };
        @endphp

        <div @click="openProject({{ json_encode($modalData, JSON_HEX_APOS | JSON_HEX_QUOT) }})"
            class="group flex bg-white rounded-2xl overflow-hidden shadow-sm border border-mcc-slate-100 hover:shadow-md hover:-translate-y-1 hover:border-mcc-blue-200 transition-all duration-300 cursor-pointer w-full relative h-[120px]">

            {{-- Left: Image Header --}}
            <div class="relative w-[120px] shrink-0 bg-mcc-slate-50 overflow-hidden isolate">
                <img src="{{ $project->image_url }}" alt="{{ $project->title }}"
                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                {{-- Status pulse indicator over image --}}
                <div
                    class="absolute top-2 left-2 z-10 w-2 h-2 rounded-full {{ $statusConfig['bg'] }} shadow-[0_0_8px_rgba(0,0,0,0.5)] border border-white/50 animate-pulse">
                </div>

                {{-- Inner gradient to ensure border legibility --}}
                <div
                    class="absolute inset-0 bg-gradient-to-r from-transparent via-transparent to-black/10 z-0 pointer-events-none">
                </div>
            </div>

            {{-- Right: Card Body --}}
            <div class="p-4 flex-1 flex flex-col min-w-0 relative">

                {{-- Top Meta Info --}}
                <div class="flex items-center justify-between gap-2 mb-2">
                    @if($project->sector)
                        <span
                            class="px-2 py-0.5 rounded bg-mcc-slate-100 text-mcc-slate-600 text-[9px] font-bold uppercase tracking-widest truncate max-w-[120px]">
                            {{ $project->sector->name }}
                        </span>
                    @endif

                    <span class="text-[9px] font-black uppercase tracking-wider shrink-0 {{ $statusConfig['text'] }}">
                        {{ ucfirst($project->status) }}
                    </span>
                </div>

                {{-- Title --}}
                <h3
                    class="text-sm font-bold text-mcc-slate-900 leading-tight group-hover:text-mcc-blue-600 transition-colors line-clamp-2 mb-1.5 flex-1 pr-2">
                    {{ $project->title }}
                </h3>

                {{-- Location Bottom --}}
                @if($project->location)
                    <div
                        class="mt-auto flex items-center text-[10px] font-semibold text-mcc-slate-500 group-hover:text-mcc-slate-700 transition-colors">
                        <svg class="w-3.5 h-3.5 mr-1 text-mcc-slate-300 group-hover:text-mcc-blue-400 transition-colors shrink-0"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="truncate">{{ $project->location }}</span>
                    </div>
                @endif
            </div>

            {{-- Decorative hover accent --}}
            <div
                class="absolute inset-y-0 right-0 w-1 bg-mcc-blue-500 transform scale-y-0 group-hover:scale-y-100 transition-transform origin-bottom duration-300 rounded-r-2xl">
            </div>
        </div>
    @endforeach
@else
    <div
        class="flex flex-col items-center justify-center py-16 text-center px-4 bg-white rounded-3xl border border-dashed border-mcc-slate-200">
        <div class="w-12 h-12 bg-mcc-slate-50 rounded-full flex items-center justify-center mb-3">
            <svg class="w-6 h-6 text-mcc-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                </path>
            </svg>
        </div>
        <h3 class="text-sm font-bold text-mcc-slate-900 mb-1">{{ __('No Projects Found') }}</h3>
        <p class="text-[10px] text-mcc-slate-500 mb-4 max-w-xs">
            {{ __('We could not find any active or completed projects matching your current filters.') }}
        </p>

        <button
            @click="selectedState = ''; selectedSector = ''; selectedStatus = ''; fetchProjects(); $dispatch('reset-map')"
            class="inline-flex items-center gap-2 bg-mcc-slate-900 hover:bg-mcc-blue-600 text-white px-4 py-2 rounded-full text-[10px] font-bold uppercase tracking-widest transition-all shadow-md hover:shadow-xl hover:-translate-y-0.5">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                </path>
            </svg>
            {{ __('Clear Filters') }}
        </button>
    </div>
@endif