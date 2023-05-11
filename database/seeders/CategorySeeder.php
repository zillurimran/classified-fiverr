<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Computer',
            'image' => 'computer.png',
            'created_by' => 'Jhon Doe'
        ]);
        Category::create([
            'name' => 'Clothes',
            'image' => 'clothes.png',
            'created_by' => 'Jhon Doe'
        ]);
        Category::create([
            'name' => 'Construction',
            'image' => 'construction.png',
            'created_by' => 'Jhon Doe'
        ]);
        Category::create([
            'name' => 'Education',
            'image' => 'education.png',
            'created_by' => 'Jhon Doe'
        ]);
        Category::create([
            'name' => 'Electronics',
            'image' => 'electronics.png',
            'created_by' => 'Jhon Doe'
        ]);
        Category::create([
            'name' => 'Health',
            'image' => 'health.png',
            'created_by' => 'Jhon Doe'
        ]);
        Category::create([
            'name' => 'Home',
            'image' => 'home.png',
            'created_by' => 'Jhon Doe'
        ]);
        Category::create([
            'name' => 'Real Estate',
            'image' => 'realestate.png',
            'created_by' => 'Jhon Doe'
        ]);
        Category::create([
            'name' => 'Restaurant',
            'image' => 'Restaurant.png',
            'created_by' => 'Jhon Doe'
        ]);
        Category::create([
            'name' => 'Services',
            'image' => 'services.png',
            'created_by' => 'Jhon Doe'
        ]);
        Category::create([
            'name' => 'Vehicle',
            'image' => 'vechicle.png',
            'created_by' => 'Jhon Doe'
        ]);
        Category::create([
            'name' => 'Spa',
            'image' => 'spa.png',
            'created_by' => 'Jhon Doe'
        ]);
    }
}
