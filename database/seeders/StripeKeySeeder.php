<?php

namespace Database\Seeders;

use App\Models\StripeKey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StripeKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StripeKey::create([
            'key' => 'sk_test_51LESvVLGpkKyPO47ElCFEYUmLkNw8iuzjB7Equ9ZB9tOzWdLxQ6akdTQp3plJmpDQ72AEEjl611uVCmzZqFAudem00BzXM9pN1',
            'secret' => 'pk_test_51LESvVLGpkKyPO47cnOnhpHss49hbdKg57030xONsKC6F1YtznPyEwvhIqizV0ETgABgE9AoqOSp1NHKkdBGt5V700p3oKzTp7',
        ]);
    }
}
