<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Sector;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::with('sector');

        if ($request->has('sector')) {
            $query->whereHas('sector', function($q) use ($request) {
                $q->where('slug', $request->sector);
            });
        }

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $projects = $query->latest()->paginate(12);
        $sectors = Sector::all();

        return view('public.projects.index', compact('projects', 'sectors'));
    }

    public function show(Project $project)
    {
        $project->load(['sector', 'images']);
        return view('public.projects.show', compact('project'));
    }
}
