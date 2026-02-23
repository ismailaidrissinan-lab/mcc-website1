@extends('layouts.admin')

@section('title', isset($project) ? __('Edit CSR Project') : __('New CSR Project'))

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.csr.index') }}" class="inline-flex items-center text-xs font-bold text-mcc-slate-400 hover:text-mcc-blue-600 uppercase tracking-widest transition-colors">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            {{ __('Back to Projects') }}
        </a>
    </div>

    <div class="bg-white rounded-[2rem] border border-mcc-slate-100 shadow-xl overflow-hidden">
        <div class="px-10 py-8 border-b border-mcc-slate-50">
            <h2 class="text-xl font-bold text-mcc-slate-900">{{ isset($project) ? __('Update CSR Project') : __('Establish New CSR Initiative') }}</h2>
        </div>

        <form action="{{ isset($project) ? route('admin.csr.update', $project->id) : route('admin.csr.store') }}" 
              method="POST" 
              enctype="multipart/form-data" 
              class="p-10 space-y-8">
            @csrf
            @if(isset($project))
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Project Title') }}</label>
                    <input type="text" name="title" value="{{ old('title', $project->title ?? '') }}" class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-medium text-mcc-slate-900" placeholder="High-Impact Title">
                    @error('title') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Location / Region') }}</label>
                    <input type="text" name="location" value="{{ old('location', $project->location ?? '') }}" class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-medium text-mcc-slate-900" placeholder="e.g. West Africa Hub">
                    @error('location') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Brief Summary') }}</label>
                <textarea name="summary" rows="2" class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-medium text-mcc-slate-900" placeholder="Executive summary of the impact...">{{ old('summary', $project->summary ?? '') }}</textarea>
                @error('summary') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Detailed Narrative') }}</label>
                <textarea name="content" rows="6" class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-medium text-mcc-slate-900" placeholder="Full details of the project development and outcomes...">{{ old('content', $project->content ?? '') }}</textarea>
                @error('content') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Impact Image') }}</label>
                    <input type="file" name="image" class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all text-sm text-mcc-slate-500">
                    @if(isset($project) && $project->image_path)
                        <p class="text-xs text-mcc-slate-400 mt-2 italic">{{ __('Current image exists') }}</p>
                    @endif
                    @error('image') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Publication Date') }}</label>
                    <input type="date" name="published_at" value="{{ old('published_at', isset($project) ? $project->published_at->format('Y-m-d') : date('Y-m-d')) }}" class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-medium text-mcc-slate-900">
                    @error('published_at') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="pt-6 border-t border-mcc-slate-50">
                <button type="submit" class="w-full md:w-auto px-12 py-4 bg-mcc-blue-900 text-white font-bold rounded-2xl hover:bg-mcc-blue-600 transition-all shadow-xl">
                    {{ isset($project) ? __('Update Initiative') : __('Launch Initiative') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
