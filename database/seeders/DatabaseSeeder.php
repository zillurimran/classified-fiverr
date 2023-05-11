<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            AdSubCategorySeeder::class,
            AdCategorySeeder::class,
            DirectoryCategorySeeder::class,
            DirectorySubCategorySeeder::class,
            CategorySeeder::class,
            GeneralSettingSeeder::class,
            BlogCategorySeeder::class,
            BlogSeeder::class,
            TitleSeeder::class,
            TestimonialSeeder::class,
            ContactSeeder::class,
            CountrySeeder::class,
            AboutBannerSeeder::class,
            AboutFeatureSeeder::class,
            AdBenefitSeeder::class,
            AdTipSeeder::class,
            AdTermSeeder::class,
            StripeKeySeeder::class,
            TagSeeder::class,
            AdPostSeeder::class,
            PackageSeeder::class,
            FeaturePackageSeeder::class,
            AdImageSeeder::class,
            UserSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
        ]);

    }
}
