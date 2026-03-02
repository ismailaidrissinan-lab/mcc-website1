@extends('layouts.admin')

@section('title', isset($project) ? __('Edit Project') : __('Create Project'))

@section('content')
    <div class="max-w-5xl mx-auto">
        <div class="mb-10 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-black text-mcc-slate-900 tracking-tight uppercase">
                    {{ isset($project) ? __('Edit Project') : __('New Project') }}
                </h2>
                <p class="text-mcc-slate-500 text-sm font-medium mt-1">
                    {{ isset($project) ? __('Updating: ' . $project->title) : __('Define a new infrastructure or investment initiative') }}
                </p>
            </div>
            <a href="{{ route('admin.projects.index') }}"
                class="px-8 py-3.5 bg-mcc-slate-100 text-mcc-slate-600 text-[10px] font-black uppercase tracking-[0.2em] rounded-2xl hover:bg-mcc-slate-200 transition-all flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                {{ __('Back to List') }}
            </a>
        </div>

        @if ($errors->any())
            <div class="mb-8 p-6 bg-red-50 border border-red-100 rounded-2xl">
                <ul class="space-y-1 text-sm text-red-600 font-medium">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($project) ? route('admin.projects.update', $project) : route('admin.projects.store') }}"
            method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @if(isset($project)) @method('PUT') @endif

            {{-- ═══════════════════════════════════════════════════════ --}}
            {{-- SECTION 1: Core Details --}}
            {{-- ═══════════════════════════════════════════════════════ --}}
            <div class="bg-white rounded-[2.5rem] shadow-xl border border-mcc-slate-100 overflow-hidden p-10 md:p-12">
                <h3 class="text-xs font-black text-mcc-blue-600 uppercase tracking-[0.25em] mb-8 flex items-center">
                    <svg class="w-4 h-4 mr-2 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    {{ __('Project Details') }}
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    {{-- Title --}}
                    <div class="space-y-2 md:col-span-2">
                        <label
                            class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest ml-1">{{ __('Project Title') }}
                            *</label>
                        <input type="text" name="title" value="{{ old('title', $project->title ?? '') }}" required
                            class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-bold text-mcc-slate-900"
                            placeholder="e.g. 240MW Solar Farm Construction">
                    </div>

                    {{-- Sector --}}
                    <div class="space-y-2">
                        <label
                            class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest ml-1">{{ __('Sector') }}
                            *</label>
                        <select name="sector_id" required
                            class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-bold text-mcc-slate-900">
                            <option value="">{{ __('Select Sector') }}</option>
                            @foreach($sectors as $sector)
                                <option value="{{ $sector->id }}" {{ old('sector_id', $project->sector_id ?? '') == $sector->id ? 'selected' : '' }}>{{ $sector->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- State --}}
                    <div class="space-y-2">
                        <label
                            class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest ml-1">{{ __('State') }}</label>
                        <select name="state_id"
                            class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-bold text-mcc-slate-900">
                            <option value="">{{ __('Select State') }}</option>
                            @foreach($states as $state)
                                <option value="{{ $state->id }}" {{ old('state_id', $project->state_id ?? '') == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Location --}}
                    <div class="space-y-2">
                        <label
                            class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest ml-1">{{ __('Location') }}</label>
                        <input type="text" name="location" value="{{ old('location', $project->location ?? '') }}"
                            class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-bold text-mcc-slate-900"
                            placeholder="e.g. Lagos, Nigeria">
                    </div>

                    {{-- Status --}}
                    <div class="space-y-2">
                        <label
                            class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest ml-1">{{ __('Status') }}
                            *</label>
                        <select name="status" required
                            class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-bold text-mcc-slate-900">
                            <option value="ongoing" {{ old('status', $project->status ?? 'ongoing') == 'ongoing' ? 'selected' : '' }}>{{ __('Ongoing') }}</option>
                            <option value="completed" {{ old('status', $project->status ?? '') == 'completed' ? 'selected' : '' }}>{{ __('Completed') }}</option>
                            <option value="operational" {{ old('status', $project->status ?? '') == 'operational' ? 'selected' : '' }}>{{ __('Operational') }}</option>
                            <option value="suspended" {{ old('status', $project->status ?? '') == 'suspended' ? 'selected' : '' }}>{{ __('Suspended') }}</option>
                        </select>
                    </div>

                    {{-- Award Date --}}
                    <div class="space-y-2">
                        <label
                            class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest ml-1">{{ __('Award Date') }}</label>
                        <input type="date" name="award_date"
                            value="{{ old('award_date', isset($project->award_date) ? $project->award_date->format('Y-m-d') : '') }}"
                            class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-bold text-mcc-slate-900">
                    </div>

                    {{-- Completion Date --}}
                    <div class="space-y-2">
                        <label
                            class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest ml-1">{{ __('Completion Date') }}</label>
                        <input type="date" name="completion_date"
                            value="{{ old('completion_date', isset($project->completion_date) ? $project->completion_date->format('Y-m-d') : '') }}"
                            class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-bold text-mcc-slate-900">
                    </div>

                    {{-- Description --}}
                    <div class="md:col-span-2 space-y-2">
                        <label
                            class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest ml-1">{{ __('Short Description') }}
                            *</label>
                        <textarea name="description" rows="3" required
                            class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-medium text-mcc-slate-900"
                            placeholder="A concise overview of the project shown on the project listing page.">{{ old('description', $project->description ?? '') }}</textarea>
                    </div>

                    {{-- Full Content --}}
                    <div class="md:col-span-2 space-y-2">
                        <label
                            class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest ml-1">{{ __('Detailed Narrative') }}</label>
                        <textarea name="content" rows="10"
                            class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-medium text-mcc-slate-900"
                            placeholder="Full project details, approach, and impact...">{{ old('content', $project->content ?? '') }}</textarea>
                    </div>

                </div>
            </div>

            {{-- ═══════════════════════════════════════════════════════ --}}
            {{-- SECTION 2: Cover Image --}}
            {{-- ═══════════════════════════════════════════════════════ --}}
            <div class="bg-white rounded-[2.5rem] shadow-xl border border-mcc-slate-100 overflow-hidden p-10 md:p-12">
                <h3 class="text-xs font-black text-mcc-blue-600 uppercase tracking-[0.25em] mb-8 flex items-center">
                    <svg class="w-4 h-4 mr-2 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    {{ __('Cover Image') }}
                </h3>
                <div
                    class="relative group aspect-video bg-mcc-slate-50 rounded-3xl overflow-hidden border-2 border-dashed border-mcc-slate-200 hover:border-mcc-blue-400 transition-colors">
                    @if(isset($project) && $project->image_url)
                        <img src="{{ $project->image_url }}" class="w-full h-full object-cover">
                        <div
                            class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <span
                                class="text-white text-xs font-bold uppercase tracking-widest">{{ __('Click to Replace') }}</span>
                        </div>
                    @else
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-mcc-slate-300 space-y-2">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span
                                class="text-xs font-bold uppercase tracking-widest">{{ __('Click to upload cover image') }}</span>
                        </div>
                    @endif
                    <input type="file" name="image_path" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer">
                </div>
            </div>

            {{-- ═══════════════════════════════════════════════════════ --}}
            {{-- SECTION 3: Gallery Images (Multiple) --}}
            {{-- ═══════════════════════════════════════════════════════ --}}
            <div class="bg-white rounded-[2.5rem] shadow-xl border border-mcc-slate-100 overflow-hidden p-10 md:p-12">
                <h3 class="text-xs font-black text-mcc-blue-600 uppercase tracking-[0.25em] mb-8 flex items-center">
                    <svg class="w-4 h-4 mr-2 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                    {{ __('Project Gallery') }}
                </h3>

                {{-- Existing Images (Edit Mode only) --}}
                @if(isset($project) && $project->images->count())
                    <div class="mb-8">
                        <p class="text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest ml-1 mb-4">
                            {{ __('Current Gallery') }} ({{ $project->images->count() }} {{ __('images') }})</p>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach($project->images as $image)
                                <div class="relative group rounded-2xl overflow-hidden aspect-video bg-mcc-slate-100">
                                    <img src="{{ $image->image_url }}" class="w-full h-full object-cover">
                                    <div
                                        class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button type="button"
                                            onclick="if(confirm('Remove this image?')) { document.getElementById('delete-image-{{ $image->id }}').submit(); }"
                                            class="px-4 py-2 bg-red-500 text-white text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-red-600 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                @endif

                {{-- Upload New Gallery Images --}}
                <div x-data="{ fileNames: [] }" class="space-y-4">
                    <p class="text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest ml-1">
                        {{ __('Add New Images') }}</p>
                    <div
                        class="relative group bg-mcc-slate-50 rounded-3xl border-2 border-dashed border-mcc-slate-200 hover:border-mcc-blue-400 transition-colors p-10 text-center">
                        <div class="flex flex-col items-center justify-center text-mcc-slate-300 space-y-3">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                </path>
                            </svg>
                            <span
                                class="text-xs font-bold uppercase tracking-widest">{{ __('Drag & drop or click to select multiple images') }}</span>
                            <span
                                class="text-[10px] text-mcc-slate-300">{{ __('Supports JPG, PNG, WebP — Max 4MB per file') }}</span>
                        </div>
                        <input type="file" name="gallery_images[]" accept="image/*" multiple
                            @change="fileNames = Array.from($event.target.files).map(f => f.name)"
                            class="absolute inset-0 opacity-0 cursor-pointer">
                    </div>
                    {{-- Selected file preview --}}
                    <template x-if="fileNames.length > 0">
                        <div class="bg-green-50 border border-green-200 rounded-2xl p-4">
                            <p class="text-[10px] font-black text-green-600 uppercase tracking-widest mb-2">
                                <span x-text="fileNames.length"></span> {{ __('files selected') }}
                            </p>
                            <ul class="space-y-1">
                                <template x-for="name in fileNames" :key="name">
                                    <li class="text-xs text-green-700 font-medium flex items-center">
                                        <svg class="w-3 h-3 mr-1.5 text-green-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span x-text="name"></span>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </template>
                </div>
            </div>

            {{-- ═══════════════════════════════════════════════════════ --}}
            {{-- Submit --}}
            {{-- ═══════════════════════════════════════════════════════ --}}
            <div class="flex justify-end">
                <button type="submit"
                    class="px-12 py-5 bg-mcc-blue-900 text-white font-black uppercase tracking-[0.2em] rounded-2xl shadow-xl hover:bg-black transition-all">
                    {{ isset($project) ? __('Update Project') : __('Save Project') }}
                </button>
            </div>
        </form>

        {{-- Hidden delete forms (Outside main form to avoid nesting) --}}
        @if(isset($project) && $project->images->count())
            @foreach($project->images as $image)
                <form id="delete-image-{{ $image->id }}" action="{{ route('admin.projects.images.destroy', $image) }}"
                    method="POST" class="hidden">
                    @csrf @method('DELETE')
                </form>
            @endforeach
        @endif
    </div>
@endsection