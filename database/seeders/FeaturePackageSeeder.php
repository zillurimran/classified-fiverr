<?php

namespace Database\Seeders;

use App\Models\FeaturePackage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeaturePackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FeaturePackage::create([
            'featured_days' => '3',
            'featured_price' => '30'
        ]);
        FeaturePackage::create([
            'featured_days' => '5',
            'featured_price' => '50'
        ]);
        FeaturePackage::create([
            'featured_days' => '7',
            'featured_price' => '70'
        ]);
        FeaturePackage::create([
            'featured_days' => '10',
            'featured_price' => '100'
        ]);
    }
}
