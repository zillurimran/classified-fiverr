<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GeneralSetting::create([
            'logo' => 'logo.png',
            'logo_dark' => 'logo_dark.png',
            'favicon' => 'favicon.ico',
            'app_title' => 'Classified',
            'footer_description' => 'Find Your Best Classified',
            'site_designer' => 'anonymous',
            'designer_route' => 'anonymous',
            'facebook' => 'www.facebook.com',
            'twitter' => 'www.twitter.com',
            'linkedin' => 'www.linkedin.com',
            'whatsapp' => 'www.whatsapp.com',
        ]);
    }
}
