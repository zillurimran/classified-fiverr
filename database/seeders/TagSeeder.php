<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create([
            'name' => 'tag one'
        ]);
        Tag::create([
            'name' => 'tag two'
        ]);
        Tag::create([
            'name' => 'tag three'
        ]);
        Tag::create([
            'name' => 'tag four'
        ]);
        Tag::create([
            'name' => 'tag five'
        ]);
        Tag::create([
            'name' => 'tag six'
        ]);
    }
}
