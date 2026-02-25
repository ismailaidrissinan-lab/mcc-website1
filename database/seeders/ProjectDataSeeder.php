<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sectors = \App\Models\Sector::all();
        $states = \App\Models\State::all();

        if ($sectors->isEmpty() || $states->isEmpty()) {
            return;
        }

        $projects = [
            [
                'title' => 'Lagos-Ibadan Rail Modernization',
                'sector_slug' => 'railway-tunnels',
                'state_slug' => 'lagos',
                'status' => 'operational',
                'award_date' => '2019-03-15',
                'completion_date' => '2021-06-10',
                'description' => 'A primary transport corridor connecting the commercial hub of Lagos to the major city of Ibadan.',
                'content' => 'Full rail infrastructure including terminal buildings and control systems.',
            ],
            [
                'title' => 'Abuja Central Water Treatment Plant',
                'sector_slug' => 'water',
                'state_slug' => 'fct',
                'status' => 'completed',
                'award_date' => '2020-05-20',
                'completion_date' => '2023-11-15',
                'description' => 'Large scale water filtration and distribution system serving the FCT.',
                'content' => 'High-capacity pumps, filtration units and digital monitoring architecture.',
            ],
            [
                'title' => 'Rivers State Petrochemical Expansion',
                'sector_slug' => 'oil-gas',
                'state_slug' => 'rivers',
                'status' => 'ongoing',
                'award_date' => '2023-01-10',
                'completion_date' => null,
                'description' => 'Expansion of production facilities to increase petrochemical output capacity.',
                'content' => 'Structural engineering for refinery units and high-pressure piping systems.',
            ],
            [
                'title' => 'Kano Industrial Bridge Project',
                'sector_slug' => 'road-bridges',
                'state_slug' => 'kano',
                'status' => 'suspended',
                'award_date' => '2022-09-05',
                'completion_date' => null,
                'description' => 'Major flyover bridge to alleviate traffic congestion in the industrial zone.',
                'content' => 'Currently undergoing structural re-evaluation for phase 2 expansion.',
            ],
            [
                'title' => 'Akwa Ibom Solar Farm Phase 1',
                'sector_slug' => 'power-renewable-energy',
                'state_slug' => 'akwa-ibom',
                'status' => 'ongoing',
                'award_date' => '2024-02-01',
                'completion_date' => null,
                'description' => 'A 50MW solar array providing clean energy to the coastal industrial region.',
                'content' => 'Photovoltaic panel installation and national grid integration.',
            ],
            [
                'title' => 'Edo Health Tech Diagnostic Center',
                'sector_slug' => 'healthcare',
                'state_slug' => 'edo',
                'status' => 'completed',
                'award_date' => '2021-11-12',
                'completion_date' => '2024-01-20',
                'description' => 'A state-of-the-art medical diagnostic facility with integrated tele-medicine.',
                'content' => 'Specialized medical build-out with high-tension power backups.',
            ],
            [
                'title' => 'Delta Port Dredging & Expansion',
                'sector_slug' => 'marine',
                'state_slug' => 'delta',
                'status' => 'ongoing',
                'award_date' => '2023-06-30',
                'completion_date' => null,
                'description' => 'Deepening of access channels and addition of new container berths.',
                'content' => 'Marine engineering and underwater structural reinforcement.',
            ],
            [
                'title' => 'Ogun Industrial Road Network',
                'sector_slug' => 'road-bridges',
                'state_slug' => 'ogun',
                'status' => 'operational',
                'award_date' => '2018-08-15',
                'completion_date' => '2020-12-05',
                'description' => 'Multi-lane heavy-duty road system for the Agbara industrial estate.',
                'content' => 'Dual carriage asphalt roads with integrated drainage and lighting.',
            ],
            [
                'title' => 'Nasarawa Integrated Agri-Hub',
                'sector_slug' => 'agriculture',
                'state_slug' => 'nassarawa',
                'status' => 'ongoing',
                'award_date' => '2024-01-15',
                'completion_date' => null,
                'description' => 'Establishment of modernized processing facilities for local agric produce.',
                'content' => 'Warehouse construction and specialized processing machinery installation.',
            ],
            [
                'title' => 'Plateau Renewable Power Hub',
                'sector_slug' => 'power-renewable-energy',
                'state_slug' => 'plateau',
                'status' => 'completed',
                'award_date' => '2020-03-10',
                'completion_date' => '2022-09-18',
                'description' => 'Hybrid wind-solar system for remote communities on the Jos plateau.',
                'content' => 'Wind turbine array and battery energy storage system (BESS).',
            ],
        ];

        foreach ($projects as $p) {
            $sector = $sectors->where('slug', $p['sector_slug'])->first();
            $state = $states->where('slug', $p['state_slug'])->first();

            if ($sector && $state) {
                \App\Models\Project::create([
                    'sector_id' => $sector->id,
                    'state_id' => $state->id,
                    'title' => $p['title'],
                    'slug' => \Illuminate\Support\Str::slug($p['title']),
                    'status' => $p['status'],
                    'award_date' => $p['award_date'],
                    'completion_date' => $p['completion_date'],
                    'description' => $p['description'],
                    'content' => $p['content'],
                    'location' => $state->name,
                ]);
            }
        }
    }
}
