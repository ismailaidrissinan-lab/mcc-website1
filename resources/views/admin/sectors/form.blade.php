@extends('layouts.admin')

@section('title', isset($sector) ? __('Edit Sector') : __('Create Sector'))

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-10 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-black text-mcc-slate-900 tracking-tight uppercase">{{ isset($sector) ? __('Edit Sector') : __('New Sector') }}</h2>
            <p class="text-mcc-slate-500 text-sm font-medium mt-1">{{ isset($sector) ? __('Updating: ' . $sector->name) : __('Define a new business group or industry focus') }}</p>
        </div>
        <a href="{{ route('admin.sectors.index') }}" class="px-8 py-3.5 bg-mcc-slate-100 text-mcc-slate-600 text-[10px] font-black uppercase tracking-[0.2em] rounded-2xl hover:bg-mcc-slate-200 transition-all flex items-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            {{ __('Back to List') }}
        </a>
    </div>

    <form action="{{ isset($sector) ? route('admin.sectors.update', $sector) : route('admin.sectors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($sector)) @method('PUT') @endif

        <div class="bg-white rounded-[2.5rem] shadow-xl border border-mcc-slate-100 overflow-hidden p-10 md:p-12 space-y-8">
            <div class="space-y-2">
                <label class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest ml-1">{{ __('Sector Name') }}</label>
                <input type="text" name="name" value="{{ old('name', $sector->name ?? '') }}" required
                       class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-bold text-mcc-slate-900" 
                       placeholder="e.g. Energy & Power">
                @error('name') <p class="text-red-500 text-[10px] font-bold mt-1 uppercase tracking-widest">{{ $message }}</p> @enderror
            </div>

            <div class="space-y-2">
                <label class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest ml-1">{{ __('Description') }}</label>
                <textarea name="description" rows="5" required
                          class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-medium text-mcc-slate-900" 
                          placeholder="Provide a detailed overview of this business sector...">{{ old('description', $sector->description ?? '') }}</textarea>
            </div>

            <div class="space-y-4">
                <label class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest ml-1">{{ __('Sector Cover Image') }}</label>
                <div class="relative group aspect-video bg-mcc-slate-50 rounded-3xl overflow-hidden border-2 border-dashed border-mcc-slate-200 hover:border-mcc-blue-400 transition-colors">
                    @if(isset($sector) && $sector->image_path)
                        <img src="{{ asset('storage/' . $sector->image_path) }}" class="w-full h-full object-cover">
                    @else
                        <div class="absolute inset-0 flex items-center justify-center text-mcc-slate-300">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                    <input type="file" name="image_path" class="absolute inset-0 opacity-0 cursor-pointer">
                </div>
            </div>

            <div class="mt-12 pt-10 border-t border-mcc-slate-50 flex justify-end">
                <button type="submit" class="px-12 py-5 bg-mcc-blue-900 text-white font-black uppercase tracking-[0.2em] rounded-2xl shadow-xl hover:bg-black transition-all">
                    {{ isset($sector) ? __('Update Sector') : __('Save Sector') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
