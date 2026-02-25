<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Sector;
use App\Models\Project;

class PageController extends Controller
{
    public function home()
    {
        $sectors = Sector::all();
        $featuredProjects = Project::with('sector')->latest()->take(6)->get();
        $latestArticles = \App\Models\Article::latest()->take(3)->get();
        return view('public.home', compact('sectors', 'featuredProjects', 'latestArticles'));
    }

    public function about()
    {
        return view('public.about');
    }

    public function gmd()
    {
        return view('public.gmd');
    }

    public function contact()
    {
        return view('public.contact');
    }

    public function awards()
    {
        $awards = \App\Models\Award::orderBy('year', 'desc')->get();
        return view('public.awards', compact('awards'));
    }

    public function training()
    {
        $programs = \App\Models\TrainingProgram::latest()->get();
        return view('public.training', compact('programs'));
    }

    public function services()
    {
        $sectors = Sector::withCount('projects')->get();
        return view('public.services', compact('sectors'));
    }

    public function csr()
    {
        $projects = \App\Models\CsrProject::latest()->get();
        return view('public.csr', compact('projects'));
    }

    public function csrShow($slug)
    {
        $project = \App\Models\CsrProject::where('slug', $slug)->firstOrFail();
        return view('public.csr.show', compact('project'));
    }

    public function investors()
    {
        $documents = \App\Models\InvestorDocument::all()->groupBy('category');
        return view('public.investors', compact('documents'));
    }

    public function careers()
    {
        $jobs = \App\Models\JobPosting::where('is_active', true)->latest()->get();
        return view('public.careers', compact('jobs'));
    }
}
