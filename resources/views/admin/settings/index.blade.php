@extends('layouts.admin')

@section('title', __('Global Site Settings'))

@section('content')
    <div class="max-w-5xl mx-auto" x-data="{ activeTab: 'homepage' }">
        <div class="mb-10 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-black text-mcc-slate-900 tracking-tight uppercase">{{ __('Site Configuration') }}
                </h2>
                <p class="text-mcc-slate-500 text-sm font-medium mt-1">
                    {{ __('Manage global text, images, and contact information') }}</p>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-xl border border-mcc-slate-100 overflow-hidden">
            <!-- Tabs -->
            <div class="flex border-b border-mcc-slate-50 bg-mcc-slate-50/50 p-2">
                <button @click="activeTab = 'homepage'"
                    :class="activeTab === 'homepage' ? 'bg-white shadow-sm text-mcc-blue-600' : 'text-mcc-slate-400 hover:text-mcc-slate-600'"
                    class="px-8 py-4 text-xs font-bold uppercase tracking-widest rounded-2xl transition-all">
                    {{ __('Homepage & Branding') }}
                </button>
                <button @click="activeTab = 'contact'"
                    :class="activeTab === 'contact' ? 'bg-white shadow-sm text-mcc-blue-600' : 'text-mcc-slate-400 hover:text-mcc-slate-600'"
                    class="px-8 py-4 text-xs font-bold uppercase tracking-widest rounded-2xl transition-all">
                    {{ __('Contact Info') }}
                </button>
                <button @click="activeTab = 'social'"
                    :class="activeTab === 'social' ? 'bg-white shadow-sm text-mcc-blue-600' : 'text-mcc-slate-400 hover:text-mcc-slate-600'"
                    class="px-8 py-4 text-xs font-bold uppercase tracking-widest rounded-2xl transition-all">
                    {{ __('Social Links') }}
                </button>
            </div>

            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="p-10">
                @csrf

                <!-- Homepage Tab -->
                <div x-show="activeTab === 'homepage'" class="space-y-10"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        <div class="space-y-4">
                            <label
                                class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest">{{ __('Hero Banner Image') }}</label>
                            <div
                                class="relative group aspect-video bg-mcc-slate-50 rounded-3xl overflow-hidden border-2 border-dashed border-mcc-slate-200 hover:border-mcc-blue-400 transition-colors">
                                @if(isset($settings['hero_image']))
                                    <img src="{{ asset('storage/' . ltrim($settings['hero_image'], '/')) }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <div class="absolute inset-0 flex items-center justify-center text-mcc-slate-300">
                                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                @endif
                                <input type="file" name="hero_image" class="absolute inset-0 opacity-0 cursor-pointer">
                            </div>
                            <p class="text-[10px] text-mcc-slate-400 font-bold uppercase tracking-widest">
                                {{ __('Recommended: 1920x1080px (Max 2MB)') }}</p>
                        </div>

                        <div class="space-y-6">
                            <div class="space-y-3">
                                <label
                                    class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest">{{ __('Hero Heading') }}</label>
                                <input type="text" name="hero_title" value="{{ $settings['hero_title'] ?? '' }}"
                                    class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-bold text-mcc-slate-900"
                                    placeholder="Engineering the Future">
                            </div>
                            <div class="space-y-3">
                                <label
                                    class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest">{{ __('Hero Description') }}</label>
                                <textarea name="hero_description" rows="3"
                                    class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-medium text-mcc-slate-900"
                                    placeholder="A brief overview for the home banner...">{{ $settings['hero_description'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="pt-8 border-t border-mcc-slate-50">
                        <div class="space-y-3">
                            <label
                                class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest">{{ __('Site Tagline') }}</label>
                            <input type="text" name="site_tagline" value="{{ $settings['site_tagline'] ?? '' }}"
                                class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-bold text-mcc-slate-900"
                                placeholder="Infrastructure & Investment">
                        </div>
                    </div>
                </div>

                <!-- Contact Tab -->
                <div x-show="activeTab === 'contact'" class="space-y-8"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-3">
                            <label
                                class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest">{{ __('Primary Phone') }}</label>
                            <input type="text" name="contact_phone" value="{{ $settings['contact_phone'] ?? '' }}"
                                class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-bold text-mcc-slate-900">
                        </div>
                        <div class="space-y-3">
                            <label
                                class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest">{{ __('Primary Email') }}</label>
                            <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? '' }}"
                                class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-bold text-mcc-slate-900">
                        </div>
                    </div>
                    <div class="space-y-3">
                        <label
                            class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest">{{ __('Office Address (Nigeria)') }}</label>
                        <textarea name="contact_address_ng" rows="2"
                            class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-bold text-mcc-slate-900">{{ $settings['contact_address_ng'] ?? '' }}</textarea>
                    </div>
                    <div class="space-y-3">
                        <label
                            class="block text-[10px] font-black text-mcc-slate-400 uppercase tracking-widest">{{ __('Office Address (China)') }}</label>
                        <textarea name="contact_address_cn" rows="2"
                            class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-bold text-mcc-slate-900">{{ $settings['contact_address_cn'] ?? '' }}</textarea>
                    </div>
                </div>

                <!-- Social Tab -->
                <div x-show="activeTab === 'social'" class="space-y-6" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4">
                    @foreach(['linkedin', 'twitter', 'facebook', 'instagram'] as $platform)
                        <div class="flex items-center space-x-6">
                            <div
                                class="w-12 h-12 bg-mcc-slate-50 rounded-2xl flex items-center justify-center text-mcc-slate-400">
                                <i class="fab fa-{{ $platform }} text-lg"></i>
                            </div>
                            <div class="flex-1">
                                <input type="url" name="social_{{ $platform }}"
                                    value="{{ $settings['social_' . $platform] ?? '' }}"
                                    class="w-full px-6 py-4 bg-mcc-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-mcc-blue-600 transition-all font-bold text-mcc-slate-900"
                                    placeholder="https://{{ $platform }}.com/mccltd">
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-12 pt-8 border-t border-mcc-slate-50 flex justify-end">
                    <button type="submit"
                        class="px-12 py-4 bg-mcc-blue-900 text-white font-black uppercase tracking-[0.2em] rounded-2xl shadow-xl hover:bg-black transition-all">
                        {{ __('Save Changes') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection