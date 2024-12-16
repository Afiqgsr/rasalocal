<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menus;

class MenuSeeder extends Seeder
{
    public function run()
    {
        Menus::create([
            'title' => 'Brem Klasik',
            'description' => 'Brem tradisional dengan cita rasa otentik khas Madiun.',
            'image' => 'brem-1.png',
            'price' => 25000,
        ]);

        Menus::create([
            'title' => 'Brem Cokelat',
            'description' => 'Varian modern dengan paduan rasa manis cokelat.',
            'image' => 'brem-2.png',
            'price' => 30000,
        ]);
    }
}
