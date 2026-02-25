<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'sinanismailaidris@gmail.com'],
            [
                'name' => 'MCC Administrator',
                'password' => Hash::make('Sinan3367#'),
            ]
        );
    }
}
