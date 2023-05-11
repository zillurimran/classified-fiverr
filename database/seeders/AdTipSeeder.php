<?php

namespace Database\Seeders;

use App\Models\AdTips;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdTipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdTips::create([
            'name' => 'Meet Seller at public Place'
        ]);

        AdTips::create([
            'name' => 'Check item before you buy'
        ]);

        AdTips::create([
            'name' => 'Pay only after collecting item'
        ]);
    }
}
