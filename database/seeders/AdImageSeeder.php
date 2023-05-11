<?php

namespace Database\Seeders;

use App\Models\AdImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdImage::create([
            'ad_id' => 1,
            'ad_images' => 'v1.jpg'
        ]);
        AdImage::create([
            'ad_id' => 1,
            'ad_images' => 'v2.jpg'
        ]);
        AdImage::create([
            'ad_id' => 1,
            'ad_images' => 'v3.jpg'
        ]);
        AdImage::create([
            'ad_id' => 1,
            'ad_images' => 'v4.jpg'
        ]);
        AdImage::create([
            'ad_id' => 4,
            'ad_images' => 'h4.jpg'
        ]);
        AdImage::create([
            'ad_id' => 4,
            'ad_images' => 'h2.jpg'
        ]);
        AdImage::create([
            'ad_id' => 4,
            'ad_images' => 'h3.jpg'
        ]);
        AdImage::create([
            'ad_id' => 4,
            'ad_images' => 'h5.jpg'
        ]);
        AdImage::create([
            'ad_id' => 2,
            'ad_images' => 's1.jpg'
        ]);
        AdImage::create([
            'ad_id' => 2,
            'ad_images' => 's2.jpg'
        ]);
        AdImage::create([
            'ad_id' => 2,
            'ad_images' => 's3.jpg'
        ]);
        AdImage::create([
            'ad_id' => 2,
            'ad_images' => 's4.jpg'
        ]);
        AdImage::create([
            'ad_id' => 3,
            'ad_images' => 'r1.jpg'
        ]);
        AdImage::create([
            'ad_id' => 3,
            'ad_images' => 'r2.jpg'
        ]);
        AdImage::create([
            'ad_id' => 3,
            'ad_images' => 'r3.jpg'
        ]);
        AdImage::create([
            'ad_id' => 3,
            'ad_images' => 'r4.jpg'
        ]);
        AdImage::create([
            'ad_id' => 5,
            'ad_images' => 'computer1.jpg'
        ]);
        AdImage::create([
            'ad_id' => 5,
            'ad_images' => 'computer2.jpg'
        ]);
        AdImage::create([
            'ad_id' => 5,
            'ad_images' => 'computer3.jpg'
        ]);
        AdImage::create([
            'ad_id' => 5,
            'ad_images' => 'computer4.jpg'
        ]);
        AdImage::create([
            'ad_id' => 6,
            'ad_images' => 'hlth1.jpg'
        ]);
        AdImage::create([
            'ad_id' => 6,
            'ad_images' => 'hlth2.jpg'
        ]);
        AdImage::create([
            'ad_id' => 6,
            'ad_images' => 'hlth3.jpg'
        ]);
        AdImage::create([
            'ad_id' => 6,
            'ad_images' => 'hlth4.jpg'
        ]);
        AdImage::create([
            'ad_id' => 7,
            'ad_images' => 'home1.jpg'
        ]);
        AdImage::create([
            'ad_id' => 7,
            'ad_images' => 'home2.jpg'
        ]);
        AdImage::create([
            'ad_id' => 7,
            'ad_images' => 'home3.jpg'
        ]);
        AdImage::create([
            'ad_id' => 7,
            'ad_images' => 'home4.jpg'
        ]);
        AdImage::create([
            'ad_id' => 8,
            'ad_images' => 'edu1.jpg'
        ]);
        AdImage::create([
            'ad_id' => 8,
            'ad_images' => 'edu2.jpg'
        ]);
        AdImage::create([
            'ad_id' => 8,
            'ad_images' => 'edu3.jpg'
        ]);
        AdImage::create([
            'ad_id' => 8,
            'ad_images' => 'edu4.jpg'
        ]);
    }
}
