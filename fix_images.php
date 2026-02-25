<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

foreach (\App\Models\Project::all() as $p) {
    if (strpos($p->image_path, 'unsplash') !== false) {
        $p->image_path = null;
        $p->save();
    }
}
echo "Cleaned DB Unsplash URLs from Projects.\n";
