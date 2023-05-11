<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'title' => 'Contact Info',
            'sub_title' => 'Mauris ut cursus nunc. Morbi eleifend, ligula at consectetur vehicula',
            'phone' => '+68 872-627-9735',
            'working_hour' => 'Mon-Sat(10:00-19:00)',
            'email' => 'mail@classified.com',
        ]);
    }
}
