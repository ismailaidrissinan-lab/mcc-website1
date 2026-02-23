@extends('layouts.admin')

@section('title', isset($document) ? __('Edit Document') : __('Upload Document'))

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.investors.index') }}" class="inline-flex items-center text-xs font-bold text-mcc-slate-400 hover:text-mcc-blue-600 uppercase tracking-widest transition-colors">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            {{ __('Back to Repository') }}
        </a>
    </div>

    <div class="bg-white rounded-[2rem] border border-mcc-slate-100 shadow-xl overflow-hidden">
        <div class="px-10 py-8 border-b border-mcc-slate-50">
            <h2 class="text-xl font-bold text-mcc-slate-900">{{ isset($document) ? __('Update Report') : __('Upload Financial/Governance Report') }}</h2>
        </div>

        <form action="{{ isset($document) ? route('admin.investors.update', $document->id) : route('admin.investors.store') }}" 
              method="POST" 
              enctype="multipart/form-data" 
              class="p-10 space-y-8">
            @csrf
            @if(isset($document))
                @method('PUT')
            @endif

            <div class="space-y-2">
                <label class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Document Title') }}</label>
                <input type="text" name="title" value="{{ old('title', $document->title ?? '') }}" class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-medium text-mcc-slate-900" placeholder="e.g. Q4 2025 Audit Findings">
                @error('title') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Category') }}</label>
                    <select name="category" class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-medium text-mcc-slate-900 appearance-none">
                        <option value="Financial" {{ old('category', $document->category ?? '') == 'Financial' ? 'selected' : '' }}>Financial</option>
                        <option value="Governance" {{ old('category', $document->category ?? '') == 'Governance' ? 'selected' : '' }}>Governance</option>
                        <option value="Policy" {{ old('category', $document->category ?? '') == 'Policy' ? 'selected' : '' }}>Policy</option>
                    </select>
                    @error('category') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Publication Date') }}</label>
                    <input type="date" name="published_at" value="{{ old('published_at', isset($document) ? $document->published_at->format('Y-m-d') : date('Y-m-d')) }}" class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-medium text-mcc-slate-900">
                    @error('published_at') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Select Document (PDF/DOC)') }}</label>
                <input type="file" name="document" class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all text-sm text-mcc-slate-500">
                @if(isset($document))
                    <p class="text-xs text-mcc-slate-400 mt-2 italic">{{ __('Current file: ') }}{{ $document->file_path }}</p>
                @endif
                @error('document') <p class="text-red-500 text-[10px] font-bold mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="pt-6 border-t border-mcc-slate-50">
                <button type="submit" class="w-full md:w-auto px-12 py-4 bg-mcc-blue-900 text-white font-bold rounded-2xl hover:bg-mcc-blue-600 transition-all shadow-xl">
                    {{ isset($document) ? __('Update Document') : __('Upload to Repository') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
