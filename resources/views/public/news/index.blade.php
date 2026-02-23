@extends('layouts.app')

@section('title', __('Insights & News'))

@section('content')
<!-- Insights Hero -->
<div class="relative pt-32 pb-24 bg-mcc-slate-900 overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=2000&q=80" class="w-full h-full object-cover">
    </div>
    <div class="container-wide relative z-10 text-center">
        <div class="inline-flex items-center space-x-2 px-3 py-1 bg-mcc-gold/20 border border-mcc-gold/30 rounded-full mb-6">
            <span class="text-mcc-gold text-[10px] font-bold uppercase tracking-widest">{{ __('Corporate Intelligence') }}</span>
        </div>
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-8 tracking-tight">
            {{ __('Corporate Insights & News') }}
        </h1>
        <p class="text-xl text-mcc-blue-100 max-w-2xl mx-auto font-light leading-relaxed">
            {{ __('Thought leadership, institutional updates, and strategic announcements from across the global MCC network.') }}
        </p>
    </div>
</div>

<!-- News Grid -->
<section class="section-padding bg-mcc-slate-50">
    <div class="container-wide">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($articles as $article)
            <div class="group flex flex-col bg-white rounded-3xl overflow-hidden border border-mcc-slate-100 shadow-sm hover:shadow-2xl transition-all duration-500" reveal>
                <div class="aspect-[16/9] overflow-hidden relative">
                    <img src="{{ $article->image_path ? asset('storage/'.$article->image_path) : 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800&q=80' }}" 
                         alt="{{ $article->title }}" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute top-4 left-4 bg-mcc-blue-900/80 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full">
                        {{ $article->published_at->format('M d, Y') }}
                    </div>
                </div>
                <div class="p-8 flex-grow flex flex-col">
                    <h4 class="text-xl font-bold text-mcc-slate-900 mb-4 line-clamp-2 min-h-[3.5rem] group-hover:text-mcc-blue-600 transition-colors">
                        {{ $article->title }}
                    </h4>
                    <p class="text-mcc-slate-500 text-sm font-light leading-relaxed mb-8 line-clamp-3">
                        {{ $article->summary }}
                    </p>
                    <div class="mt-auto pt-6 border-t border-mcc-slate-50">
                        <a href="{{ route('articles.show', $article->slug) }}" class="inline-flex items-center text-xs font-bold text-mcc-blue-600 uppercase tracking-widest hover:text-mcc-blue-900 transition-colors">
                            {{ __('Read Full Article') }}
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-24 text-center">
                <p class="text-mcc-slate-400 italic">{{ __('No news articles available at the moment.') }}</p>
            </div>
            @endforelse
        </div>

        <div class="mt-20">
            {{ $articles->links() }}
        </div>
    </div>
</section>
@endsection
