@extends('layouts.app')

@section('title', __('Contact Us'))

@section('content')
<!-- Contact Hero -->
<div class="relative pt-32 pb-20 bg-mcc-slate-900 overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <img src="https://images.unsplash.com/photo-1423666639041-f56000c27a9a?auto=format&fit=crop&w=2000&q=80" class="w-full h-full object-cover">
    </div>
    <div class="container-wide relative z-10 text-center">
        <div class="inline-flex items-center space-x-2 px-3 py-1 bg-mcc-gold/20 border border-mcc-gold/30 rounded-full mb-6">
            <span class="text-mcc-gold text-[10px] font-bold uppercase tracking-widest">{{ __('Global Network') }}</span>
        </div>
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 tracking-tight">
            {{ __('Get in Touch') }}
        </h1>
        <p class="text-xl text-mcc-blue-100 max-w-2xl mx-auto font-light leading-relaxed">
            {{ __('Connect with our global offices in Nigeria and China to discuss your next project or partnership.') }}
        </p>
    </div>
</div>

<section class="section-padding bg-white relative overflow-hidden">
    <!-- Decor -->
    <div class="absolute top-0 right-0 w-1/2 h-full bg-mcc-slate-50 -skew-x-12 translate-x-1/2 -z-0"></div>
    
    <div class="container-wide relative z-10">
        <div class="lg:grid lg:grid-cols-12 lg:gap-20 items-start">
            <!-- Left: Contact Form -->
            <div class="lg:col-span-7 bg-white p-10 md:p-16 rounded-[3rem] shadow-2xl border border-mcc-slate-100">
                <h2 class="text-3xl font-bold text-mcc-slate-900 mb-10">{{ __('Send us a Message') }}</h2>
                <form action="#" method="POST" class="space-y-8">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <label for="name" class="text-xs font-bold text-mcc-slate-500 uppercase tracking-widest">{{ __('Full Name') }}</label>
                            <input type="text" name="name" id="name" required class="block w-full px-6 py-4 bg-mcc-slate-50 border border-mcc-slate-100 rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 focus:bg-white transition-all outline-none" placeholder="e.g. John Doe">
                        </div>
                        <div class="space-y-2">
                            <label for="email" class="text-xs font-bold text-mcc-slate-500 uppercase tracking-widest">{{ __('Email Address') }}</label>
                            <input type="email" name="email" id="email" required class="block w-full px-6 py-4 bg-mcc-slate-50 border border-mcc-slate-100 rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 focus:bg-white transition-all outline-none" placeholder="e.g. john@example.com">
                        </div>
                    </div>
                    
                    <div class="space-y-2">
                        <label for="subject" class="text-xs font-bold text-mcc-slate-500 uppercase tracking-widest">{{ __('Subject') }}</label>
                        <select id="subject" name="subject" class="block w-full px-6 py-4 bg-mcc-slate-50 border border-mcc-slate-100 rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 focus:bg-white transition-all outline-none appearance-none">
                            <option>{{ __('General Inquiry') }}</option>
                            <option>{{ __('Project Partnership') }}</option>
                            <option>{{ __('Investment Opportunities') }}</option>
                            <option>{{ __('Career') }}</option>
                        </select>
                    </div>
                    
                    <div class="space-y-2">
                        <label for="message" class="text-xs font-bold text-mcc-slate-500 uppercase tracking-widest">{{ __('Your Message') }}</label>
                        <textarea id="message" name="message" rows="5" required class="block w-full px-6 py-4 bg-mcc-slate-50 border border-mcc-slate-100 rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 focus:bg-white transition-all outline-none resize-none" placeholder="{{ __('How can we help you?') }}"></textarea>
                    </div>
                    
                    <button type="submit" class="btn-corporate w-full bg-mcc-blue-600 text-white hover:bg-mcc-blue-700 shadow-mcc-blue-600/30 justify-center py-5">
                        {{ __('Send Message') }}
                        <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </form>
            </div>
            
            <!-- Right: Office Info -->
            <div class="lg:col-span-5 mt-16 lg:mt-0 space-y-12">
                <div class="space-y-10">
                    <h2 class="text-3xl font-bold text-mcc-slate-900">{{ __('Our Headquarters') }}</h2>
                    
                    <!-- Nigeria -->
                    <div class="group flex items-start p-8 bg-white rounded-3xl border border-mcc-slate-100 shadow-sm transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                        <div class="w-14 h-14 bg-mcc-blue-50 rounded-2xl flex items-center justify-center text-mcc-blue-600 group-hover:bg-mcc-blue-600 group-hover:text-white transition-colors duration-500">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div class="ml-6 space-y-2">
                            <h3 class="text-xl font-bold text-mcc-slate-900">{{ __('Nigeria HQ') }}</h3>
                            <p class="text-mcc-slate-500 text-sm leading-relaxed">{{ __('Plot 123, Diplomatic Drive, Central Business District, Abuja, Nigeria.') }}</p>
                            <p class="text-mcc-blue-600 font-bold text-sm">+234 800 000 0000</p>
                        </div>
                    </div>
                    
                    <!-- China -->
                    <div class="group flex items-start p-8 bg-white rounded-3xl border border-mcc-slate-100 shadow-sm transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                        <div class="w-14 h-14 bg-mcc-blue-50 rounded-2xl flex items-center justify-center text-mcc-blue-600 group-hover:bg-mcc-blue-600 group-hover:text-white transition-colors duration-500">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div class="ml-6 space-y-2">
                            <h3 class="text-xl font-bold text-mcc-slate-900">{{ __('China HQ') }}</h3>
                            <p class="text-mcc-slate-500 text-sm leading-relaxed">{{ __('Building A, Fortune Plaza, Chaoyang District, Beijing, China.') }}</p>
                            <p class="text-mcc-blue-600 font-bold text-sm">+86 10 0000 0000</p>
                        </div>
                    </div>
                </div>

                <!-- Global Network Section -->
                <div class="bg-mcc-slate-900 rounded-[2.5rem] p-10 text-white relative overflow-hidden">
                    <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-white/5 rounded-full scale-150"></div>
                    <h3 class="text-mcc-gold text-[10px] font-bold uppercase tracking-[0.2em] mb-6">{{ __('Partnership') }}</h3>
                    <p class="text-lg font-light leading-relaxed mb-8">
                        {{ __('We are always looking for significant developmental partnerships in Africa and Asia. Let\'s discuss how we can build together.') }}
                    </p>
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-mcc-gold" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                        </div>
                        <span class="text-sm font-bold tracking-widest">partners@mcc.com</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
