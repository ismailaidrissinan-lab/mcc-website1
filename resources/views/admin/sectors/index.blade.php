@extends('layouts.admin')

@section('title', __('Sector Management'))

@section('content')
<div x-data="{ openDeleteModal: false, deleteAction: '' }">
    <div class="mb-10 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-black text-mcc-slate-900 tracking-tight uppercase">{{ __('Sectors') }}</h2>
            <p class="text-mcc-slate-500 text-sm font-medium mt-1">{{ __('Manage business areas and industrial sectors') }}</p>
        </div>
        <a href="{{ route('admin.sectors.create') }}" class="px-8 py-3.5 bg-mcc-blue-900 text-white text-xs font-black uppercase tracking-[0.2em] rounded-2xl shadow-xl hover:bg-black transition-all flex items-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
            {{ __('New Sector') }}
        </a>
    </div>

    <div class="bg-white rounded-[2.5rem] shadow-xl border border-mcc-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-mcc-slate-50/50 border-b border-mcc-slate-50">
                        <th class="px-10 py-6 text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest">{{ __('Sector Name') }}</th>
                        <th class="px-6 py-6 text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest">{{ __('Projects Count') }}</th>
                        <th class="px-6 py-6 text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest">{{ __('Description') }}</th>
                        <th class="px-10 py-6 text-right text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-mcc-slate-50">
                    @forelse($sectors as $sector)
                    <tr class="hover:bg-mcc-blue-50/30 transition-colors group">
                        <td class="px-10 py-6">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-mcc-slate-100 rounded-xl overflow-hidden flex-shrink-0 mr-4">
                                    @if($sector->image_path)
                                        <img src="{{ asset('storage/' . $sector->image_path) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-mcc-slate-300">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <div class="text-sm font-bold text-mcc-slate-900 tracking-tight">{{ $sector->name }}</div>
                                    <div class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest mt-0.5">{{ $sector->slug }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-6">
                            <span class="text-sm font-bold text-mcc-slate-600">
                                {{ $sector->projects_count ?? ($sector->projects ? $sector->projects->count() : 0) }} {{ __('Projects') }}
                            </span>
                        </td>
                        <td class="px-6 py-6">
                            <p class="text-xs font-medium text-mcc-slate-500 line-clamp-1 max-w-xs">{{ $sector->description }}</p>
                        </td>
                        <td class="px-10 py-6 text-right space-x-2">
                            <a href="{{ route('admin.sectors.edit', $sector) }}" class="inline-flex items-center justify-center w-10 h-10 bg-mcc-slate-50 text-mcc-slate-400 hover:bg-mcc-blue-600 hover:text-white rounded-xl transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </a>
                            <button @click="openDeleteModal = true; deleteAction = '{{ route('admin.sectors.destroy', $sector) }}'" class="w-10 h-10 bg-mcc-slate-50 text-mcc-slate-400 hover:bg-red-600 hover:text-white rounded-xl transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-10 py-20 text-center">
                            <div class="flex flex-col items-center">
                                <svg class="w-16 h-16 text-mcc-slate-100 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                                <p class="text-mcc-slate-500 font-bold uppercase tracking-widest text-xs">{{ __('No sectors found') }}</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Modal -->
    <div x-show="openDeleteModal" class="fixed inset-0 z-[100] flex items-center justify-center p-6 bg-mcc-slate-900/50 backdrop-blur-sm" x-cloak>
        <div class="bg-white rounded-[2.5rem] w-full max-w-sm p-10 shadow-2xl overflow-hidden relative">
            <h3 class="text-xl font-black text-mcc-slate-900 uppercase tracking-tight mb-4">{{ __('Delete Sector?') }}</h3>
            <p class="text-mcc-slate-500 text-sm font-medium mb-8">{{ __('This action is permanent and might affect many projects. Are you absolutely sure?') }}</p>
            <div class="flex flex-col space-y-3">
                <form :action="deleteAction" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full py-4 bg-red-600 text-white text-xs font-black uppercase tracking-widest rounded-2xl hover:bg-black transition-all">
                        {{ __('Confirm Deletion') }}
                    </button>
                </form>
                <button @click="openDeleteModal = false" class="w-full py-4 bg-mcc-slate-100 text-mcc-slate-600 text-xs font-black uppercase tracking-widest rounded-2xl hover:bg-mcc-slate-200 transition-all">
                    {{ __('Cancel') }}
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
