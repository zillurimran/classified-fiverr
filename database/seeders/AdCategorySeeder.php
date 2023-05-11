<?php

namespace Database\Seeders;

use App\Models\AdCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdCategory::create([
            'name' => 'Jobs',
            'icon' => 'job-seeker.png'
        ]);
        AdCategory::create([
            'name' => 'Rentals',
            'icon' => 'rent.png'
        ]);
        AdCategory::create([
            'name' => 'Local Services',
            'icon' => 'localization.png'
        ]);
        AdCategory::create([
            'name' => 'Cars',
            'icon' => 'electric-car.png'
        ]);
        AdCategory::create([
            'name' => 'Buy/Sell/Trade',
            'icon' => 'sell.png'
        ]);
        AdCategory::create([
            'name' => 'Entertainment/Travel',
            'icon' => 'travels.png'
        ]);
        AdCategory::create([
            'name' => 'ArmenianConnect',
            'icon' => 'connect.png'
        ]);
    }
}
