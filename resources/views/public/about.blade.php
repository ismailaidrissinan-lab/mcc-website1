@extends('layouts.app')

@section('title', __('About Us'))

@section('content')
<!-- About Hero -->
<div class="relative pt-32 pb-20 bg-mcc-slate-900 overflow-hidden">
    <div class="absolute inset-0 opacity-30">
        <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=2000&q=80" class="w-full h-full object-cover">
    </div>
    <div class="container-wide relative z-10 text-center">
        <div class="inline-flex items-center space-x-2 px-3 py-1 bg-mcc-gold/20 border border-mcc-gold/30 rounded-full mb-6">
            <span class="text-mcc-gold text-[10px] font-bold uppercase tracking-widest">{{ __('Corporate Profile') }}</span>
        </div>
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 tracking-tight">
            {{ __('About Mutual Commitment Company') }}
        </h1>
        <p class="text-xl text-mcc-blue-100 max-w-2xl mx-auto font-light leading-relaxed">
            {{ __('A legacy of excellence in global infrastructure and investment, bridging development between nations.') }}
        </p>
    </div>
</div>

<!-- Mission & Vision Summary -->
<section class="section-padding bg-white">
    <div class="container-wide">
        <div class="lg:grid lg:grid-cols-2 lg:gap-20 items-center">
            <div class="relative">
                <div class="aspect-square bg-mcc-slate-100 rounded-[3rem] overflow-hidden shadow-2xl relative z-10">
                    <img src="https://images.unsplash.com/photo-1573164713714-d95e436ab8d6?ixlib=rb-1.2.1&auto=format&fit=crop&w=1200&q=80" alt="Executive Meeting" class="w-full h-full object-cover">
                </div>
                <!-- Decorative Elements -->
                <div class="absolute -top-10 -left-10 w-40 h-40 bg-mcc-blue-50 rounded-full -z-0"></div>
                <div class="absolute -bottom-10 -right-10 w-64 h-64 bg-mcc-gold/10 rounded-full -z-0"></div>
            </div>
            
            <div class="mt-16 lg:mt-0 space-y-8" reveal>
                <h2 class="text-4xl font-bold text-mcc-slate-900 tracking-tight leading-tight">
                    {{ __('Our Story and Global Presence') }}
                </h2>
                <div class="space-y-6 text-lg text-mcc-slate-600 leading-relaxed font-light">
                    <p>
                        {{ __('Mutual Commitment Company Ltd (MCC) was founded with a singular vision: to become a bridge for development between nations. With decades of experience, we have grown into a multinational conglomerate with a significant footprint in Africa and Asia.') }}
                    </p>
                    <p>
                        {{ __("Our operations are centered on delivering high-impact engineering projects, from massive transport networks to energy systems that power entire communities. We don't just build structures; we build the foundations for economic growth.") }}
                    </p>
                    <div class="pt-6 border-l-4 border-mcc-blue-600 pl-8 space-y-4">
                        <p class="font-medium text-mcc-slate-900">
                            {{ __('With headquarters in both Nigeria and China, we leverage international expertise and local knowledge to deliver projects that are both state-of-the-art and tailored to local needs.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Timeline / Milestones -->
<section class="section-padding bg-mcc-slate-50 relative overflow-hidden">
    <div class="container-wide">
        <div class="text-center max-w-2xl mx-auto mb-20" reveal>
            <h2 class="text-mcc-gold font-bold text-xs uppercase tracking-[0.2em] mb-4">{{ __('Our Heritage') }}</h2>
            <h3 class="text-4xl font-bold text-mcc-slate-900 tracking-tight">{{ __('Milestones of Excellence') }}</h3>
        </div>

        <div class="relative">
            <!-- Central Line -->
            <div class="absolute left-1/2 -translate-x-1/2 h-full w-[1px] bg-mcc-slate-200 hidden md:block"></div>
            
            <div class="space-y-16">
                <!-- Year 2000 -->
                <div class="relative flex flex-col md:flex-row items-center">
                    <div class="flex-1 md:text-right md:pr-12 mb-4 md:mb-0">
                        <div class="text-3xl font-bold text-mcc-blue-600 mb-2">2000</div>
                        <h4 class="text-xl font-bold text-mcc-slate-900 mb-2">{{ __('Foundation') }}</h4>
                        <p class="text-mcc-slate-500 text-sm italic">{{ __('Establishment of MCC with a focus on international engineering cooperation.') }}</p>
                    </div>
                    <div class="w-4 h-4 rounded-full bg-mcc-blue-600 border-4 border-white shadow-lg relative z-10 hidden md:block"></div>
                    <div class="flex-1 md:pl-12"></div>
                </div>

                <!-- Year 2010 -->
                <div class="relative flex flex-col md:flex-row items-center">
                    <div class="flex-1"></div>
                    <div class="w-4 h-4 rounded-full bg-mcc-blue-600 border-4 border-white shadow-lg relative z-10 hidden md:block"></div>
                    <div class="flex-1 md:pl-12">
                        <div class="text-3xl font-bold text-mcc-blue-600 mb-2">2010</div>
                        <h4 class="text-xl font-bold text-mcc-slate-900 mb-2">{{ __('African Expansion') }}</h4>
                        <p class="text-mcc-slate-500 text-sm italic">{{ __('Major project launches in transport and energy sectors across Nigeria and West Africa.') }}</p>
                    </div>
                </div>

                <!-- Year 2020 -->
                <div class="relative flex flex-col md:flex-row items-center">
                    <div class="flex-1 md:text-right md:pr-12 mb-4 md:mb-0">
                        <div class="text-3xl font-bold text-mcc-blue-600 mb-2">2020</div>
                        <h4 class="text-xl font-bold text-mcc-slate-900 mb-2">{{ __('Sustainable Future') }}</h4>
                        <p class="text-mcc-slate-500 text-sm italic">{{ __('Focus shift towards renewable energy and smart city infrastructure.') }}</p>
                    </div>
                    <div class="w-4 h-4 rounded-full bg-mcc-blue-600 border-4 border-white shadow-lg relative z-10 hidden md:block"></div>
                    <div class="flex-1 md:pl-12"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Global Presence -->
<section class="section-padding bg-mcc-slate-900 text-white overflow-hidden">
    <div class="container-wide">
        <div class="lg:grid lg:grid-cols-2 lg:gap-20 items-center">
            <div class="space-y-8" reveal>
                <h2 class="text-mcc-gold font-bold text-xs uppercase tracking-[0.2em]">{{ __('Global Presence') }}</h2>
                <h3 class="text-4xl md:text-5xl font-bold tracking-tight leading-tight">
                    {{ __('Bridging Continents, Powering Progress') }}
                </h3>
                <p class="text-mcc-slate-400 text-lg font-light leading-relaxed">
                    {{ __('With strategic hubs in Abuja and Beijing, our reach extends across key developmental corridors in Africa and Asia, ensuring seamless project delivery and international standards localized for regional success.') }}
                </p>
                <div class="grid grid-cols-2 gap-8 pt-4">
                    <div class="space-y-2">
                        <div class="text-3xl font-bold text-white">12+</div>
                        <div class="text-xs text-mcc-gold uppercase tracking-widest font-bold">{{ __('Countries') }}</div>
                    </div>
                    <div class="space-y-2">
                        <div class="text-3xl font-bold text-white">4</div>
                        <div class="text-xs text-mcc-gold uppercase tracking-widest font-bold">{{ __('Regional Hubs') }}</div>
                    </div>
                </div>
            </div>
            <div class="mt-16 lg:mt-0 relative group">
                <div class="bg-white/5 p-4 rounded-[3rem] backdrop-blur-sm border border-white/10 overflow-hidden transform transition-transform duration-500 group-hover:scale-[1.02]">
                    <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1600&q=80" 
                         alt="Global Presence Map" 
                         class="w-full h-auto rounded-[2.2rem]">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CSR Section -->
<section class="section-padding bg-white">
    <div class="container-wide">
        <div class="flex flex-col lg:flex-row items-center justify-between mb-20 gap-10" reveal>
            <div class="max-w-2xl">
                <h2 class="text-mcc-gold font-bold text-xs uppercase tracking-[0.2em] mb-4">{{ __('Responsibility') }}</h2>
                <h3 class="text-4xl font-bold text-mcc-slate-900 leading-tight">
                    {{ __('Building More Than Just Infrastructure') }}
                </h3>
            </div>
            <p class="text-mcc-slate-600 max-w-lg leading-relaxed">
                {{ __('At MCC, we believe in shared prosperity. Our Corporate Social Responsibility programs focus on education, healthcare, and sustainable local employment in every community we serve.') }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="p-10 bg-mcc-slate-50 rounded-3xl border border-mcc-slate-100 transition-all duration-300 hover:shadow-xl group">
                <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-mcc-blue-600 mb-8 shadow-sm group-hover:bg-mcc-blue-600 group-hover:text-white transition-colors duration-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                </div>
                <h4 class="text-xl font-bold text-mcc-slate-900 mb-4">{{ __('Education First') }}</h4>
                <p class="text-mcc-slate-500 text-sm leading-relaxed">{{ __('Empowering the next generation through engineering scholarships and facility upgrades.') }}</p>
            </div>
            
            <div class="p-10 bg-mcc-slate-50 rounded-3xl border border-mcc-slate-100 transition-all duration-300 hover:shadow-xl group">
                <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-mcc-blue-600 mb-8 shadow-sm group-hover:bg-mcc-blue-600 group-hover:text-white transition-colors duration-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                </div>
                <h4 class="text-xl font-bold text-mcc-slate-900 mb-4">{{ __('Healthcare Support') }}</h4>
                <p class="text-mcc-slate-500 text-sm leading-relaxed">{{ __('Investing in community clinics and localized medical supplies to build resilient health systems.') }}</p>
            </div>

            <div class="p-10 bg-mcc-slate-50 rounded-3xl border border-mcc-slate-100 transition-all duration-300 hover:shadow-xl group">
                <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-mcc-blue-600 mb-8 shadow-sm group-hover:bg-mcc-blue-600 group-hover:text-white transition-colors duration-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                </div>
                <h4 class="text-xl font-bold text-mcc-slate-900 mb-4">{{ __('Local Employment') }}</h4>
                <p class="text-mcc-slate-500 text-sm leading-relaxed">{{ __('Focusing on 85%+ local workforce participation in our projects to drive regional economic stability.') }}</p>
            </div>
        </div>
    </div>
</section>
@endsection
