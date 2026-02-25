<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

// Ensure articles directory exists
if (!Storage::disk('public')->exists('articles')) {
    Storage::disk('public')->makeDirectory('articles');
}

// Copy images from sectors to articles to use them without modifying sectors logic
$imagesToCopy = [
    'building-construction.png' => 'insight-construction.png',
    'power-renewable-energy.png' => 'insight-energy.png',
    'road-bridges.png' => 'insight-bridges.png',
    'healthcare.png' => 'insight-healthcare.png'
];

foreach ($imagesToCopy as $source => $dest) {
    if (Storage::disk('public')->exists('sectors/' . $source)) {
        Storage::disk('public')->copy('sectors/' . $source, 'articles/' . $dest);
    }
}

$articles = [
    [
        'title' => 'Pioneering Sustainable Construction Methods in West Africa',
        'summary' => 'MCC is at the forefront of introducing innovative, eco-friendly building materials to reduce the carbon footprint of massive infrastructure projects across the region.',
        'content' => '<p>In our ongoing commitment to a greener future, MCC has successfully integrated sustainable concrete alternatives in three of our latest mega-projects in Abuja and Lagos. This new mixture significantly reduces CO2 emissions during the curing process.</p><p>By collaborating with local suppliers and international environmental agencies, we are proving that rapid urbanization does not have to come at the cost of the environment. Our latest structural testing shows that these sustainable materials are not only greener but also more resilient against West Africa’s harsh weather conditions.</p>',
        'image_path' => 'articles/insight-construction.png',
        'published_at' => now()->subDays(2),
    ],
    [
        'title' => 'The Future of Renewable Energy: Our New Solar Farm Initiative',
        'summary' => 'A detailed look at how MCC’s latest renewable energy investments are set to power over 500,000 homes with clean, reliable solar energy.',
        'content' => '<p>Energy reliability remains a critical challenge for industrial growth. To address this, MCC’s energy division is breaking ground on a 150MW solar farm project. This facility will feature state-of-the-art photovoltaic tracking panels that optimize sun exposure throughout the day.</p><p>Scheduled for completion in 2027, the project is expected to create thousands of jobs during construction and provide a long-term, stable power grid for surrounding communities, fostering further economic development.</p>',
        'image_path' => 'articles/insight-energy.png',
        'published_at' => now()->subDays(5),
    ],
    [
        'title' => 'Bridging Communities rurally and globally: The Highway Expansion',
        'summary' => 'An inside look into the complex engineering behind our latest interstate highway and bridge expansion project, designed to connect remote communities to major trade hubs.',
        'content' => '<p>Transport infrastructure is the vital artery of economic prosperity. Our new multi-lane highway expansion project involves the construction of three major suspension bridges over challenging terrains. Using advanced seismic engineering techniques, these bridges are built to last over a century.</p><p>This ambitious endeavor will drastically cut supply chain logistics times, allowing local farmers and manufacturers to transport their goods to international ports faster and safer than ever before.</p>',
        'image_path' => 'articles/insight-bridges.png',
        'published_at' => now()->subDays(10),
    ],
    [
        'title' => 'Advancing Healthcare Infrastructure: Building World-Class Hospitals',
        'summary' => 'Delivering next-generation medical facilities equipped with the latest technology to improve healthcare outcomes across the continent.',
        'content' => '<p>MCC is proud to announce the completion of the structural phase for a new 500-bed specialty medical center. Built to international healthcare standards, the facility includes specialized wings for oncology and advanced surgical theaters.</p><p>Our design prioritizes patient wellbeing, incorporating natural light and energy-efficient climate control systems. This hospital will serve as a regional hub for medical excellence, bringing world-class healthcare closer to millions.</p>',
        'image_path' => 'articles/insight-healthcare.png',
        'published_at' => now()->subDays(15),
    ]
];

foreach ($articles as $articleData) {
    if (!Article::where('title', $articleData['title'])->exists()) {
        $articleData['slug'] = Str::slug($articleData['title']);
        Article::create($articleData);
        echo "Created article: {$articleData['title']}\n";
    }
}
echo "Done seeding articles.\n";
