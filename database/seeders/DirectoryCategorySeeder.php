<?php

namespace Database\Seeders;

use App\Models\DirectoryCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DirectoryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DirectoryCategory::create([
            'name' => 'Appliance Sales & Repair',
            'icon' => 'car-repair.png'
        ]);
        DirectoryCategory::create([
            'name' => 'Automative',
            'icon' => 'automative.png'
        ]);
        DirectoryCategory::create([
            'name' => 'Cleaning & Sanitation',
            'icon' => 'sanitary.png'
        ]);
        DirectoryCategory::create([
            'name' => 'Clubs/Organizations',
            'icon' => 'clubhouse.png'
        ]);
        DirectoryCategory::create([
            'name' => 'Computers, Phones & Electronics',
            'icon' => 'monitor.png'
        ]);
        DirectoryCategory::create([
            'name' => 'Community Services',
            'icon' => 'community.png'
        ]);
        DirectoryCategory::create([
            'name' => 'Construction',
            'icon' => 'construction.png'
        ]);
        DirectoryCategory::create([
            'name' => 'Beauty',
            'icon' => 'beauty.png'
        ]);
        DirectoryCategory::create([
            'name' => 'Financial & Tax Services',
            'icon' => 'finance.png'
        ]);
        DirectoryCategory::create([
            'name' => 'Food & Beverages',
            'icon' => 'food.png'
        ]);
        DirectoryCategory::create([
            'name' => 'Government',
            'icon' => 'government.png'
        ]);
        DirectoryCategory::create([
            'name' => 'Health & Medical Services',
            'icon' => 'healthcare.png'
        ]);
        DirectoryCategory::create([
            'name' => 'Home Repair Services',
            'icon' => 'home-repair.png'
        ]);
        DirectoryCategory::create([
            'name' => 'Insurance Services',
            'icon' => 'insurance.png'
        ]);
        DirectoryCategory::create([
            'name' => 'Legal Services',
            'icon' => 'legal.png'
        ]);
        DirectoryCategory::create([
            'name' => 'Moving & Transportation',
            'icon' => 'transportation.png'
        ]);
        DirectoryCategory::create([
            'name' => 'Printing/Designing/Branding',
            'icon' => 'printer.png'
        ]);
        DirectoryCategory::create([
            'name' => 'Religion',
            'icon' => 'religion.png'
        ]);
        DirectoryCategory::create([
            'name' => 'Real Estate',
            'icon' => 'realestate.png'
        ]);
        DirectoryCategory::create([
            'name' => 'Retail Stores & Shopping',
            'icon' => 'retailStore.png'
        ]);
        DirectoryCategory::create([
            'name' => 'Schools, Education & Child Care',
            'icon' => 'education.png'
        ]);
        DirectoryCategory::create([
            'name' => 'Social Services',
            'icon' => 'social-services.png'
        ]);
        DirectoryCategory::create([
            'name' => 'Special Event Services',
            'icon' => 'event.png'
        ]);
        DirectoryCategory::create([
            'name' => 'Sports & Recreation',
            'icon' => 'sports.png'
        ]);
        DirectoryCategory::create([
            'name' => 'Travel & Hospitality',
            'icon' => 'travels.png'
        ]);
        DirectoryCategory::create([
            'name' => 'Website & Marketing',
            'icon' => 'developer.png'
        ]);
    }
}
