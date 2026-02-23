<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Sector;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('sector')->latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $sectors = Sector::all();
        return view('admin.projects.form', compact('sectors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sector_id' => 'required|exists:sectors,id',
            'location' => 'nullable|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'status' => 'required|in:ongoing,completed',
            'image_path' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('projects', 'public');
        }

        $validated['slug'] = Str::slug($validated['title']);
        
        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        $sectors = Sector::all();
        return view('admin.projects.form', compact('project', 'sectors'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sector_id' => 'required|exists:sectors,id',
            'location' => 'nullable|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'status' => 'required|in:ongoing,completed',
            'image_path' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('projects', 'public');
        }

        $validated['slug'] = Str::slug($validated['title']);
        
        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
