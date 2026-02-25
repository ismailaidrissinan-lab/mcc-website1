@extends('layouts.app')

@section('title', __("GMD's Message"))

@section('content')
    <!-- GMD Hero -->
    <div class="relative pt-32 pb-20 bg-mcc-slate-900 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <img src="{{ asset('images/mcc-logo.png') }}" class="w-full h-full object-cover">
        </div>
        <div class="container-wide relative z-10">
            <div
                class="inline-flex items-center space-x-2 px-3 py-1 bg-mcc-gold/20 border border-mcc-gold/30 rounded-full mb-6">
                <span
                    class="text-mcc-gold text-[10px] font-bold uppercase tracking-widest">{{ __('Corporate Leadership') }}</span>
            </div>
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 tracking-tight">
                {{ __("GMD's Message") }}
            </h1>
        </div>
    </div>

    <section class="section-padding bg-white relative overflow-hidden">
        <!-- Decor -->
        <div class="absolute top-0 right-0 w-1/2 h-full bg-mcc-slate-50 -skew-x-12 translate-x-1/2 -z-0"></div>

        <div class="container-wide relative z-10">
            <div class="lg:grid lg:grid-cols-12 lg:gap-20 items-start">
                <!-- Left: Portrait -->
                <div class="lg:col-span-5 relative" reveal>
                    <div
                        class="bg-mcc-slate-900 p-3 rounded-[3rem] shadow-2xl relative z-10 overflow-hidden transform lg:-rotate-3 transition-transform duration-700 hover:rotate-0">
                        <img src="{{ asset('images/GMD.jpeg') }}" alt="GMD" class="w-full h-auto rounded-[2.5rem]">
                    </div>

                    <div class="mt-12 lg:ml-12 space-y-4">
                        <h3 class="text-3xl font-bold text-mcc-slate-900">Mr. Liu Zhaolong</h3>
                        <p class="text-mcc-gold font-bold uppercase tracking-[0.2em] text-sm">
                            {{ __('GMD, Mutual Commitment Company Ltd') }}
                        </p>
                    </div>

                    <!-- Signature Placeholder -->
                    <div class="mt-10 lg:ml-12">
                        <div
                            class="w-48 h-20 opacity-40 font-serif text-3xl italic text-mcc-slate-900 border-b border-mcc-slate-900/20 flex items-end pb-2">
                            Liu Zhaolong
                        </div>
                    </div>
                </div>

                <!-- Right: Content -->
                <div class="lg:col-span-7 mt-16 lg:mt-0" reveal>
                    <div class="space-y-10">
                        <div class="relative">
                            <span
                                class="absolute -top-10 -left-10 text-[10rem] text-mcc-blue-50 font-serif opacity-30 select-none">&ldquo;</span>
                            <p
                                class="relative z-10 text-2xl md:text-3xl font-light text-mcc-blue-900 leading-tight italic border-l-4 border-mcc-gold pl-8 py-2">
                                {{ __('"Our success is measured not just by our projects, but by the progress we enable for the communities of Africa and Asia."') }}
                            </p>
                        </div>

                        <div class="prose prose-xl prose-mcc text-mcc-slate-600 max-w-none space-y-8 font-light">
                            <p>
                                {{ __('Since its inception, Mutual Commitment Company Ltd has been driven by a passion for development and a commitment to quality. We started with a vision to bridge the infrastructure gap in emerging markets, and today, we stand as a testament to what hard work and international partnership can achieve.') }}
                            </p>
                            <p>
                                {{ __('In an era of rapid global change, the need for sustainable and resilient infrastructure has never been greater. Whether it\'s through renewable energy solutions, modern transportation networks, or advanced healthcare facilities, we are dedicated to building a future that is both inclusive and prosperous.') }}
                            </p>
                            <p>
                                {{ __('I want to express my gratitude to our partners, our dedicated workforce, and the governments of the countries where we operate. Together, we are not just constructing projects; we are building legacies.') }}
                            </p>
                            <p>
                                {{ __('We look forward to many more years of shared success and meaningful impact.') }}
                            </p>
                        </div>

                        <div class="pt-8 border-t border-mcc-slate-100 flex items-center space-x-6">
                            <div
                                class="w-12 h-12 rounded-full bg-mcc-blue-600 flex items-center justify-center text-white shadow-lg">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z" />
                                </svg>
                            </div>
                            <p class="text-sm font-bold text-mcc-slate-500 uppercase tracking-widest">
                                {{ __('Integrity · Excellence · Partnership') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection