<?php

namespace Database\Seeders;

use App\Models\AboutFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutFeature::create([
            'feature1_icon' => '<i class="fa fa-user"></i>',
            'feature1_title' => 'Register',
            'feature1_subTitle' => 'Nam libero tempore, cum soluta nobis est eligendi cumque facere possimus',
            'feature2_icon' => '<i class="fa fa-pencil"></i>',
            'feature2_title' => 'Create Account',
            'feature2_subTitle' => 'Nam libero tempore, cum soluta nobis est eligendi cumque facere possimus',
            'feature3_icon' => '<i class="fa fa-bullhorn"></i>',
            'feature3_title' => 'Ad Posts',
            'feature3_subTitle' => 'Nam libero tempore, cum soluta nobis est eligendi cumque facere possimus',
            'feature4_icon' => '<i class="fa fa-credit-card"></i>',
            'feature4_title' => 'Get Earning',
            'feature4_subTitle' => 'Nam libero tempore, cum soluta nobis est eligendi cumque facere possimus',
            'feature5_icon' => '<i class="fa fa-bullhorn  text-white"></i>',
            'feature5_title' => 'Provide Free Ads',
            'feature5_subTitle' => 'our being able to do what we like best, every pleasure is to be welcomed and every pain.',
            'feature6_icon' => '<i class="fa fa-heart  text-white"></i>',
            'feature6_title' => 'Best Ads Rating',
            'feature6_subTitle' => 'our being able to do what we like best, every pleasure is to be welcomed and every pain.',
            'feature7_icon' => '<i class="fa fa-heart  text-white"></i>',
            'feature7_title' => 'Provide Post Features',
            'feature7_subTitle' => 'our being able to do what we like best, every pleasure is to be welcomed and every pain.',
            'feature8_icon' => '<i class="fa fa-bookmark  text-white"></i>',
            'feature8_title' => 'See your Ad Progress',
            'feature8_subTitle' => 'our being able to do what we like best, every pleasure is to be welcomed and every pain.',
            'feature9_icon' => '<i class="fa fa-handshake-o   text-white"></i>',
            'feature9_title' => 'User Friendly',
            'feature9_subTitle' => 'our being able to do what we like best, every pleasure is to be welcomed and every pain.',
            'feature10_icon' => '<i class="fa fa-phone  text-white"></i>',
            'feature10_title' => '24/7 Support',
            'feature10_subTitle' => 'our being able to do what we like best, every pleasure is to be welcomed and every pain.',
        ]);
    }
}
