<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\ThemeSetting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => "Admin",
            'email' => 'admin@admin.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
            'role' => 'admin'
        ]);
        ThemeSetting::create([
            'user_id' => $user->id,
            'theme' => 'light-layout',
            'nav' => 'expended',
            'created_at' => Carbon::now(),
        ]);
    }
}
