<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlogCategory::create([
            'name' => 'Real State'
        ]);
        BlogCategory::create([
            'name' => 'Hostel And Travel'
        ]);
        BlogCategory::create([
            'name' => 'Health and Fitness'
        ]);
    }
}
