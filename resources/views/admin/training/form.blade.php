@extends('layouts.admin')

@section('title', isset($training) ? 'Edit Program' : 'Create Program')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-mcc-slate-200 overflow-hidden">
        <div class="p-8 border-b border-mcc-slate-100 flex items-center justify-between">
            <div>
                <h3 class="text-xl font-bold text-mcc-slate-900">{{ isset($training) ? 'Edit Program' : 'Create New Training Program' }}</h3>
                <p class="text-sm text-mcc-slate-500 mt-1">Define the curriculum and location for this developmental initiative.</p>
            </div>
            <a href="{{ route('admin.training.index') }}" class="text-sm font-bold text-mcc-slate-400 hover:text-mcc-slate-600 transition-colors">Cancel</a>
        </div>
        
        <form action="{{ isset($training) ? route('admin.training.update', $training) : route('admin.training.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
            @csrf
            @if(isset($training)) @method('PUT') @endif
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-sm font-bold text-mcc-slate-700 uppercase tracking-widest">Program Title</label>
                    <input type="text" name="title" value="{{ old('title', $training->title ?? '') }}" required
                        class="w-full px-4 py-3 rounded-xl border border-mcc-slate-200 focus:ring-2 focus:ring-mcc-blue-500 focus:border-mcc-blue-500 transition-all outline-none">
                </div>
                
                <div class="space-y-2">
                    <label class="text-sm font-bold text-mcc-slate-700 uppercase tracking-widest">Location</label>
                    <input type="text" name="location" value="{{ old('location', $training->location ?? '') }}"
                        placeholder="e.g. Lagos, Abuja, Beijing"
                        class="w-full px-4 py-3 rounded-xl border border-mcc-slate-200 focus:ring-2 focus:ring-mcc-blue-500 focus:border-mcc-blue-500 transition-all outline-none">
                </div>
            </div>
            
            <div class="space-y-2">
                <label class="text-sm font-bold text-mcc-slate-700 uppercase tracking-widest">Description</label>
                <textarea name="description" rows="6"
                    class="w-full px-4 py-3 rounded-xl border border-mcc-slate-200 focus:ring-2 focus:ring-mcc-blue-500 focus:border-mcc-blue-500 transition-all outline-none">{{ old('description', $training->description ?? '') }}</textarea>
            </div>
            
            <div class="space-y-2">
                <label class="text-sm font-bold text-mcc-slate-700 uppercase tracking-widest">Hero Image (Optional)</label>
                <div class="mt-2 flex items-center space-x-6">
                    @if(isset($training) && $training->image_path)
                    <img src="{{ asset('storage/'.$training->image_path) }}" class="h-20 w-20 object-cover rounded-xl border border-mcc-slate-200 shadow-sm">
                    @endif
                    <input type="file" name="image" class="text-sm text-mcc-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-mcc-blue-50 file:text-mcc-blue-700 hover:file:bg-mcc-blue-100 transition-all">
                </div>
            </div>
            
            <div class="pt-6 border-t border-mcc-slate-100 flex justify-end">
                <button type="submit" class="btn-corporate bg-mcc-blue-900 text-white hover:bg-mcc-blue-950 px-10">
                    {{ isset($training) ? 'Save Changes' : 'Create Program' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
