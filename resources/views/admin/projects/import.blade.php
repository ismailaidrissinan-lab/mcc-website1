@extends('layouts.admin')

@section('title', __('Import Projects'))

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="mb-10 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-black text-mcc-slate-900 tracking-tight uppercase">
                    {{ __('Batch Import Projects') }}
                </h2>
                <p class="text-mcc-slate-500 text-sm font-medium mt-1">
                    {{ __('Upload a CSV file to create multiple projects at once') }}
                </p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ asset('project_batch_upload_template.csv') }}"
                    download
                    class="px-6 py-3.5 bg-mcc-blue-50 text-mcc-blue-700 text-[10px] font-black uppercase tracking-[0.2em] rounded-2xl hover:bg-mcc-blue-100 transition-all flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    {{ __('Download Template') }}
                </a>
                <a href="{{ route('admin.projects.index') }}"
                    class="px-8 py-3.5 bg-mcc-slate-100 text-mcc-slate-600 text-[10px] font-black uppercase tracking-[0.2em] rounded-2xl hover:bg-mcc-slate-200 transition-all flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                        </path>
                    </svg>
                    {{ __('Back to List') }}
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-8 p-6 bg-green-50 border border-green-200 rounded-2xl text-sm text-green-700 font-medium">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-8 p-6 bg-red-50 border border-red-100 rounded-2xl">
                <ul class="space-y-1 text-sm text-red-600 font-medium">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-[2.5rem] shadow-xl border border-mcc-slate-100 overflow-hidden p-10 md:p-12">
            {{-- Instructions --}}
            <div class="mb-10 p-6 bg-mcc-blue-50/50 rounded-2xl border border-mcc-blue-100">
                <h4 class="text-[10px] font-black text-mcc-blue-600 uppercase tracking-[0.25em] mb-3">
                    {{ __('CSV Format Requirements') }}</h4>
                <p class="text-sm text-mcc-slate-600 mb-4">
                    {{ __('Your CSV file should have the following columns (in order):') }}</p>
                <div class="overflow-x-auto">
                    <table class="w-full text-xs">
                        <thead>
                            <tr class="border-b border-mcc-blue-100">
                                <th
                                    class="text-left py-2 px-3 font-black text-mcc-slate-700 uppercase tracking-widest text-[9px]">
                                    {{ __('Column') }}</th>
                                <th
                                    class="text-left py-2 px-3 font-black text-mcc-slate-700 uppercase tracking-widest text-[9px]">
                                    {{ __('Required') }}</th>
                                <th
                                    class="text-left py-2 px-3 font-black text-mcc-slate-700 uppercase tracking-widest text-[9px]">
                                    {{ __('Example') }}</th>
                            </tr>
                        </thead>
                        <tbody class="text-mcc-slate-600 font-medium">
                            <tr class="border-b border-mcc-slate-50">
                                <td class="py-2 px-3 font-bold">title</td>
                                <td class="py-2 px-3">Yes</td>
                                <td class="py-2 px-3">Solar Farm Phase 1</td>
                            </tr>
                            <tr class="border-b border-mcc-slate-50">
                                <td class="py-2 px-3 font-bold">sector</td>
                                <td class="py-2 px-3">Yes</td>
                                <td class="py-2 px-3">Power & Renewable Energy</td>
                            </tr>
                            <tr class="border-b border-mcc-slate-50">
                                <td class="py-2 px-3 font-bold">state</td>
                                <td class="py-2 px-3">No</td>
                                <td class="py-2 px-3">Lagos</td>
                            </tr>
                            <tr class="border-b border-mcc-slate-50">
                                <td class="py-2 px-3 font-bold">location</td>
                                <td class="py-2 px-3">No</td>
                                <td class="py-2 px-3">Lekki, Lagos</td>
                            </tr>
                            <tr class="border-b border-mcc-slate-50">
                                <td class="py-2 px-3 font-bold">description</td>
                                <td class="py-2 px-3">Yes</td>
                                <td class="py-2 px-3">A 240MW solar farm...</td>
                            </tr>
                            <tr class="border-b border-mcc-slate-50">
                                <td class="py-2 px-3 font-bold">status</td>
                                <td class="py-2 px-3">Yes</td>
                                <td class="py-2 px-3">ongoing / completed / operational / suspended</td>
                            </tr>
                            <tr class="border-b border-mcc-slate-50">
                                <td class="py-2 px-3 font-bold">award_date</td>
                                <td class="py-2 px-3">No</td>
                                <td class="py-2 px-3">2024-03-15</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3 font-bold">completion_date</td>
                                <td class="py-2 px-3">No</td>
                                <td class="py-2 px-3">2025-12-31</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Upload Form --}}
            <form action="{{ route('admin.projects.import.process') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div x-data="{ fileName: '' }" class="space-y-8">
                    <div
                        class="relative group bg-mcc-slate-50 rounded-3xl border-2 border-dashed border-mcc-slate-200 hover:border-mcc-blue-400 transition-colors p-12 text-center">
                        <div class="flex flex-col items-center justify-center text-mcc-slate-300 space-y-3">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            <span class="text-sm font-bold uppercase tracking-widest"
                                x-text="fileName || '{{ __('Click to select CSV file') }}'"></span>
                            <span class="text-[10px] text-mcc-slate-300">{{ __('Accepts .csv files') }}</span>
                        </div>
                        <input type="file" name="csv_file" accept=".csv" required
                            @change="fileName = $event.target.files[0]?.name || ''"
                            class="absolute inset-0 opacity-0 cursor-pointer">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-12 py-5 bg-mcc-blue-900 text-white font-black uppercase tracking-[0.2em] rounded-2xl shadow-xl hover:bg-black transition-all flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                            </svg>
                            {{ __('Import Projects') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection