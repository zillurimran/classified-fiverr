<?php

namespace Database\Seeders;

use App\Models\AdSubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdSubCategory::create([
            'category_id' => 1,
            'name' =>  'Jobs Offered'
        ]);
        AdSubCategory::create([
            'category_id' => 1,
            'name' =>  'Jobs Wanted'
        ]);
        AdSubCategory::create([
            'category_id' => 2,
            'name' =>  'Apt/House for Rent'
        ]);
        AdSubCategory::create([
            'category_id' => 2,
            'name' =>  'Office/Commercial for Rent'
        ]);
        AdSubCategory::create([
            'category_id' => 2,
            'name' =>  'Vacation Rentals'
        ]);
        AdSubCategory::create([
            'category_id' => 2,
            'name' =>  'Armenia Rentals'
        ]);
        AdSubCategory::create([
            'category_id' => 2,
            'name' =>  'International Rentals'
        ]);
        AdSubCategory::create([
            'category_id' => 2,
            'name' =>  'Roommates/Shared'
        ]);
        AdSubCategory::create([
            'category_id' => 2,
            'name' =>  'Housing Wanted'
        ]);
        AdSubCategory::create([
            'category_id' => 2,
            'name' =>  'Other Rentals'
        ]);
        AdSubCategory::create([
            'category_id' => 4,
            'name' =>  'Buy/Sell'
        ]);
        AdSubCategory::create([
            'category_id' => 4,
            'name' =>  'Lease/Rent'
        ]);
        AdSubCategory::create([
            'category_id' => 5,
            'name' =>  'Real Estate'
        ]);
        AdSubCategory::create([
            'category_id' => 5,
            'name' =>  'Real Estate in Armenia'
        ]);
        AdSubCategory::create([
            'category_id' => 5,
            'name' =>  'Businesses'
        ]);
        AdSubCategory::create([
            'category_id' => 5,
            'name' =>  'Items For Sale'
        ]);
        AdSubCategory::create([
            'category_id' => 6,
            'name' =>  'Events/Entertainment'
        ]);
        AdSubCategory::create([
            'category_id' => 6,
            'name' =>  'Travel'
        ]);
        AdSubCategory::create([
            'category_id' => 7,
            'name' =>  'Professional'
        ]);
        AdSubCategory::create([
            'category_id' => 7,
            'name' =>  'Hobbies & Interests'
        ]);
        AdSubCategory::create([
            'category_id' => 7,
            'name' =>  'Volunteer'
        ]);
    }
}
