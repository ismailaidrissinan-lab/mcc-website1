<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sectors = [
            ['name' => 'Road & Bridges', 'slug' => 'road-bridges'],
            ['name' => 'Oil & Gas', 'slug' => 'oil-gas'],
            ['name' => 'Power & Renewable Energy', 'slug' => 'power-renewable-energy'],
            ['name' => 'ICT', 'slug' => 'ict'],
            ['name' => 'Healthcare', 'slug' => 'healthcare'],
            ['name' => 'Marine', 'slug' => 'marine'],
            ['name' => 'Water', 'slug' => 'water'],
            ['name' => 'Railway & Tunnels', 'slug' => 'railway-tunnels'],
            ['name' => 'Agriculture', 'slug' => 'agriculture'],
            ['name' => 'Building & Construction', 'slug' => 'building-construction'],
            ['name' => 'Mining', 'slug' => 'mining'],
        ];

        foreach ($sectors as $sectorData) {
            $sector = \App\Models\Sector::create($sectorData);
            
            // Add a dummy project for each sector
            \App\Models\Project::create([
                'sector_id' => $sector->id,
                'title' => 'Sample ' . $sector->name . ' Development',
                'slug' => \Illuminate\Support\Str::slug('Sample ' . $sector->name . ' Development'),
                'location' => 'Lagos / Beijing',
                'description' => 'A flagship project demonstrating our expertise in ' . $sector->name . '.',
                'content' => '<p>This project involved extensive research, design, and implementation phase. We ensured all environmental and social standards were met.</p>',
                'status' => 'completed',
                'completion_date' => now(),
            ]);
        }
    }
}
