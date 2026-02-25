@extends('layouts.admin')

@section('title', __('Dashboard'))

@section('content')
    <div class="space-y-8">
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Projects -->
            <div
                class="relative overflow-hidden p-6 bg-gradient-to-br from-white to-mcc-blue-50/30 rounded-2xl border border-mcc-slate-100 shadow-sm hover:shadow-md transition-all duration-300 group">
                <div
                    class="absolute -right-4 -top-4 w-24 h-24 bg-mcc-blue-50 rounded-full opacity-50 group-hover:scale-150 transition-transform duration-700 ease-out">
                </div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-white rounded-xl shadow-sm border border-mcc-blue-100 flex items-center justify-center text-mcc-blue-600 group-hover:-translate-y-1 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                        <span
                            class="text-[11px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Projects') }}</span>
                    </div>
                    <div class="text-3xl font-extrabold text-mcc-slate-900 tracking-tight">{{ $stats['projects'] }}</div>
                    <p class="text-[11px] font-medium text-mcc-slate-500 mt-2">{{ __('Across all global sectors') }}</p>
                </div>
            </div>

            <!-- Insights -->
            <div
                class="relative overflow-hidden p-6 bg-gradient-to-br from-white to-mcc-gold/5 rounded-2xl border border-mcc-slate-100 shadow-sm hover:shadow-md transition-all duration-300 group">
                <div
                    class="absolute -right-4 -top-4 w-24 h-24 bg-mcc-gold/10 rounded-full opacity-50 group-hover:scale-150 transition-transform duration-700 ease-out">
                </div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-white rounded-xl shadow-sm border border-mcc-gold/20 flex items-center justify-center text-mcc-gold group-hover:-translate-y-1 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 2v4a2 2 0 002 2h4"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12h10M7 16h10">
                                </path>
                            </svg>
                        </div>
                        <span
                            class="text-[11px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Insights') }}</span>
                    </div>
                    <div class="text-3xl font-extrabold text-mcc-slate-900 tracking-tight">{{ $stats['insights'] }}</div>
                    <p class="text-[11px] font-medium text-mcc-slate-500 mt-2">{{ __('Active corporate news') }}</p>
                </div>
            </div>

            <!-- Careers -->
            <div
                class="relative overflow-hidden p-6 bg-gradient-to-br from-white to-emerald-50/50 rounded-2xl border border-mcc-slate-100 shadow-sm hover:shadow-md transition-all duration-300 group">
                <div
                    class="absolute -right-4 -top-4 w-24 h-24 bg-emerald-50 rounded-full opacity-50 group-hover:scale-150 transition-transform duration-700 ease-out">
                </div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-white rounded-xl shadow-sm border border-emerald-100 flex items-center justify-center text-emerald-600 group-hover:-translate-y-1 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <span
                            class="text-[11px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Careers') }}</span>
                    </div>
                    <div class="text-3xl font-extrabold text-mcc-slate-900 tracking-tight">{{ $stats['jobs'] }}</div>
                    <p class="text-[11px] font-medium text-mcc-slate-500 mt-2">{{ __('Active job postings') }}</p>
                </div>
            </div>

            <!-- CSR -->
            <div
                class="relative overflow-hidden p-6 bg-gradient-to-br from-white to-purple-50/50 rounded-2xl border border-mcc-slate-100 shadow-sm hover:shadow-md transition-all duration-300 group">
                <div
                    class="absolute -right-4 -top-4 w-24 h-24 bg-purple-50 rounded-full opacity-50 group-hover:scale-150 transition-transform duration-700 ease-out">
                </div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-white rounded-xl shadow-sm border border-purple-100 flex items-center justify-center text-purple-600 group-hover:-translate-y-1 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                </path>
                            </svg>
                        </div>
                        <span
                            class="text-[11px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('CSR') }}</span>
                    </div>
                    <div class="text-3xl font-extrabold text-mcc-slate-900 tracking-tight">{{ $stats['csr'] }}</div>
                    <p class="text-[11px] font-medium text-mcc-slate-500 mt-2">{{ __('Impact projects') }}</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Recent Projects -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-mcc-slate-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-mcc-slate-100/60 bg-mcc-slate-50/50 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-mcc-blue-50 text-mcc-blue-600 flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <h3 class="text-base font-bold text-mcc-slate-900">{{ __('Recent Projects') }}</h3>
                </div>
                <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center text-[11px] font-bold text-mcc-blue-600 hover:text-mcc-blue-800 uppercase tracking-widest transition-colors">
                    {{ __('View All') }}
                    <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-white border-b border-mcc-slate-100/60">
                            <th class="px-6 py-4 text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Project') }}</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Sector') }}</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-mcc-slate-400 uppercase tracking-widest text-right">{{ __('Status') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-mcc-slate-50/80">
                        @foreach($recentProjects as $project)
                        <tr class="hover:bg-mcc-slate-50/50 transition-colors group">
                            <td class="px-6 py-4">
                                <span class="text-sm font-bold text-mcc-slate-900 group-hover:text-mcc-blue-600 transition-colors">{{ $project->title }}</span>
                            </td>
                            <td class="px-6 py-4 text-xs font-medium text-mcc-slate-500">{{ $project->sector->name }}</td>
                            <td class="px-6 py-4 text-right">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest border {{ $project->status == 'completed' ? 'bg-green-50 text-green-700 border-green-200' : 'bg-amber-50 text-amber-700 border-amber-200' }}">
                                    @if($project->status === 'completed')
                                        <div class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5"></div>
                                    @else
                                        <div class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-1.5 animate-pulse"></div>
                                    @endif
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
        <div class="lg:col-span-1 bg-white rounded-2xl shadow-sm border border-mcc-slate-100 p-6 flex flex-col h-full">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-8 h-8 rounded-lg bg-mcc-gold/10 text-mcc-gold flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h3 class="text-base font-bold text-mcc-slate-900">{{ __('Executive Actions') }}</h3>
            </div>
            
            <div class="flex-1 space-y-3">
                <a href="{{ route('admin.projects.create') }}" class="group flex items-center p-4 bg-white border border-mcc-slate-100 rounded-xl hover:border-mcc-blue-200 hover:shadow-md hover:shadow-mcc-blue-50 transition-all duration-300">
                    <div class="w-10 h-10 bg-mcc-blue-50 rounded-lg flex items-center justify-center text-mcc-blue-600 group-hover:bg-mcc-blue-600 group-hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </div>
                    <div class="ml-4">
                        <span class="block font-bold text-mcc-slate-900 text-sm group-hover:text-mcc-blue-700 transition-colors">{{ __('New Project') }}</span>
                        <span class="block text-xs text-mcc-slate-500 mt-0.5">{{ __('Log a new development') }}</span>
                    </div>
                </a>

                <a href="{{ route('admin.articles.create') }}" class="group flex items-center p-4 bg-white border border-mcc-slate-100 rounded-xl hover:border-mcc-gold/30 hover:shadow-md hover:shadow-mcc-gold/10 transition-all duration-300">
                    <div class="w-10 h-10 bg-mcc-gold/10 rounded-lg flex items-center justify-center text-mcc-gold group-hover:bg-mcc-gold group-hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </div>
                    <div class="ml-4">
                        <span class="block font-bold text-mcc-slate-900 text-sm group-hover:text-mcc-gold transition-colors">{{ __('Post Insight') }}</span>
                        <span class="block text-xs text-mcc-slate-500 mt-0.5">{{ __('Publish corporate news') }}</span>
                    </div>
                </a>

                <a href="{{ route('admin.projects.export') }}" class="group flex items-center p-4 bg-white border border-mcc-slate-100 rounded-xl hover:border-emerald-200 hover:shadow-md hover:shadow-emerald-50 transition-all duration-300 mt-auto">
                    <div class="w-10 h-10 bg-emerald-50 rounded-lg flex items-center justify-center text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    </div>
                    <div class="ml-4">
                        <span class="block font-bold text-mcc-slate-900 text-sm group-hover:text-emerald-700 transition-colors">{{ __('Export Projects') }}</span>
                        <span class="block text-xs text-mcc-slate-500 mt-0.5">{{ __('Download CSV database') }}</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    </div>
@endsection