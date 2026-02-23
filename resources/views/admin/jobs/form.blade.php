@extends('layouts.admin')

@section('title', isset($job) ? __('Edit Posting') : __('New Posting'))

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.jobs.index') }}" class="inline-flex items-center text-xs font-bold text-mcc-slate-400 hover:text-mcc-blue-600 uppercase tracking-widest transition-colors">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            {{ __('Back to Board') }}
        </a>
    </div>

    <div class="bg-white rounded-[2rem] border border-mcc-slate-100 shadow-xl overflow-hidden">
        <div class="px-10 py-8 border-b border-mcc-slate-50">
            <h2 class="text-xl font-bold text-mcc-slate-900">{{ isset($job) ? __('Update Career Opportunity') : __('Announce Global Opportunity') }}</h2>
        </div>

        <form action="{{ isset($job) ? route('admin.jobs.update', $job->id) : route('admin.jobs.store') }}" 
              method="POST" 
              class="p-10 space-y-8">
            @csrf
            @if(isset($job))
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Position Title') }}</label>
                    <input type="text" name="title" value="{{ old('title', $job->title ?? '') }}" class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-medium text-mcc-slate-900" placeholder="Senior Specialist">
                    @error('title') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Department') }}</label>
                    <input type="text" name="department" value="{{ old('department', $job->department ?? '') }}" class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-medium text-mcc-slate-900" placeholder="e.g. Strategic Planning">
                    @error('department') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Location') }}</label>
                    <input type="text" name="location" value="{{ old('location', $job->location ?? '') }}" class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-medium text-mcc-slate-900" placeholder="Office / Region">
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Employment Type') }}</label>
                    <input type="text" name="type" value="{{ old('type', $job->type ?? 'Full-time') }}" class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-medium text-mcc-slate-900">
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Publication Date') }}</label>
                    <input type="date" name="published_at" value="{{ old('published_at', isset($job) ? $job->published_at->format('Y-m-d') : date('Y-m-d')) }}" class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-medium text-mcc-slate-900">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Job Description') }}</label>
                <textarea name="description" rows="5" class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-medium text-mcc-slate-900">{{ old('description', $job->description ?? '') }}</textarea>
                @error('description') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Requirement Highlights') }}</label>
                <textarea name="requirements" rows="4" class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-medium text-mcc-slate-900" placeholder="Bullet points or summary of key requirements...">{{ old('requirements', $job->requirements ?? '') }}</textarea>
                @error('requirements') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center space-x-3">
                <input type="checkbox" name="is_active" id="is_active" {{ old('is_active', $job->is_active ?? true) ? 'checked' : '' }} class="w-5 h-5 rounded text-mcc-blue-600 focus:ring-mcc-blue-600 bg-mcc-slate-50 border-none transition-all">
                <label for="is_active" class="text-sm font-bold text-mcc-slate-900">{{ __('Mark as Active Hiring') }}</label>
            </div>

            <div class="pt-6 border-t border-mcc-slate-50">
                <button type="submit" class="w-full md:w-auto px-12 py-4 bg-mcc-blue-900 text-white font-bold rounded-2xl hover:bg-mcc-blue-600 transition-all shadow-xl">
                    {{ isset($job) ? __('Update Posting') : __('Publish Posting') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
