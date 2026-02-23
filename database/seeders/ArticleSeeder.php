<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'MCC Expands Strategic Infrastructure in West Africa',
                'summary' => 'Mutual Commitment Company Ltd announces a multi-billion dollar expansion program to enhance regional connectivity and bridge port connectivity.',
                'content' => 'Building on a decade of excellence, MCC Ltd is proud to announce its latest strategic expansion across West Africa. The initiative focuses on high-capacity road networks and deep-sea port logistics integration, aimed at fostering intra-regional trade and economic resilience.',
                'image_path' => null,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Sustainable Energy: Launching the Solar Empowerment Initiative',
                'summary' => 'MCC partners with international energy firms to deliver over 500MW of renewable power across several industrial hubs.',
                'content' => 'In alignment with global sustainability goals, our new Solar Empowerment Initiative represents a critical milestone in transition towards green engineering. By integrating smart grid technology with large-scale solar arrays, we are powering the next generation of industrial growth.',
                'image_path' => null,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'MCC Training Centers Graduate 1000th Engineer',
                'summary' => 'Our commitment to local talent development reaches a new milestone as we celebrate our 1000th engineering graduate in Nigeria.',
                'content' => 'True global leadership is measured by the legacy of talent we leave behind. Today, we celebrate a landmark achievement in our Workforce Empowerment program. These graduates represent the future of African infrastructure, trained to the highest international standards of safety and technical precision.',
                'image_path' => null,
                'published_at' => now()->subDays(10),
            ],
        ];

        foreach ($articles as $article) {
            $article['slug'] = Str::slug($article['title']);
            Article::create($article);
        }
    }
}
