<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "ARTICLES:" . PHP_EOL;
foreach (App\Models\Article::all() as $a) {
    echo "Article: {$a->title} | Image: {$a->image_path}" . PHP_EOL;
}

echo PHP_EOL . "CSR PROJECTS:" . PHP_EOL;
foreach (App\Models\CsrProject::all() as $c) {
    echo "CSR: {$c->title} | Image: {$c->image_path}" . PHP_EOL;
}
