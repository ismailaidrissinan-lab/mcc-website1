<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$urls = [];

// 1. Static images
$urls[] = public_path('images/mcc-logo.png');
$urls[] = public_path('images/GMD.jpeg');

// 2. Sectors
foreach (\App\Models\Sector::all() as $sector) {
    echo "Sector {$sector->id}: " . $sector->image_url . "\n";
}

// 3. Featured Projects
foreach (\App\Models\Project::with('sector')->latest()->take(6)->get() as $project) {
    echo "Project {$project->id}: " . $project->image_url . "\n";
}

// 4. Articles
foreach (\App\Models\Article::latest()->take(3)->get() as $article) {
    echo "Article {$article->id}: " . $article->image_url . "\n";
}

// Global Sectors
foreach (\App\Models\Sector::all() as $sector) {
    // Already covered
}

echo "--- FILE SIZES ---\n";
// Logo
if (file_exists(public_path('images/mcc-logo.png'))) {
    echo "mcc-logo.png: " . round(filesize(public_path('images/mcc-logo.png')) / 1024 / 1024, 2) . " MB\n";
}
if (file_exists(public_path('images/GMD.jpeg'))) {
    echo "GMD.jpeg: " . round(filesize(public_path('images/GMD.jpeg')) / 1024 / 1024, 2) . " MB\n";
}

// Check if any URL contains unsplash or http
