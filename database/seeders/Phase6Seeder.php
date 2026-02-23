<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Phase6Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // CSR Projects
        $csrProjects = [
            [
                'title' => 'The Solar Empowerment Initiative',
                'summary' => 'Bringing sustainable clean energy to rural healthcare facilities across West Africa.',
                'content' => 'MCC has committed to providing off-grid solar solutions to 50 primary healthcare centers. This initiative has already reduced energy costs by 70% and improved patient outcomes through reliable power for equipment.',
                'location' => 'Across Nigeria & Benin',
                'published_at' => now()->subMonths(2),
            ],
            [
                'title' => 'Technical Vocational Excellence Program',
                'summary' => 'Empowering local youth with high-end engineering and machinery skills.',
                'content' => 'Our training centers provide hands-on experience in bridge architecture and high-tension energy systems. Over 500 graduates have been absorbed into MCC\'s global project workforce.',
                'location' => 'Lagos Training Hub',
                'published_at' => now()->subMonths(5),
            ],
        ];

        foreach ($csrProjects as $project) {
            $project['slug'] = \Illuminate\Support\Str::slug($project['title']);
            \App\Models\CsrProject::create($project);
        }

        // Investor Documents
        $investorDocs = [
            [
                'title' => 'Annual Integrated Report 2025',
                'category' => 'Financial',
                'file_path' => 'documents/reports/annual-2025.pdf',
                'published_at' => now()->subMonths(1),
            ],
            [
                'title' => 'Corporate Governance Framework 2026',
                'category' => 'Governance',
                'file_path' => 'documents/legal/governance-2026.pdf',
                'published_at' => now(),
            ],
            [
                'title' => 'Environmental & Social Impact Policy',
                'category' => 'Policy',
                'file_path' => 'documents/policy/esi-2026.pdf',
                'published_at' => now()->subWeeks(2),
            ],
        ];

        foreach ($investorDocs as $doc) {
            \App\Models\InvestorDocument::create($doc);
        }

        // Job Postings
        $jobs = [
            [
                'title' => 'Senior Infrastructure Architect',
                'department' => 'Engineering',
                'location' => 'Abuja / Remote',
                'type' => 'Full-time',
                'description' => 'Lead the architectural design of transnational transport networks.',
                'requirements' => '10+ years experience in civil engineering, Expertise in regional infrastructure standards.',
                'is_active' => true,
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Renewable Energy Project Manager',
                'department' => 'Energy SBU',
                'location' => 'Lagos / Hybrid',
                'type' => 'Full-time',
                'description' => 'Manage large-scale solar project deployments across regional grids.',
                'requirements' => 'PMP certification, experience in off-grid energy systems.',
                'is_active' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Corporate Finance Associate',
                'department' => 'Finance & Strategy',
                'location' => 'Beijing Office',
                'type' => 'Full-time',
                'description' => 'Strategic investment analysis for Africa-Asia developmental corridors.',
                'requirements' => 'CFA candidate preferred, bilingual (English/Mandarin) is a plus.',
                'is_active' => true,
                'published_at' => now()->subDays(15),
            ],
        ];

        foreach ($jobs as $job) {
            $job['slug'] = \Illuminate\Support\Str::slug($job['title']);
            \App\Models\JobPosting::create($job);
        }
    }
}
