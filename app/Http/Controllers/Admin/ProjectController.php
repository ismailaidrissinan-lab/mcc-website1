<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Sector;
use App\Models\State;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::with(['sector', 'state'])->latest();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $projects = $query->paginate(20)->appends($request->query());

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $sectors = Sector::all();
        $states = State::orderBy('name')->get();
        return view('admin.projects.form', compact('sectors', 'states'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sector_id' => 'required|exists:sectors,id',
            'state_id' => 'nullable|exists:states,id',
            'location' => 'nullable|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'status' => 'required|in:ongoing,completed,operational,suspended',
            'award_date' => 'nullable|date',
            'completion_date' => 'nullable|date',
            'image_path' => 'nullable|image|max:1024',
            'gallery_images.*' => 'nullable|image|max:1024',
        ]);

        if ($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('projects');
        }

        $validated['slug'] = Str::slug($validated['title']);

        $project = Project::create($validated);

        // Handle multiple gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('projects/gallery');
                $project->images()->create([
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        $sectors = Sector::all();
        $states = State::orderBy('name')->get();
        $project->load('images');
        return view('admin.projects.form', compact('project', 'sectors', 'states'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sector_id' => 'required|exists:sectors,id',
            'state_id' => 'nullable|exists:states,id',
            'location' => 'nullable|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'status' => 'required|in:ongoing,completed,operational,suspended',
            'award_date' => 'nullable|date',
            'completion_date' => 'nullable|date',
            'image_path' => 'nullable|image|max:1024',
            'gallery_images.*' => 'nullable|image|max:1024',
        ]);

        if ($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('projects');
        } else {
            unset($validated['image_path']);
        }

        $validated['slug'] = Str::slug($validated['title']);

        $project->update($validated);

        // Handle multiple gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('projects/gallery');
                $project->images()->create([
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroyImage(ProjectImage $image)
    {
        $image->delete();
        return back()->with('success', 'Image removed successfully.');
    }

    public function import()
    {
        return view('admin.projects.import');
    }

    public function processImport(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt|max:10240',
        ]);

        $file = $request->file('csv_file');
        $rows = array_map('str_getcsv', file($file->getRealPath()));

        // First row is header
        $header = array_map('trim', array_map('strtolower', array_shift($rows)));

        $requiredColumns = ['title', 'sector', 'description', 'status'];
        $missingColumns = array_diff($requiredColumns, $header);
        if (!empty($missingColumns)) {
            return back()->withErrors(['csv_file' => 'Missing required columns: ' . implode(', ', $missingColumns)]);
        }

        $imported = 0;
        $errors = [];

        foreach ($rows as $index => $row) {
            $rowNumber = $index + 2; // +2 for 1-indexed + header row

            if (count($row) !== count($header)) {
                $errors[] = "Row {$rowNumber}: Column count mismatch.";
                continue;
            }

            $data = array_combine($header, $row);

            // Validate required fields
            if (empty($data['title']) || empty($data['description']) || empty($data['status'])) {
                $errors[] = "Row {$rowNumber}: Missing required data (title, description, or status).";
                continue;
            }

            // Match sector by name
            $sector = Sector::where('name', 'LIKE', '%' . trim($data['sector']) . '%')->first();
            if (!$sector) {
                $errors[] = "Row {$rowNumber}: Sector '{$data['sector']}' not found.";
                continue;
            }

            // Match state by name (optional)
            $stateId = null;
            if (!empty($data['state'])) {
                $state = State::where('name', 'LIKE', '%' . trim($data['state']) . '%')->first();
                $stateId = $state?->id;
            }

            // Validate status
            $validStatuses = ['ongoing', 'completed', 'operational', 'suspended'];
            $status = strtolower(trim($data['status']));
            if (!in_array($status, $validStatuses)) {
                $errors[] = "Row {$rowNumber}: Invalid status '{$data['status']}'. Must be one of: " . implode(', ', $validStatuses);
                continue;
            }

            Project::create([
                'title' => trim($data['title']),
                'slug' => Str::slug(trim($data['title'])),
                'sector_id' => $sector->id,
                'state_id' => $stateId,
                'location' => trim($data['location'] ?? ''),
                'description' => trim($data['description']),
                'status' => $status,
                'award_date' => !empty($data['award_date']) ? $data['award_date'] : null,
                'completion_date' => !empty($data['completion_date']) ? $data['completion_date'] : null,
            ]);

            $imported++;
        }

        $message = "{$imported} project(s) imported successfully.";
        if (!empty($errors)) {
            $message .= ' ' . count($errors) . ' row(s) had errors.';
            return redirect()->route('admin.projects.index')
                ->with('success', $message)
                ->withErrors($errors);
        }

        return redirect()->route('admin.projects.index')->with('success', $message);
    }

    public function export()
    {
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=projects_export_" . date('Y-m-d') . ".csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $columns = ['Title', 'Sector', 'State', 'Location', 'Status', 'Award Date', 'Completion Date', 'Description'];

        $callback = function () use ($columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            $projects = Project::with(['sector', 'state'])->get();

            foreach ($projects as $project) {
                fputcsv($file, [
                    $project->title,
                    $project->sector ? $project->sector->name : '',
                    $project->state ? $project->state->name : '',
                    $project->location,
                    ucfirst($project->status),
                    $project->award_date ? $project->award_date->format('Y-m-d') : '',
                    $project->completion_date ? $project->completion_date->format('Y-m-d') : '',
                    // Replacing newlines in description with spaces to prevent malformed CSV rows
                    str_replace(["\r", "\n"], ' ', strip_tags($project->description))
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
