<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::create([
            'name' => 'Heather Bell',
            'description' => 'Lorem ipsum dolor sit amet, consectetur
            adipisicing elit. Quod eos id officiis hic tenetur quae quaerat ad velit ab.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore cum
            accusamus eveniet molestias voluptatum inventore laboriosam labore sit,
            aspernatur praesentium iste impedit quidem dolor veniam.',
            'star' => 4
        ]);

        Testimonial::create([
            'name' => 'David Blake',
            'description' => 'Lorem ipsum dolor sit amet, consectetur
            adipisicing elit. Quod eos id officiis hic tenetur quae quaerat ad velit ab.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore cum
            accusamus eveniet molestias voluptatum inventore laboriosam labore sit,
            aspernatur praesentium iste impedit quidem dolor veniam.',
            'star' => 4
        ]);

        Testimonial::create([
            'name' => 'Sophie Carr',
            'description' => 'Lorem ipsum dolor sit amet, consectetur
            adipisicing elit. Quod eos id officiis hic tenetur quae quaerat ad velit ab.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore cum
            accusamus eveniet molestias voluptatum inventore laboriosam labore sit,
            aspernatur praesentium iste impedit quidem dolor veniam.',
            'star' => 4
        ]);
    }
}
