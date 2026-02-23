<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => \App\Models\Project::count(),
            'sectors' => \App\Models\Sector::count(),
            'insights' => \App\Models\Article::count(),
            'jobs' => \App\Models\JobPosting::where('is_active', true)->count(),
            'csr' => \App\Models\CsrProject::count(),
        ];
        
        $recentProjects = \App\Models\Project::latest()->take(5)->get();
        return view('admin.dashboard', compact('stats', 'recentProjects'));
    }
}
