<?php

namespace Database\Seeders;

use App\Models\AdTerms;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdTermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdTerms::create([
            'name' => 'Money Not Refundable'
        ]);

        AdTerms::create([
            'name' => 'You can renew your Premium ad after experted.'
        ]);

        AdTerms::create([
            'name' => 'Premium ads are active for depend on package.'
        ]);
    }
}
