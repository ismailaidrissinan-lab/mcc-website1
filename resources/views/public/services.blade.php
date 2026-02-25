@extends('layouts.app')

@section('title', __('Expertise & Solutions'))

@section('content')
<!-- Services Hero -->
<div class="relative pt-32 pb-24 bg-mcc-slate-900 overflow-hidden">
    <div class="absolute inset-0 opacity-30">
        <img src="{{ asset('images/mcc-logo.png') }}" 
             alt="Modern Engineering in China"
             class="w-full h-full object-cover">
    </div>
    <div class="container-wide relative z-10 text-center">
        <div class="inline-flex items-center space-x-2 px-3 py-1 bg-mcc-gold/20 border border-mcc-gold/30 rounded-full mb-6">
            <span class="text-mcc-gold text-[10px] font-bold uppercase tracking-widest">{{ __('Business Expertise') }}</span>
        </div>
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-8 tracking-tight">
            {{ __('Strategic Infrastructure Solutions') }}
        </h1>
        <p class="text-xl text-mcc-blue-100 max-w-3xl mx-auto font-light leading-relaxed">
            {{ __('Deep technical mastery across critical sectors, driving sustainable growth and delivering world-class engineering excellence.') }}
        </p>
    </div>
</div>

<!-- Expertise Sectors -->
<section class="section-padding bg-mcc-slate-50">
    <div class="container-wide">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($sectors as $sector)
            <div class="group bg-white rounded-[2.5rem] p-10 border border-mcc-slate-100 shadow-sm transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 relative overflow-hidden" reveal>
                <div class="absolute top-0 right-0 w-32 h-32 bg-mcc-blue-50 rounded-bl-[5rem] -mr-10 -mt-10 transition-transform duration-500 group-hover:scale-125"></div>
                
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-mcc-slate-900 rounded-2xl flex items-center justify-center text-mcc-gold mb-8 shadow-lg group-hover:bg-mcc-blue-600 group-hover:text-white transition-colors duration-500">
                        @if($sector->slug == 'road-bridges')
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        @elseif($sector->slug == 'oil-gas')
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        @else
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        @endif
                    </div>
                    
                    <h3 class="text-2xl font-bold text-mcc-slate-900 mb-4">{{ $sector->name }}</h3>
                    <p class="text-mcc-slate-500 leading-relaxed mb-10 min-h-[5rem]">
                        {{ $sector->description ?? __('Providing innovative engineering and construction services tailored to the unique demands of the :name sector.', ['name' => $sector->name]) }}
                    </p>
                    
                    <div class="flex items-center justify-between pt-8 border-t border-mcc-slate-50">
                        <span class="text-xs font-bold text-mcc-blue-600 uppercase tracking-widest">{{ $sector->projects_count }} {{ __('Projects') }}</span>
                        <a href="{{ route('sectors.show', $sector->slug) }}" class="inline-flex items-center text-sm font-bold text-mcc-slate-900 hover:text-mcc-blue-600 transition-colors">
                            {{ __('Explore Portfolio') }}
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Our Approach -->
<section class="section-padding bg-white relative overflow-hidden">
    <div class="container-wide relative z-10">
        <div class="max-w-4xl mx-auto text-center mb-20" reveal>
            <h2 class="text-3xl md:text-5xl font-bold text-mcc-slate-900 mb-8 tracking-tight">{{ __('The MCC Approach to Excellence') }}</h2>
            <p class="text-lg text-mcc-slate-600 font-light leading-relaxed">
                {{ __('We combine integrated technical capabilities with a deep commitment to sustainable development and local capacity building.') }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div class="space-y-10" reveal>
                <div class="flex gap-6">
                    <div class="flex-shrink-0 w-12 h-12 bg-mcc-blue-50 rounded-xl flex items-center justify-center text-mcc-blue-600">
                        <span class="text-xl font-bold">01</span>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-mcc-slate-900 mb-3">{{ __('Integrated Engineering') }}</h4>
                        <p class="text-mcc-slate-500 font-light leading-relaxed">{{ __('Full lifecycle management from conceptual design and feasibility studies to construction and long-term asset maintenance.') }}</p>
                    </div>
                </div>
                <div class="flex gap-6">
                    <div class="flex-shrink-0 w-12 h-12 bg-mcc-blue-50 rounded-xl flex items-center justify-center text-mcc-blue-600">
                        <span class="text-xl font-bold">02</span>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-mcc-slate-900 mb-3">{{ __('Sustainable Innovation') }}</h4>
                        <p class="text-mcc-slate-500 font-light leading-relaxed">{{ __('Leveraging the latest technologies and eco-friendly practices to ensure infrastructure that serves generations to come.') }}</p>
                    </div>
                </div>
                <div class="flex gap-6">
                    <div class="flex-shrink-0 w-12 h-12 bg-mcc-blue-50 rounded-xl flex items-center justify-center text-mcc-blue-600">
                        <span class="text-xl font-bold">03</span>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-mcc-slate-900 mb-3">{{ __('Local Empowerment') }}</h4>
                        <p class="text-mcc-slate-500 font-light leading-relaxed">{{ __('Investing in training and development to maintain a workforce that is over 85% local in every region we operate.') }}</p>
                    </div>
                </div>
            </div>
            
            <div class="relative" reveal>
                <div class="aspect-square bg-mcc-slate-900 rounded-[3rem] overflow-hidden shadow-2xl relative">
                    <img src="{{ asset('images/mcc-logo.png') }}" class="w-full h-full object-cover opacity-60">
                    <div class="absolute inset-0 flex items-center justify-center p-12 text-center">
                        <div class="p-10 border border-white/20 backdrop-blur-md bg-white/5 rounded-3xl">
                            <h3 class="text-white text-2xl font-bold mb-4">{{ __('Partner with MCC') }}</h3>
                            <p class="text-mcc-blue-100 text-sm font-light mb-8">{{ __('Join us in building the high-impact infrastructure of tomorrow.') }}</p>
                            <a href="{{ route('contact') }}" class="btn-corporate bg-mcc-gold text-mcc-slate-900 border-mcc-gold hover:bg-white hover:border-white w-full justify-center">{{ __('Get in Touch') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
