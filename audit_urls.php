<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "SECTORS:" . PHP_EOL;
foreach (App\Models\Sector::all() as $s) {
    echo "Sector: {$s->name} | Image Path: {$s->image_path} | Generated URL: {$s->image_url}" . PHP_EOL;
}

echo PHP_EOL . "PROJECTS:" . PHP_EOL;
foreach (App\Models\Project::all() as $p) {
    echo "Project: {$p->title} | Image Path: {$p->image_path} | Generated URL: {$p->image_url}" . PHP_EOL;
}
