@extends('layouts.admin')

@section('title', isset($award) ? 'Edit Award' : 'Create Award')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-mcc-slate-200 overflow-hidden">
        <div class="p-8 border-b border-mcc-slate-100 flex items-center justify-between">
            <div>
                <h3 class="text-xl font-bold text-mcc-slate-900">{{ isset($award) ? 'Edit Award' : 'Create New Award' }}</h3>
                <p class="text-sm text-mcc-slate-500 mt-1">Enter the details of the achievement or recognition.</p>
            </div>
            <a href="{{ route('admin.awards.index') }}" class="text-sm font-bold text-mcc-slate-400 hover:text-mcc-slate-600 transition-colors">Cancel</a>
        </div>
        
        <form action="{{ isset($award) ? route('admin.awards.update', $award) : route('admin.awards.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
            @csrf
            @if(isset($award)) @method('PUT') @endif
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-sm font-bold text-mcc-slate-700 uppercase tracking-widest">Award Title</label>
                    <input type="text" name="title" value="{{ old('title', $award->title ?? '') }}" required
                        class="w-full px-4 py-3 rounded-xl border border-mcc-slate-200 focus:ring-2 focus:ring-mcc-blue-500 focus:border-mcc-blue-500 transition-all outline-none">
                </div>
                
                <div class="space-y-2">
                    <label class="text-sm font-bold text-mcc-slate-700 uppercase tracking-widest">Year</label>
                    <input type="number" name="year" value="{{ old('year', $award->year ?? date('Y')) }}"
                        class="w-full px-4 py-3 rounded-xl border border-mcc-slate-200 focus:ring-2 focus:ring-mcc-blue-500 focus:border-mcc-blue-500 transition-all outline-none">
                </div>
            </div>
            
            <div class="space-y-2">
                <label class="text-sm font-bold text-mcc-slate-700 uppercase tracking-widest">Recognition Type</label>
                <select name="type" required
                    class="w-full px-4 py-3 rounded-xl border border-mcc-slate-200 focus:ring-2 focus:ring-mcc-blue-500 focus:border-mcc-blue-500 transition-all outline-none bg-white">
                    <option value="award" {{ (old('type', $award->type ?? '') == 'award') ? 'selected' : '' }}>Institutional Award</option>
                    <option value="csr" {{ (old('type', $award->type ?? '') == 'csr') ? 'selected' : '' }}>CSR Recognition</option>
                    <option value="donation" {{ (old('type', $award->type ?? '') == 'donation') ? 'selected' : '' }}>Donation/Philanthropy</option>
                </select>
            </div>
            
            <div class="space-y-2">
                <label class="text-sm font-bold text-mcc-slate-700 uppercase tracking-widest">Short Description</label>
                <textarea name="description" rows="4"
                    class="w-full px-4 py-3 rounded-xl border border-mcc-slate-200 focus:ring-2 focus:ring-mcc-blue-500 focus:border-mcc-blue-500 transition-all outline-none">{{ old('description', $award->description ?? '') }}</textarea>
            </div>
            
            <div class="space-y-2">
                <label class="text-sm font-bold text-mcc-slate-700 uppercase tracking-widest">Representative Image (Optional)</label>
                <div class="mt-2 flex items-center space-x-6">
                    @if(isset($award) && $award->image_path)
                    <img src="{{ asset('storage/'.$award->image_path) }}" class="h-20 w-20 object-cover rounded-xl border border-mcc-slate-200 shadow-sm">
                    @endif
                    <input type="file" name="image" class="text-sm text-mcc-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-mcc-blue-50 file:text-mcc-blue-700 hover:file:bg-mcc-blue-100 transition-all">
                </div>
            </div>
            
            <div class="pt-6 border-t border-mcc-slate-100 flex justify-end">
                <button type="submit" class="btn-corporate bg-mcc-blue-900 text-white hover:bg-mcc-blue-950 px-10">
                    {{ isset($award) ? 'Save Changes' : 'Create Award' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
