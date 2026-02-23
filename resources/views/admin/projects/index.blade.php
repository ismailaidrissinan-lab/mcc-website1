@extends('layouts.admin')

@section('title', __('Project Management'))

@section('content')
<div x-data="{ openDeleteModal: false, deleteAction: '' }">
    <div class="mb-10 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-black text-mcc-slate-900 tracking-tight uppercase">{{ __('Projects') }}</h2>
            <p class="text-mcc-slate-500 text-sm font-medium mt-1">{{ __('Manage infrastructure and investment projects') }}</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="px-8 py-3.5 bg-mcc-blue-900 text-white text-xs font-black uppercase tracking-[0.2em] rounded-2xl shadow-xl hover:bg-black transition-all flex items-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
            {{ __('New Project') }}
        </a>
    </div>

    <div class="bg-white rounded-[2.5rem] shadow-xl border border-mcc-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-mcc-slate-50/50 border-b border-mcc-slate-50">
                        <th class="px-10 py-6 text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest">{{ __('Project Information') }}</th>
                        <th class="px-6 py-6 text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest">{{ __('Sector') }}</th>
                        <th class="px-6 py-6 text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest">{{ __('Location') }}</th>
                        <th class="px-6 py-6 text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest">{{ __('Status') }}</th>
                        <th class="px-10 py-6 text-right text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-mcc-slate-50">
                    @forelse($projects as $project)
                    <tr class="hover:bg-mcc-blue-50/30 transition-colors group">
                        <td class="px-10 py-6">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-mcc-slate-100 rounded-xl overflow-hidden flex-shrink-0 mr-4">
                                    @if($project->mainImage)
                                        <img src="{{ asset('storage/' . $project->mainImage->image_path) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-mcc-slate-300">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <div class="text-sm font-bold text-mcc-slate-900 tracking-tight">{{ $project->title }}</div>
                                    <div class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest mt-0.5">ID: #{{ $project->id }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-6">
                            <span class="px-3 py-1 bg-mcc-blue-50 text-mcc-blue-700 text-[10px] font-black uppercase tracking-widest rounded-lg">
                                {{ $project->sector->name }}
                            </span>
                        </td>
                        <td class="px-6 py-6">
                            <div class="flex items-center text-xs font-bold text-mcc-slate-600">
                                <svg class="w-3.5 h-3.5 mr-1.5 text-mcc-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                {{ $project->location ?? '—' }}
                            </div>
                        </td>
                        <td class="px-6 py-6">
                            <span class="px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-widest {{ $project->status == 'completed' ? 'bg-green-50 text-green-700' : 'bg-amber-50 text-amber-700' }}">
                                {{ $project->status == 'completed' ? __('Completed') : __('Ongoing') }}
                            </span>
                        </td>
                        <td class="px-10 py-6 text-right space-x-2">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="inline-flex items-center justify-center w-10 h-10 bg-mcc-slate-50 text-mcc-slate-400 hover:bg-mcc-blue-600 hover:text-white rounded-xl transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </a>
                            <button @click="openDeleteModal = true; deleteAction = '{{ route('admin.projects.destroy', $project) }}'" class="w-10 h-10 bg-mcc-slate-50 text-mcc-slate-400 hover:bg-red-600 hover:text-white rounded-xl transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-10 py-20 text-center">
                            <div class="flex flex-col items-center">
                                <svg class="w-16 h-16 text-mcc-slate-100 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                <p class="text-mcc-slate-500 font-bold uppercase tracking-widest text-xs">{{ __('No projects found') }}</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($projects->hasPages())
        <div class="px-10 py-8 bg-mcc-slate-50/30 border-t border-mcc-slate-50">
            {{ $projects->links() }}
        </div>
        @endif
    </div>

    <!-- Delete Modal -->
    <div x-show="openDeleteModal" class="fixed inset-0 z-[100] flex items-center justify-center p-6 bg-mcc-slate-900/50 backdrop-blur-sm" x-cloak>
        <div class="bg-white rounded-[2.5rem] w-full max-w-sm p-10 shadow-2xl overflow-hidden relative">
            <h3 class="text-xl font-black text-mcc-slate-900 uppercase tracking-tight mb-4">{{ __('Delete Project?') }}</h3>
            <p class="text-mcc-slate-500 text-sm font-medium mb-8">{{ __('This action is permanent and cannot be undone. Are you absolutely sure?') }}</p>
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
