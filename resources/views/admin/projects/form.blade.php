@extends('layouts.admin')

@section('title', isset($project) ? __('Edit Project') : __('Create Project'))

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="mb-10 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-black text-mcc-slate-900 tracking-tight uppercase">{{ isset($project) ? __('Edit Project') : __('New Project') }}</h2>
            <p class="text-mcc-slate-500 text-sm font-medium mt-1">{{ isset($project) ? __('Updating: ' . $project->title) : __('Define a new infrastructure or investment initiative') }}</p>
        </div>
        <a href="{{ route('admin.projects.index') }}" class="px-8 py-3.5 bg-mcc-slate-100 text-mcc-slate-600 text-[10px] font-black uppercase tracking-[0.2em] rounded-2xl hover:bg-mcc-slate-200 transition-all flex items-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
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

    <form action="{{ isset($project) ? route('admin.projects.update', $project) : route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @if(isset($project)) @method('PUT') @endif

        <div class="bg-white rounded-[2.5rem] shadow-xl border border-mcc-slate-100 overflow-hidden p-10 md:p-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                {{-- Title --}}
                <div class="space-y-2 md:col-span-2">
                    <label class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest ml-1">{{ __('Project Title') }} *</label>
                    <input type="text" name="title" value="{{ old('title', $project->title ?? '') }}" required
                           class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-bold text-mcc-slate-900" 
                           placeholder="e.g. 240MW Solar Farm Construction">
                </div>

                {{-- Sector --}}
                <div class="space-y-2">
                    <label class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest ml-1">{{ __('Sector') }} *</label>
                    <select name="sector_id" required class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-bold text-mcc-slate-900">
                        <option value="">{{ __('Select Sector') }}</option>
                        @foreach($sectors as $sector)
                            <option value="{{ $sector->id }}" {{ old('sector_id', $project->sector_id ?? '') == $sector->id ? 'selected' : '' }}>{{ $sector->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Location --}}
                <div class="space-y-2">
                    <label class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest ml-1">{{ __('Location') }}</label>
                    <input type="text" name="location" value="{{ old('location', $project->location ?? '') }}"
                           class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-bold text-mcc-slate-900" 
                           placeholder="e.g. Lagos, Nigeria">
                </div>

                {{-- Status --}}
                <div class="space-y-2">
                    <label class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest ml-1">{{ __('Status') }} *</label>
                    <select name="status" required class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-bold text-mcc-slate-900">
                        <option value="ongoing" {{ old('status', $project->status ?? 'ongoing') == 'ongoing' ? 'selected' : '' }}>{{ __('Ongoing') }}</option>
                        <option value="completed" {{ old('status', $project->status ?? '') == 'completed' ? 'selected' : '' }}>{{ __('Completed') }}</option>
                    </select>
                </div>

                {{-- Completion Date --}}
                <div class="space-y-2">
                    <label class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest ml-1">{{ __('Completion Date') }}</label>
                    <input type="date" name="completion_date" value="{{ old('completion_date', isset($project->completion_date) ? $project->completion_date->format('Y-m-d') : '') }}"
                           class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-bold text-mcc-slate-900">
                </div>

                {{-- Description --}}
                <div class="md:col-span-2 space-y-2">
                    <label class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest ml-1">{{ __('Short Description') }} *</label>
                    <textarea name="description" rows="3" required
                              class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-medium text-mcc-slate-900"
                              placeholder="A concise overview of the project shown on the project listing page.">{{ old('description', $project->description ?? '') }}</textarea>
                </div>

                {{-- Full Content --}}
                <div class="md:col-span-2 space-y-2">
                    <label class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest ml-1">{{ __('Detailed Narrative') }}</label>
                    <textarea name="content" rows="10"
                              class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-medium text-mcc-slate-900"
                              placeholder="Full project details, approach, and impact...">{{ old('content', $project->content ?? '') }}</textarea>
                </div>

                {{-- Cover Image --}}
                <div class="md:col-span-2 space-y-4">
                    <label class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest ml-1">{{ __('Cover Image') }}</label>
                    <div class="relative group aspect-video bg-mcc-slate-50 rounded-3xl overflow-hidden border-2 border-dashed border-mcc-slate-200 hover:border-mcc-blue-400 transition-colors">
                        @if(isset($project) && $project->image_path)
                            <img src="{{ asset('storage/' . $project->image_path) }}" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <span class="text-white text-xs font-bold uppercase tracking-widest">{{ __('Click to Replace') }}</span>
                            </div>
                        @else
                            <div class="absolute inset-0 flex flex-col items-center justify-center text-mcc-slate-300 space-y-2">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span class="text-xs font-bold uppercase tracking-widest">{{ __('Click to upload image') }}</span>
                            </div>
                        @endif
                        <input type="file" name="image_path" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer">
                    </div>
                </div>

            </div>

            <div class="mt-12 pt-10 border-t border-mcc-slate-50 flex justify-end">
                <button type="submit" class="px-12 py-5 bg-mcc-blue-900 text-white font-black uppercase tracking-[0.2em] rounded-2xl shadow-xl hover:bg-black transition-all">
                    {{ isset($project) ? __('Update Project') : __('Save Project') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
