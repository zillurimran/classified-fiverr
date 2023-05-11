<?php

namespace Database\Seeders;

use App\Models\Title;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Title::create([
            'banner_title' => "Find Your Best Classified",
            'banner_subTitle' => 'It is a long established fact that a reader will be distracted by the readable.',
            'location_title' => 'Best Rated Locations',
            'location_subTitle' => "Mauris ut cursus nunc. Morbi eleifend, ligula at consectetur vehicula",
            'category_title' => "Categories",
            'category_subTitle' => 'Mauris ut cursus nunc. Morbi eleifend, ligula at consectetur vehicula',
            'feature_title' => 'Featured Ads',
            'feature_subTitle' => 'Mauris ut cursus nunc. Morbi eleifend, ligula at consectetur vehicula',
            'subscribe_title' => 'Subscribe',
            'subscribe_subTitle' => 'It is a long established fact that a reader will be distracted by the readable.',
            'latest_ad_title' => 'Latest Ads',
            'latest_ad_subTitle' => 'Mauris ut cursus nunc. Morbi eleifend, ligula at consectetur vehicula',
            'testimonial_title' => 'Testimonials',
            'testimonial_subTitle' => 'Mauris ut cursus nunc. Morbi eleifend, ligula at consectetur vehicula',
            'blog_title' => 'Recent News',
            'blog_subTitle' => 'Mauris ut cursus nunc. Morbi eleifend, ligula at consectetur vehicula',
            'about_section1_title' => "How It Works?",
            'about_section1_subTitle' => "Mauris ut cursus nunc. Morbi eleifend, ligula at consectetur vehicula",
            'about_section2_title' => "Are you ready for the posting you ads on this Site?",
            'about_section2_subTitle' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.",
            'about_section3_title' => "Why Choose Us?",
            'about_section3_subTitle' => "Mauris ut cursus nunc. Morbi eleifend, ligula at consectetur vehicula",
        ]);
    }
}
