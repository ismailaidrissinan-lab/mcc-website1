<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\ProjectImage;

class ProjectGallerySeeder extends Seeder
{
    public function run(): void
    {
        $projects = Project::latest()->take(3)->get();

        if ($projects->count() === 0) {
            $this->command->warn('No projects found to seed images for.');
            return;
        }

        foreach ($projects as $project) {
            // Add 3-5 images per project
            $count = rand(3, 5);

            for ($i = 0; $i < $count; $i++) {
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => "https://picsum.photos/seed/{$project->id}_{$i}/1200/800",
                    'caption' => 'Construction phase ' . ($i + 1) . ' of ' . $project->title,
                ]);
            }
        }

        $this->command->info('Successfully seeded gallery images for ' . $projects->count() . ' projects.');
    }
}
