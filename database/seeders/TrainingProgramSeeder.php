<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TrainingProgram;

class TrainingProgramSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            [
                'title' => 'Executive Engineering Fellowship',
                'location' => 'Lagos / Abuja',
                'description' => 'An intensive 12-month program for young local engineers to master international standards in bridge and railway construction.',
            ],
            [
                'title' => 'Renewable Energy Technical Workshop',
                'location' => 'Kano',
                'description' => 'Focusing on maintenance and installation of high-capacity solar arrays for industrial applications.',
            ],
            [
                'title' => 'Sustainable Construction Management',
                'location' => 'Beijing Training Center',
                'description' => 'Cross-border knowledge exchange program focusing on eco-friendly materials and planning.',
            ],
            [
                'title' => 'Health & Safety Advanced Certification',
                'location' => 'On-site (Various Locations)',
                'description' => 'Ensuring 100% compliance with international safety standards across all MCC project sites.',
            ],
        ];

        foreach ($programs as $program) {
            TrainingProgram::create($program);
        }
    }
}
