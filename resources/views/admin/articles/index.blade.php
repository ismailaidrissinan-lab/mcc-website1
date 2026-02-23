@extends('layouts.app')

@section('title', 'Manage News Articles')

@section('content')
<div class="bg-mcc-slate-900 pt-32 pb-12">
    <div class="container-wide">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2">News Articles</h1>
                <p class="text-mcc-blue-200">Manage corporate insights and announcements</p>
            </div>
            <a href="{{ route('admin.articles.create') }}" class="btn-corporate bg-mcc-gold text-mcc-slate-900 hover:bg-white">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Create New Article
            </a>
        </div>
    </div>
</div>

<div class="py-12 bg-mcc-slate-50 min-h-screen">
    <div class="container-wide">
        @if(session('success'))
        <div class="mb-8 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-lg shadow-sm">
            {{ session('success') }}
        </div>
        @endif

        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-mcc-slate-100">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-mcc-slate-900 text-white">
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest">Image</th>
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest">Title</th>
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest">Published At</th>
                            <th class="px-8 py-5 text-xs font-bold uppercase tracking-widest text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-mcc-slate-100">
                        @forelse($articles as $article)
                        <tr class="hover:bg-mcc-blue-50/30 transition-colors">
                            <td class="px-8 py-5">
                                <div class="w-20 h-12 rounded-lg bg-mcc-slate-100 overflow-hidden border border-mcc-slate-200">
                                    <img src="{{ $article->image_path ? asset('storage/'.$article->image_path) : 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=400&q=80' }}" 
                                         class="w-full h-full object-cover">
                                </div>
                            </td>
                            <td class="px-8 py-5">
                                <div class="font-bold text-mcc-slate-900">{{ $article->title }}</div>
                                <div class="text-xs text-mcc-slate-500 mt-1">/insights/{{ $article->slug }}</div>
                            </td>
                            <td class="px-8 py-5">
                                <span class="text-sm text-mcc-slate-600">{{ $article->published_at->format('M d, Y') }}</span>
                            </td>
                            <td class="px-8 py-5 text-right">
                                <div class="flex justify-end space-x-3">
                                    <a href="{{ route('admin.articles.edit', $article) }}" class="p-2 text-mcc-blue-600 hover:bg-mcc-blue-50 rounded-lg transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-8 py-12 text-center text-mcc-slate-400 italic">No articles found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($articles->hasPages())
            <div class="px-8 py-6 bg-mcc-slate-50 border-t border-mcc-slate-100">
                {{ $articles->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
