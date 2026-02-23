<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Sector;

class SectorController extends Controller
{
    public function show(Sector $sector)
    {
        $sector->load('projects');
        return view('public.sectors.show', compact('sector'));
    }
}
