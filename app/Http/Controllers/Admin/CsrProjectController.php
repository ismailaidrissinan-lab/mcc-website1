<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CsrProjectController extends Controller
{
    public function index()
    {
        $projects = \App\Models\CsrProject::latest()->paginate(10);
        return view('admin.csr.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.csr.form');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'content' => 'required|string',
            'location' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'published_at' => 'required|date',
        ]);

        $data['slug'] = \Illuminate\Support\Str::slug($request->title);
        
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('csr', 'public');
        }

        \App\Models\CsrProject::create($data);

        return redirect()->route('admin.csr.index')->with('success', 'CSR Project created successfully.');
    }

    public function edit($id)
    {
        $project = \App\Models\CsrProject::findOrFail($id);
        return view('admin.csr.form', compact('project'));
    }

    public function update(\Illuminate\Http\Request $request, $id)
    {
        $project = \App\Models\CsrProject::findOrFail($id);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'content' => 'required|string',
            'location' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'published_at' => 'required|date',
        ]);

        $data['slug'] = \Illuminate\Support\Str::slug($request->title);
        
        if ($request->hasFile('image')) {
            if ($project->image_path) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($project->image_path);
            }
            $data['image_path'] = $request->file('image')->store('csr', 'public');
        }

        $project->update($data);

        return redirect()->route('admin.csr.index')->with('success', 'CSR Project updated successfully.');
    }

    public function destroy($id)
    {
        $project = \App\Models\CsrProject::findOrFail($id);
        if ($project->image_path) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($project->image_path);
        }
        $project->delete();
        return redirect()->route('admin.csr.index')->with('success', 'CSR Project deleted successfully.');
    }
}
