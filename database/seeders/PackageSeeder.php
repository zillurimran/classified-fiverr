<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Package::create([
            'days' => 10,
            'package_price' => 150,
        ]);
        Package::create([
            'days' => 3,
            'package_price' => 80,
        ]);
        Package::create([
            'days' => 5,
            'package_price' => 100,
        ]);
        Package::create([
            'days' => 7,
            'package_price' => 130,
        ]);
    }
}
