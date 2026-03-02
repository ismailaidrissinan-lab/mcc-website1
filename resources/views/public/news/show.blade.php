@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <!-- Article Hero -->
    <div class="relative pt-48 pb-64 bg-mcc-slate-900 overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ $article->image_url }}" class="w-full h-full object-cover opacity-30 transform scale-105">
            <div class="absolute inset-0 bg-gradient-to-b from-mcc-slate-900/50 via-mcc-slate-900 to-white"></div>
        </div>

        <div class="container-wide relative z-10">
            <div class="max-w-4xl">
                <div class="inline-flex items-center space-x-3 mb-8">
                    <span class="w-12 h-[1px] bg-mcc-gold"></span>
                    <span
                        class="text-mcc-gold text-xs font-bold uppercase tracking-[0.3em]">{{ __('News & Insights') }}</span>
                    <span
                        class="text-white/40 text-[10px] border border-white/20 px-3 py-1 rounded-full uppercase tracking-widest ml-4">
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
                            <p
                                class="text-xl font-medium text-mcc-slate-900 leading-relaxed mb-12 italic border-l-4 border-mcc-gold pl-8">
                                {{ $article->summary }}
                            </p>

                            <div class="text-mcc-slate-700 leading-relaxed space-y-8">
                                {!! nl2br(e($article->content)) !!}
                            </div>

                            @if($article->images->count() > 0)
                                <div class="mt-16 space-y-8">
                                    <h3 class="text-2xl font-bold text-mcc-slate-900 border-l-4 border-mcc-blue-600 pl-4">{{ __('Gallery') }}</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                        @foreach($article->images as $image)
                                            <div class="group relative aspect-[4/3] rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500">
                                                <img src="{{ asset('storage/'.$image->image_path) }}" 
                                                     alt="{{ $article->title }}" 
                                                     class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-8">
                                                    @if($image->caption)
                                                        <p class="text-white text-sm font-medium">{{ $image->caption }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div
                            class="mt-16 pt-12 border-t border-mcc-slate-100 flex flex-wrap items-center justify-between gap-6">
                            <div class="flex items-center space-x-4">
                                <span
                                    class="text-xs font-bold text-mcc-slate-400 uppercase tracking-widest">{{ __('Share') }}</span>
                                <div class="flex items-center space-x-2">
                                    <!-- Facebook -->
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                                       target="_blank" rel="noopener"
                                       class="w-10 h-10 rounded-full bg-mcc-slate-50 flex items-center justify-center text-mcc-slate-400 hover:bg-[#1877F2] hover:text-white transition-all shadow-sm">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                    </a>
                                    <!-- Twitter / X -->
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($article->title) }}" 
                                       target="_blank" rel="noopener"
                                       class="w-10 h-10 rounded-full bg-mcc-slate-50 flex items-center justify-center text-mcc-slate-400 hover:bg-black hover:text-white transition-all shadow-sm">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                    </a>
                                    <!-- LinkedIn -->
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}" 
                                       target="_blank" rel="noopener"
                                       class="w-10 h-10 rounded-full bg-mcc-slate-50 flex items-center justify-center text-mcc-slate-400 hover:bg-[#0077b5] hover:text-white transition-all shadow-sm">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                                    </a>
                                    <!-- WhatsApp -->
                                    <a href="https://api.whatsapp.com/send?text={{ urlencode($article->title . ' ' . request()->fullUrl()) }}" 
                                       target="_blank" rel="noopener"
                                       class="w-10 h-10 rounded-full bg-mcc-slate-50 flex items-center justify-center text-mcc-slate-400 hover:bg-[#25D366] hover:text-white transition-all shadow-sm">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                                    </a>
                                </div>
                            </div>
                            <a href="{{ route('articles.index') }}"
                                class="btn-corporate bg-mcc-slate-900 text-white hover:bg-mcc-blue-600">
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
                            <h3 class="text-xl font-bold text-mcc-slate-900 mb-8 border-b border-mcc-slate-100 pb-4">
                                {{ __('Related Stories') }}</h3>
                            <div class="space-y-8">
                                @foreach($recentArticles as $recent)
                                    <a href="{{ route('articles.show', $recent->slug) }}" class="group block">
                                        <span
                                            class="text-[10px] font-bold text-mcc-gold uppercase tracking-widest block mb-2">{{ $recent->published_at->format('M d, Y') }}</span>
                                        <h4
                                            class="text-mcc-slate-900 font-bold group-hover:text-mcc-blue-600 transition-colors line-clamp-2 leading-snug">
                                            {{ $recent->title }}
                                        </h4>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <!-- CTA -->
                        <div
                            class="bg-mcc-blue-900 rounded-3xl p-10 text-white relative overflow-hidden shadow-2xl shadow-mcc-blue-900/20">
                            <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/5 rounded-full scale-150"></div>
                            <h4 class="text-xl font-bold mb-4 relative z-10">{{ __('Corporate Communications') }}</h4>
                            <p class="text-mcc-blue-100 text-sm leading-relaxed mb-8 relative z-10 font-light">
                                {{ __('For media inquiries regarding Mutual Commitment Company Ltd, please contact our global press office.') }}
                            </p>
                            <a href="{{ route('contact') }}"
                                class="btn-corporate w-full bg-mcc-gold text-mcc-slate-900 border-mcc-gold hover:bg-white hover:border-white justify-center">
                                {{ __('Media Inquiry') }}
                            </a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection