<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Award;
use Illuminate\Support\Facades\Storage;

class AwardController extends Controller
{
    public function index()
    {
        $awards = Award::orderBy('year', 'desc')->paginate(10);
        return view('admin.awards.index', compact('awards'));
    }

    public function create()
    {
        return view('admin.awards.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'year' => 'nullable|integer',
            'type' => 'required|in:award,csr,donation',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('awards', 'public');
        }

        Award::create($validated);

        return redirect()->route('admin.awards.index')->with('success', 'Award created successfully.');
    }

    public function edit(Award $award)
    {
        return view('admin.awards.edit', compact('award'));
    }

    public function update(Request $request, Award $award)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'year' => 'nullable|integer',
            'type' => 'required|in:award,csr,donation',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($award->image_path) {
                Storage::disk('public')->delete($award->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('awards', 'public');
        }

        $award->update($validated);

        return redirect()->route('admin.awards.index')->with('success', 'Award updated successfully.');
    }

    public function destroy(Award $award)
    {
        if ($award->image_path) {
            Storage::disk('public')->delete($award->image_path);
        }
        $award->delete();
        return redirect()->route('admin.awards.index')->with('success', 'Award deleted successfully.');
    }
}
