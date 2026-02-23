@extends('layouts.admin')

@section('title', __('Dashboard'))

@section('content')
<div class="space-y-8">
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Projects -->
        <div class="p-6 bg-white rounded-2xl border border-mcc-slate-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-10 h-10 bg-mcc-blue-50 rounded-xl flex items-center justify-center text-mcc-blue-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <span class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Projects') }}</span>
            </div>
            <div class="text-2xl font-bold text-mcc-slate-900">{{ $stats['projects'] }}</div>
            <p class="text-[10px] text-mcc-slate-400 mt-1">{{ __('Across all global sectors') }}</p>
        </div>

        <!-- Insights -->
        <div class="p-6 bg-white rounded-2xl border border-mcc-slate-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-10 h-10 bg-mcc-gold/10 rounded-xl flex items-center justify-center text-mcc-gold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 2v4a2 2 0 002 2h4"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12h10M7 16h10"></path></svg>
                </div>
                <span class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Insights') }}</span>
            </div>
            <div class="text-2xl font-bold text-mcc-slate-900">{{ $stats['insights'] }}</div>
            <p class="text-[10px] text-mcc-slate-400 mt-1">{{ __('Active corporate news') }}</p>
        </div>

        <!-- Careers -->
        <div class="p-6 bg-white rounded-2xl border border-mcc-slate-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-10 h-10 bg-green-50 rounded-xl flex items-center justify-center text-green-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <span class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Careers') }}</span>
            </div>
            <div class="text-2xl font-bold text-mcc-slate-900">{{ $stats['jobs'] }}</div>
            <p class="text-[10px] text-mcc-slate-400 mt-1">{{ __('Active job postings') }}</p>
        </div>

        <!-- CSR -->
        <div class="p-6 bg-white rounded-2xl border border-mcc-slate-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-10 h-10 bg-purple-50 rounded-xl flex items-center justify-center text-purple-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                </div>
                <span class="text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('CSR') }}</span>
            </div>
            <div class="text-2xl font-bold text-mcc-slate-900">{{ $stats['csr'] }}</div>
            <p class="text-[10px] text-mcc-slate-400 mt-1">{{ __('Impact projects') }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Projects -->
        <div class="bg-white rounded-2xl shadow-sm border border-mcc-slate-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-mcc-slate-100 flex items-center justify-between">
                <h3 class="text-base font-bold text-mcc-slate-900">{{ __('Recent Projects') }}</h3>
                <a href="{{ route('admin.projects.index') }}" class="text-xs font-bold text-mcc-blue-600 hover:text-mcc-blue-900 uppercase tracking-widest">{{ __('View All') }}</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-mcc-slate-50 border-b border-mcc-slate-100">
                            <th class="px-6 py-3 text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Project') }}</th>
                            <th class="px-6 py-3 text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Sector') }}</th>
                            <th class="px-6 py-3 text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest text-right">{{ __('Status') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-mcc-slate-50">
                        @foreach($recentProjects as $project)
                        <tr class="hover:bg-mcc-slate-50 transition-colors">
                            <td class="px-6 py-4 text-sm font-bold text-mcc-slate-900">{{ $project->title }}</td>
                            <td class="px-6 py-4 text-xs text-mcc-slate-500">{{ $project->sector->name }}</td>
                            <td class="px-6 py-4 text-right">
                                <span class="inline-flex px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-widest {{ $project->status == 'completed' ? 'bg-green-100 text-green-700' : 'bg-amber-100 text-amber-700' }}">
                                    {{ $project->status }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-2xl shadow-sm border border-mcc-slate-100 p-8">
            <h3 class="text-base font-bold text-mcc-slate-900 mb-8">{{ __('Executive Actions') }}</h3>
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('admin.projects.create') }}" class="p-6 bg-mcc-slate-50 rounded-2xl group hover:bg-mcc-blue-600 transition-all duration-300">
                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-mcc-blue-600 mb-4 shadow-sm group-hover:bg-mcc-blue-500 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </div>
                    <span class="block font-bold text-mcc-slate-900 text-sm group-hover:text-white transition-colors">{{ __('New Project') }}</span>
                </a>
                <a href="{{ route('admin.articles.create') }}" class="p-6 bg-mcc-slate-50 rounded-2xl group hover:bg-mcc-blue-600 transition-all duration-300">
                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-mcc-blue-600 mb-4 shadow-sm group-hover:bg-mcc-blue-500 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <span class="block font-bold text-mcc-slate-900 text-sm group-hover:text-white transition-colors">{{ __('Post Insight') }}</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
