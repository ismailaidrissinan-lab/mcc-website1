<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(9);
        return view('public.news.index', compact('articles'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $recentArticles = Article::where('id', '!=', $article->id)->latest()->take(3)->get();
        return view('public.news.show', compact('article', 'recentArticles'));
    }
}
