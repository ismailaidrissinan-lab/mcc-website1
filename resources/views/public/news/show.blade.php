@extends('layouts.app')

@section('title', $article->title)

@section('content')
<!-- Article Hero -->
<div class="relative pt-48 pb-64 bg-mcc-slate-900 overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="{{ $article->image_path ? asset('storage/'.$article->image_path) : 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=2000&q=80' }}" 
             class="w-full h-full object-cover opacity-30 transform scale-105">
        <div class="absolute inset-0 bg-gradient-to-b from-mcc-slate-900/50 via-mcc-slate-900 to-white"></div>
    </div>

    <div class="container-wide relative z-10">
        <div class="max-w-4xl">
            <div class="inline-flex items-center space-x-3 mb-8">
                <span class="w-12 h-[1px] bg-mcc-gold"></span>
                <span class="text-mcc-gold text-xs font-bold uppercase tracking-[0.3em]">{{ __('News & Insights') }}</span>
                <span class="text-white/40 text-[10px] border border-white/20 px-3 py-1 rounded-full uppercase tracking-widest ml-4">
                    {{ $article->published_at->format('M d, Y') }}
                </span>
            </div>
            <h1 class="text-4xl md:text-6xl font-bold text-white tracking-tight leading-tight">
                {{ $article->title }}
            </h1>
        </div>
    </div>
</div>

<!-- Article Core -->
<section class="-mt-32 relative z-20 pb-32">
    <div class="container-wide">
        <div class="lg:grid lg:grid-cols-12 lg:gap-16">
            <!-- Left: Main Content -->
            <article class="lg:col-span-8">
                <div class="bg-white p-12 md:p-16 rounded-[2.5rem] shadow-2xl border border-mcc-slate-100">
                    <div class="prose prose-xl prose-mcc max-w-none">
                        <p class="text-xl font-medium text-mcc-slate-900 leading-relaxed mb-12 italic border-l-4 border-mcc-gold pl-8">
                            {{ $article->summary }}
                        </p>
                        
                        <div class="text-mcc-slate-700 leading-relaxed space-y-8">
                            {!! nl2br(e($article->content)) !!}
                        </div>
                    </div>

                    <div class="mt-16 pt-12 border-t border-mcc-slate-100 flex flex-wrap items-center justify-between gap-6">
                        <div class="flex items-center space-x-4">
                            <span class="text-xs font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Share') }}</span>
                            <!-- Share buttons could go here -->
                        </div>
                        <a href="{{ route('articles.index') }}" class="btn-corporate bg-mcc-slate-900 text-white hover:bg-mcc-blue-600">
                            {{ __('Back to Insights') }}
                        </a>
                    </div>
                </div>
            </article>

            <!-- Right: Related & Contact -->
            <aside class="lg:col-span-4 mt-16 lg:mt-0">
                <div class="sticky top-32 space-y-12">
                    <!-- Recent Stories -->
                    <div>
                        <h3 class="text-xl font-bold text-mcc-slate-900 mb-8 border-b border-mcc-slate-100 pb-4">{{ __('Related Stories') }}</h3>
                        <div class="space-y-8">
                            @foreach($recentArticles as $recent)
                            <a href="{{ route('articles.show', $recent->slug) }}" class="group block">
                                <span class="text-[10px] font-bold text-mcc-gold uppercase tracking-widest block mb-2">{{ $recent->published_at->format('M d, Y') }}</span>
                                <h4 class="text-mcc-slate-900 font-bold group-hover:text-mcc-blue-600 transition-colors line-clamp-2 leading-snug">
                                    {{ $recent->title }}
                                </h4>
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- CTA -->
                    <div class="bg-mcc-blue-900 rounded-3xl p-10 text-white relative overflow-hidden shadow-2xl shadow-mcc-blue-900/20">
                        <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/5 rounded-full scale-150"></div>
                        <h4 class="text-xl font-bold mb-4 relative z-10">{{ __('Corporate Communications') }}</h4>
                        <p class="text-mcc-blue-100 text-sm leading-relaxed mb-8 relative z-10 font-light">
                            {{ __('For media inquiries regarding Mutual Commitment Company Ltd, please contact our global press office.') }}
                        </p>
                        <a href="{{ route('contact') }}" class="btn-corporate w-full bg-mcc-gold text-mcc-slate-900 border-mcc-gold hover:bg-white hover:border-white justify-center">
                            {{ __('Media Inquiry') }}
                        </a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection
