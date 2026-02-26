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
        $query = Project::with(['sector', 'state', 'images']);

        if ($request->has('sector')) {
            $query->whereHas('sector', function ($q) use ($request) {
                $q->where('slug', $request->sector);
            });
        }

        if ($request->has('state')) {
            $query->whereHas('state', function ($q) use ($request) {
                $q->where('slug', $request->state);
            });
        }

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhereHas('sector', function ($sq) use ($search) {
                      $sq->where('name', 'like', "%{$search}%");
                  })
                  ->orWhereHas('state', function ($sq) use ($search) {
                      $sq->where('name', 'like', "%{$search}%");
                  });
            });
        }

        $projects = $query->latest()->get();

        // Calculate Statistics from ALL projects (ignoring status filter)
        // so that clicking a status card doesn't change the counts of others
        $statsQuery = Project::with(['sector', 'state']);

        if ($request->has('sector')) {
            $statsQuery->whereHas('sector', function ($q) use ($request) {
                $q->where('slug', $request->sector);
            });
        }

        if ($request->has('state')) {
            $statsQuery->whereHas('state', function ($q) use ($request) {
                $q->where('slug', $request->state);
            });
        }

        if ($request->filled('search')) {
            $search = $request->input('search');
            $statsQuery->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhereHas('sector', function ($sq) use ($search) {
                      $sq->where('name', 'like', "%{$search}%");
                  })
                  ->orWhereHas('state', function ($sq) use ($search) {
                      $sq->where('name', 'like', "%{$search}%");
                  });
            });
        }

        $allForStats = $statsQuery->get();

        $stats = [
            'total' => $allForStats->count(),
            'operational' => $allForStats->where('status', 'operational')->count(),
            'completed' => $allForStats->where('status', 'completed')->count(),
            'ongoing' => $allForStats->where('status', 'ongoing')->count(),
            'suspended' => $allForStats->where('status', 'suspended')->count(),
        ];

        $sectors = Sector::all();
        $states = \App\Models\State::all();
        $statesWithProjects = $projects->pluck('state.slug')->filter()->unique()->values()->toArray();

        if ($request->ajax()) {
            $selectedStatus = $request->status;
            return response()->json([
                'list' => view('public.projects._list', compact('projects'))->render(),
                'stats' => view('public.projects._stats', compact('stats', 'selectedStatus'))->render(),
                'statesWithProjects' => $statesWithProjects
            ]);
        }

        $selectedStatus = $request->status;
        return view('public.projects.index', compact('projects', 'sectors', 'states', 'statesWithProjects', 'stats', 'selectedStatus'));
    }

    public function show(Project $project)
    {
        $project->load(['sector', 'images']);
        return view('public.projects.show', compact('project'));
    }
}
