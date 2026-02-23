<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TrainingProgram;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{
    public function index()
    {
        $programs = TrainingProgram::latest()->paginate(10);
        return view('admin.training.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.training.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('training', 'public');
        }

        TrainingProgram::create($validated);

        return redirect()->route('admin.training.index')->with('success', 'Training program created successfully.');
    }

    public function edit(TrainingProgram $training)
    {
        return view('admin.training.edit', compact('training'));
    }

    public function update(Request $request, TrainingProgram $training)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($training->image_path) {
                Storage::disk('public')->delete($training->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('training', 'public');
        }

        $training->update($validated);

        return redirect()->route('admin.training.index')->with('success', 'Training program updated successfully.');
    }

    public function destroy(TrainingProgram $training)
    {
        if ($training->image_path) {
            Storage::disk('public')->delete($training->image_path);
        }
        $training->delete();
        return redirect()->route('admin.training.index')->with('success', 'Training program deleted successfully.');
    }
}
