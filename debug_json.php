<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$project = \App\Models\Project::first();
$modalData = [
    'title' => $project->title,
    'description' => $project->description,
    'sector' => $project->sector ? $project->sector->name : null,
    'status' => $project->status,
    'award_date' => $project->award_date ? $project->award_date->format("M Y") : "N/A",
    'location' => $project->location,
    'images' => $project->images->count() > 0 ? $project->images->map(fn($img) => $img->image_url)->toArray() : [$project->image_url],
];

echo "Blade Output (simulated):\n";
echo htmlspecialchars(json_encode($modalData), ENT_QUOTES, 'UTF-8');
echo "\n\n";
echo "Raw JSON:\n";
echo json_encode($modalData);
