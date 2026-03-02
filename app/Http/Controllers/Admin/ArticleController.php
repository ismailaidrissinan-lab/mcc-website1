<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(15);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'gallery_images.*' => 'nullable|image|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['published_at'] = $request->published_at ?? now();

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('articles', 'public');
        }

        $article = Article::create($data);

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('articles/gallery', 'public');
                $article->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('admin.articles.index')->with('success', 'Article created successfully.');
    }

    public function edit(Article $article)
    {
        $article->load('images');
        return view('admin.articles.form', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'gallery_images.*' => 'nullable|image|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            if ($article->image_path) {
                Storage::disk('public')->delete($article->image_path);
            }
            $data['image_path'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($data);

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('articles/gallery', 'public');
                $article->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('admin.articles.index')->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article)
    {
        if ($article->image_path) {
            Storage::disk('public')->delete($article->image_path);
        }

        foreach ($article->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Article deleted successfully.');
    }

    public function destroyImage(ArticleImage $image)
    {
        Storage::disk('public')->delete($image->image_path);
        $image->delete();
        return back()->with('success', 'Image removed from gallery.');
    }
}
