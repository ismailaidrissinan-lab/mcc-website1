<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobPostingController extends Controller
{
    public function index()
    {
        $jobs = \App\Models\JobPosting::latest()->paginate(10);
        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('admin.jobs.form');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'required|string',
            'location' => 'required|string',
            'type' => 'required|string',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'is_active' => 'boolean',
            'published_at' => 'required|date',
        ]);

        $data['slug'] = \Illuminate\Support\Str::slug($request->title);
        $data['is_active'] = $request->has('is_active');

        \App\Models\JobPosting::create($data);

        return redirect()->route('admin.jobs.index')->with('success', 'Job posting created successfully.');
    }

    public function edit($id)
    {
        $job = \App\Models\JobPosting::findOrFail($id);
        return view('admin.jobs.form', compact('job'));
    }

    public function update(\Illuminate\Http\Request $request, $id)
    {
        $job = \App\Models\JobPosting::findOrFail($id);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'required|string',
            'location' => 'required|string',
            'type' => 'required|string',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'is_active' => 'boolean',
            'published_at' => 'required|date',
        ]);

        $data['slug'] = \Illuminate\Support\Str::slug($request->title);
        $data['is_active'] = $request->has('is_active');

        $job->update($data);

        return redirect()->route('admin.jobs.index')->with('success', 'Job posting updated successfully.');
    }

    public function destroy($id)
    {
        $job = \App\Models\JobPosting::findOrFail($id);
        $job->delete();
        return redirect()->route('admin.jobs.index')->with('success', 'Job posting deleted successfully.');
    }
}
