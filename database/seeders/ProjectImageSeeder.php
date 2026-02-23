<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Database\Seeder;

class ProjectImageSeeder extends Seeder
{
    public function run(): void
    {
        $projects = Project::all();

        foreach ($projects as $project) {
            // Add 2-3 gallery images per project
            $count = rand(2, 4);
            for ($i = 1; $i <= $count; $i++) {
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => null, // We'll rely on our UI's fallback Unsplash logic if needed, 
                                         // or just leave null to show the gallery structure
                    'caption' => 'Construction progress - Phase ' . $i,
                ]);
            }
        }
    }
}
