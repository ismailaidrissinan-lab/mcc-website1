<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

function audit_model($className)
{
    echo "Auditing {$className}:" . PHP_EOL;
    foreach ($className::all() as $item) {
        echo "- {$item->id}: {$item->image_path} -> {$item->image_url}" . PHP_EOL;
    }
}

audit_model(App\Models\Sector::class);
audit_model(App\Models\Project::class);
audit_model(App\Models\Article::class);
audit_model(App\Models\CsrProject::class);
