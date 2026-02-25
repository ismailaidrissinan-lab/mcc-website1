@extends('layouts.admin')

@section('title', __('CSR Projects Management'))

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-bold text-mcc-slate-900">{{ __('CSR Projects') }}</h2>
            <a href="{{ route('admin.csr.create') }}"
                class="inline-flex items-center px-4 py-2 bg-mcc-blue-600 text-white text-xs font-bold rounded-xl hover:bg-mcc-blue-700 transition shadow-lg">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                {{ __('New CSR Project') }}
            </a>
        </div>

        <div class="bg-white rounded-3xl border border-mcc-slate-100 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-mcc-slate-50 border-b border-mcc-slate-100">
                            <th class="px-8 py-5 text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">
                                {{ __('Project Title') }}</th>
                            <th class="px-8 py-5 text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">
                                {{ __('Location') }}</th>
                            <th class="px-8 py-5 text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">
                                {{ __('Published At') }}</th>
                            <th
                                class="px-8 py-5 text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest text-right">
                                {{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-mcc-slate-50">
                        @forelse($projects as $project)
                            <tr class="hover:bg-mcc-slate-50 transition-colors">
                                <td class="px-8 py-5">
                                    <div class="w-16 h-10 bg-mcc-slate-100 rounded-lg overflow-hidden flex-shrink-0">
                                        @if($project->image_url)
                                            <img src="{{ $project->image_url }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-mcc-slate-300">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-8 py-5">
                                    <div class="font-bold text-mcc-slate-900">{{ $project->title }}</div>
                                    <div class="text-[10px] text-mcc-slate-400 mt-0.5">{{ $project->slug }}</div>
                                </td>
                                <td class="px-8 py-5 text-sm text-mcc-slate-600 font-medium">
                                    {{ $project->location }}
                                </td>
                                <td class="px-8 py-5 text-sm text-mcc-slate-500">
                                    {{ $project->published_at->format('M d, Y') }}
                                </td>
                                <td class="px-8 py-5 text-right">
                                    <div class="flex items-center justify-end space-x-2">
                                        <a href="{{ route('admin.csr.edit', $project->id) }}"
                                            class="p-2 text-mcc-blue-600 hover:bg-mcc-blue-50 rounded-lg transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.csr.destroy', $project->id) }}" method="POST"
                                            class="inline" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-8 py-12 text-center text-mcc-slate-400 italic">No CSR projects found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($projects->hasPages())
                <div class="px-8 py-6 border-t border-mcc-slate-50 bg-mcc-slate-50/50">
                    {{ $projects->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection