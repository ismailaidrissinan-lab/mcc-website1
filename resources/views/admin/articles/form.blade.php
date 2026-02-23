@extends('layouts.app')

@section('title', isset($article) ? 'Edit Article' : 'Create Article')

@section('content')
<div class="bg-mcc-slate-900 pt-32 pb-12">
    <div class="container-wide">
        <div class="flex items-center gap-4 text-mcc-blue-200 mb-4">
            <a href="{{ route('admin.articles.index') }}" class="hover:text-white transition-colors">Articles</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="text-white">{{ isset($article) ? 'Edit' : 'Create' }}</span>
        </div>
        <h1 class="text-3xl font-bold text-white">{{ isset($article) ? 'Edit News Article' : 'Create News Article' }}</h1>
    </div>
</div>

<div class="py-12 bg-mcc-slate-50 min-h-screen">
    <div class="container-wide max-w-4xl">
        <div class="bg-white rounded-[2.5rem] shadow-2xl p-8 md:p-12 border border-mcc-slate-100">
            <form action="{{ isset($article) ? route('admin.articles.update', $article) : route('admin.articles.store') }}" 
                  method="POST" 
                  enctype="multipart/form-data"
                  class="space-y-8">
                @csrf
                @if(isset($article))
                    @method('PUT')
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="md:col-span-2 space-y-2">
                        <label for="title" class="text-xs font-bold text-mcc-slate-500 uppercase tracking-widest">Article Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $article->title ?? '') }}" required
                               class="w-full bg-mcc-slate-50 border-none rounded-2xl px-6 py-4 focus:ring-2 focus:ring-mcc-blue-600 transition-all font-medium text-mcc-slate-900">
                        @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="published_at" class="text-xs font-bold text-mcc-slate-500 uppercase tracking-widest">Publication Date</label>
                        <input type="date" name="published_at" id="published_at" 
                               value="{{ old('published_at', isset($article) ? $article->published_at->format('Y-m-d') : date('Y-m-d')) }}"
                               class="w-full bg-mcc-slate-50 border-none rounded-2xl px-6 py-4 focus:ring-2 focus:ring-mcc-blue-600 transition-all font-medium text-mcc-slate-900">
                        @error('published_at') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="image" class="text-xs font-bold text-mcc-slate-500 uppercase tracking-widest">Featured Image</label>
                        <div class="flex items-center gap-4">
                            @if(isset($article) && $article->image_path)
                                <div class="w-16 h-16 rounded-xl overflow-hidden shadow-md flex-shrink-0">
                                    <img src="{{ asset('storage/'.$article->image_path) }}" class="w-full h-full object-cover">
                                </div>
                            @endif
                            <input type="file" name="image" id="image" 
                                   class="w-full bg-mcc-slate-50 border-none rounded-2xl px-6 py-3 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-mcc-blue-900 file:text-white hover:file:bg-mcc-blue-700 transition-all">
                        </div>
                        @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="md:col-span-2 space-y-2">
                        <label for="summary" class="text-xs font-bold text-mcc-slate-500 uppercase tracking-widest">Executive Summary</label>
                        <textarea name="summary" id="summary" rows="3" required
                                  class="w-full bg-mcc-slate-50 border-none rounded-2xl px-6 py-4 focus:ring-2 focus:ring-mcc-blue-600 transition-all font-medium text-mcc-slate-900">{{ old('summary', $article->summary ?? '') }}</textarea>
                        @error('summary') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="md:col-span-2 space-y-2">
                        <label for="content" class="text-xs font-bold text-mcc-slate-500 uppercase tracking-widest">Full Content</label>
                        <textarea name="content" id="content" rows="12" required
                                  class="w-full bg-mcc-slate-50 border-none rounded-2xl px-6 py-4 focus:ring-2 focus:ring-mcc-blue-600 transition-all font-medium text-mcc-slate-700 leading-relaxed">{{ old('content', $article->content ?? '') }}</textarea>
                        @error('content') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="pt-8 border-t border-mcc-slate-100 flex gap-4">
                    <button type="submit" class="btn-corporate bg-mcc-blue-900 text-white hover:bg-mcc-blue-700 shadow-lg shadow-mcc-blue-900/20 px-12">
                        {{ isset($article) ? 'Update Article' : 'Publish Article' }}
                    </button>
                    <a href="{{ route('admin.articles.index') }}" class="btn-corporate bg-white text-mcc-slate-600 border border-mcc-slate-200 hover:bg-mcc-slate-50 px-12">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
