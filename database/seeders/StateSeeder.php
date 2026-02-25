<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;
use Illuminate\Support\Str;

class StateSeeder extends Seeder
{
    public function run(): void
    {
        $states = [
            'Abia' => 'abia',
            'Adamawa' => 'adamawa',
            'Akwa Ibom' => 'akwa-ibom',
            'Anambra' => 'anambra',
            'Bauchi' => 'bauchi',
            'Bayelsa' => 'bayelsa',
            'Benue' => 'benue',
            'Borno' => 'borno',
            'Cross River' => 'cross-river',
            'Delta' => 'delta',
            'Ebonyi' => 'ebonyi',
            'Edo' => 'edo',
            'Ekiti' => 'ekiti',
            'Enugu' => 'enugu',
            'FCT - Abuja' => 'fct',
            'Gombe' => 'gombe',
            'Imo' => 'imo',
            'Jigawa' => 'jigawa',
            'Kaduna' => 'kaduna',
            'Kano' => 'kano',
            'Katsina' => 'katsina',
            'Kebbi' => 'kebbi',
            'Kogi' => 'kogi',
            'Kwara' => 'kwara',
            'Lagos' => 'lagos',
            'Nasarawa' => 'nassarawa',
            'Niger' => 'niger',
            'Ogun' => 'ogun',
            'Ondo' => 'ondo',
            'Osun' => 'osun',
            'Oyo' => 'oyo',
            'Plateau' => 'plateau',
            'Rivers' => 'rivers',
            'Sokoto' => 'sokoto',
            'Taraba' => 'taraba',
            'Yobe' => 'yobe',
            'Zamfara' => 'zamfara',
        ];

        State::truncate();

        foreach ($states as $name => $slug) {
            State::create([
                'name' => $name,
                'slug' => $slug
            ]);
        }
    }
}
