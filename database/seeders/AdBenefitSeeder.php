<?php

namespace Database\Seeders;

use App\Models\AdBenefit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdBenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdBenefit::create([
            'name' => 'Premium Ads Active',
        ]);
        AdBenefit::create([
            'name' => 'Premium ads are displayed on top',
        ]);
        AdBenefit::create([
            'name' => 'Premium ads will be Show in Google results',
        ]);
        AdBenefit::create([
            'name' => 'Premium Ads Active',
        ]);
    }
}
