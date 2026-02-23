@extends('layouts.admin')

@section('title', __('Careers Management'))

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-mcc-slate-900">{{ __('Recruitment Board') }}</h2>
        <a href="{{ route('admin.jobs.create') }}" class="inline-flex items-center px-4 py-2 bg-mcc-blue-600 text-white text-xs font-bold rounded-xl hover:bg-mcc-blue-700 transition shadow-lg">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            {{ __('New Job Posting') }}
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-mcc-slate-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-mcc-slate-50 border-b border-mcc-slate-100">
                        <th class="px-8 py-5 text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Position') }}</th>
                        <th class="px-8 py-5 text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Department / Location') }}</th>
                        <th class="px-8 py-5 text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Status') }}</th>
                        <th class="px-8 py-5 text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest text-right">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-mcc-slate-50">
                    @forelse($jobs as $job)
                    <tr class="hover:bg-mcc-slate-50 transition-colors">
                        <td class="px-8 py-5">
                            <div class="font-bold text-mcc-slate-900">{{ $job->title }}</div>
                            <div class="text-[10px] text-mcc-slate-400 mt-0.5">{{ $job->type }}</div>
                        </td>
                        <td class="px-8 py-5">
                            <div class="text-sm text-mcc-slate-900 font-medium">{{ $job->department }}</div>
                            <div class="text-[10px] text-mcc-slate-400">{{ $job->location }}</div>
                        </td>
                        <td class="px-8 py-5">
                            <span class="inline-flex px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-widest {{ $job->is_active ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700' }}">
                                {{ $job->is_active ? __('Active') : __('Inactive') }}
                            </span>
                        </td>
                        <td class="px-8 py-5 text-right">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="{{ route('admin.jobs.edit', $job->id) }}" class="p-2 text-mcc-blue-600 hover:bg-mcc-blue-50 rounded-lg transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2-2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                                <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-8 py-12 text-center text-mcc-slate-400 italic">No job postings found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($jobs->hasPages())
        <div class="px-8 py-6 border-t border-mcc-slate-50 bg-mcc-slate-50/50">
            {{ $jobs->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
