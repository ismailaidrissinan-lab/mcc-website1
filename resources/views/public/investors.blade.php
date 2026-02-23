@extends('layouts.app')

@section('title', __('Investor Relations'))

@section('content')
<!-- Investors Hero -->
<div class="relative pt-32 pb-48 lg:pb-64 bg-mcc-slate-900 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-1.2.1&auto=format&fit=crop&w=2000&q=80" 
             class="w-full h-full object-cover opacity-30 transform scale-105">
        <div class="absolute inset-0 bg-gradient-to-b from-mcc-slate-900/50 via-mcc-slate-900 to-white"></div>
    </div>

    <div class="container-wide relative z-10 text-center">
        <div class="inline-flex items-center space-x-2 px-3 py-1 bg-mcc-gold/20 border border-mcc-gold/30 rounded-full mb-6">
            <span class="text-mcc-gold text-[10px] font-bold uppercase tracking-widest">{{ __('Corporate Governance') }}</span>
        </div>
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-8 tracking-tight">
            {{ __('Investor Relations Portal') }}
        </h1>
        <p class="text-xl text-mcc-blue-100 max-w-3xl mx-auto font-light leading-relaxed">
            {{ __('Transparent financial reporting, corporate governance updates, and stakeholder intelligence from the head office.') }}
        </p>
    </div>
</div>

<section class="-mt-32 relative z-20 pb-32">
    <div class="container-wide">
        <div class="bg-white p-12 md:p-20 rounded-[3rem] shadow-2xl border border-mcc-slate-100">
            <div class="max-w-5xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-mcc-slate-900 mb-6">{{ __('Stakeholder Transparency & Financial Integrity') }}</h2>
                    <p class="text-mcc-slate-600 leading-relaxed text-lg font-light">
                        {{ __('MCC is dedicated to maintaining the highest standards of financial integrity through transparent reporting and governance.') }}
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    @forelse($documents as $category => $docs)
                    <div class="space-y-8">
                        <div class="flex items-center gap-4 border-b border-mcc-slate-100 pb-4">
                            <h3 class="text-lg font-bold text-mcc-blue-900 uppercase tracking-widest text-xs">{{ __($category) }}</h3>
                            <span class="ml-auto bg-mcc-blue-50 text-mcc-blue-600 text-[10px] px-2 py-0.5 rounded-full font-bold">{{ $docs->count() }}</span>
                        </div>
                        <div class="space-y-6">
                            @foreach($docs as $doc)
                            <a href="{{ asset('storage/'.$doc->file_path) }}" target="_blank" class="group flex items-start gap-4">
                                <div class="w-10 h-10 bg-mcc-slate-50 rounded-lg flex items-center justify-center text-mcc-slate-400 group-hover:bg-mcc-blue-600 group-hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-mcc-slate-900 font-bold text-sm truncate group-hover:text-mcc-blue-600 transition-colors">{{ $doc->title }}</h4>
                                    <p class="text-[10px] text-mcc-slate-400 mt-1 uppercase tracking-widest">{{ $doc->published_at->format('M Y') }}</p>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full text-center py-12 text-mcc-slate-400 italic">
                        {{ __('Financial and governance publications will be available shortly.') }}
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
