<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Award;

class AwardSeeder extends Seeder
{
    public function run(): void
    {
        $awards = [
            [
                'title' => 'Global Infrastructure Excellence Award',
                'description' => 'Recognized by the International Engineering Federation for outstanding transport network development in West Africa.',
                'year' => 2023,
                'type' => 'award',
            ],
            [
                'title' => 'CSR Leadership Recognition',
                'description' => 'Awarded for significant contributions to rural healthcare and education projects in Plateau State.',
                'year' => 2022,
                'type' => 'csr',
            ],
            [
                'title' => 'Sustainable Energy Innovation',
                'description' => 'Received for integrating high-capacity solar solutions into existing urban power grids.',
                'year' => 2024,
                'type' => 'award',
            ],
            [
                'title' => 'Community Empowerment Grant',
                'description' => 'Donation of scholarship funds and vocational tools to local communities surrounding major project sites.',
                'year' => 2021,
                'type' => 'donation',
            ],
        ];

        foreach ($awards as $award) {
            Award::create($award);
        }
    }
}
