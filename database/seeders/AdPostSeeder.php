<?php

namespace Database\Seeders;

use App\Models\AdPost;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdPost::create([
            'user_id' => 1,
            'ad_title' => 'Maruti Suzuki Alto',
            'category_id' => 11,
            'package_id' => 1,
            'price' => 300,
            'ad_type' => 'Null',
            'short_desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quis accusamus totam facilis molestiae ratione suscipit eum at cum laboriosam? Iste saepe est natus, velit maxime itaque tenetur necessitatibus hic perferendis quis incidunt, numquam aspernatur odio. Neque, asperiores corrupti. Illum a facere repudiandae magnam magni cum ea eos labore est asperiores aut ducimus consectetur officiis, vero doloribus quos dolore hic tempora sed veritatis rerum voluptatum! Veritatis obcaecati placeat rem explicabo impedit eos minima, culpa veniam quae sed nam eligendi nihil eius perspiciatis illo? Possimus facere consequuntur tempora sint modi veritatis amet quasi magni aliquid reiciendis aliquam illo corporis voluptatem obcaecati, ullam nulla cumque, aut sunt at expedita. Assumenda mollitia repudiandae magni similique corporis incidunt voluptatum! Exercitationem, autem? Maiores saepe sequi facere tenetur amet eligendi eius, expedita voluptatum officiis exercitationem nobis. Est, quia, recusandae quod harum corporis nemo accusamus consectetur illo voluptatibus commodi nisi at quae, numquam minima nesciunt nostrum qui.",
            'long_desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quis accusamus totam facilis molestiae ratione suscipit eum at cum laboriosam? Iste saepe est natus, velit maxime itaque tenetur necessitatibus hic perferendis quis incidunt, numquam aspernatur odio. Neque, asperiores corrupti. Illum a facere repudiandae magnam magni cum ea eos labore est asperiores aut ducimus consectetur officiis, vero doloribus quos dolore hic tempora sed veritatis rerum voluptatum! Veritatis obcaecati placeat rem explicabo impedit eos minima, culpa veniam quae sed nam eligendi nihil eius perspiciatis illo? Possimus facere consequuntur tempora sint modi veritatis amet quasi magni aliquid reiciendis aliquam illo corporis voluptatem obcaecati, ullam nulla cumque, aut sunt at expedita. Assumenda mollitia repudiandae magni similique corporis incidunt voluptatum! Exercitationem, autem? Maiores saepe sequi facere tenetur amet eligendi eius, expedita voluptatum officiis exercitationem nobis. Est, quia, recusandae quod harum corporis nemo accusamus consectetur illo voluptatibus commodi nisi at quae, numquam minima nesciunt nostrum qui.',
            'property_id' => 1,
            "country_id" => 1,
            'address' => 'Afghanistan, Kabul',
            'views' => 0,
            'product_location' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6779444.483731522!2d67.7034312!3d33.93403835000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38d16eb6f8ff026d%3A0xf3b5460dbe96da78!2sAfghanistan!5e0!3m2!1sen!2sbd!4v1681643280065!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'reacts' => 0,
            'phone' => '111111',
            'website' => "Null",
            'status' => 1,
            'featured_id' => 1,
            'expiry_date' => '2023-04-30 16:40:03',
            'featured_expiry_date' => '2023-04-30 16:40:03'
        ]);
        AdPost::create([
            'user_id' => 1,
            'ad_title' => 'Goozer Beauty & Spa',
            'category_id' => 12,
            'package_id' => 2,
            'price' => 300,
            'ad_type' => 'Null',
            'short_desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quis accusamus totam facilis molestiae ratione suscipit eum at cum laboriosam? Iste saepe est natus, velit maxime itaque tenetur necessitatibus hic perferendis quis incidunt, numquam aspernatur odio. Neque, asperiores corrupti. Illum a facere repudiandae magnam magni cum ea eos labore est asperiores aut ducimus consectetur officiis, vero doloribus quos dolore hic tempora sed veritatis rerum voluptatum! Veritatis obcaecati placeat rem explicabo impedit eos minima, culpa veniam quae sed nam eligendi nihil eius perspiciatis illo? Possimus facere consequuntur tempora sint modi veritatis amet quasi magni aliquid reiciendis aliquam illo corporis voluptatem obcaecati, ullam nulla cumque, aut sunt at expedita. Assumenda mollitia repudiandae magni similique corporis incidunt voluptatum! Exercitationem, autem? Maiores saepe sequi facere tenetur amet eligendi eius, expedita voluptatum officiis exercitationem nobis. Est, quia, recusandae quod harum corporis nemo accusamus consectetur illo voluptatibus commodi nisi at quae, numquam minima nesciunt nostrum qui.",
            'long_desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quis accusamus totam facilis molestiae ratione suscipit eum at cum laboriosam? Iste saepe est natus, velit maxime itaque tenetur necessitatibus hic perferendis quis incidunt, numquam aspernatur odio. Neque, asperiores corrupti. Illum a facere repudiandae magnam magni cum ea eos labore est asperiores aut ducimus consectetur officiis, vero doloribus quos dolore hic tempora sed veritatis rerum voluptatum! Veritatis obcaecati placeat rem explicabo impedit eos minima, culpa veniam quae sed nam eligendi nihil eius perspiciatis illo? Possimus facere consequuntur tempora sint modi veritatis amet quasi magni aliquid reiciendis aliquam illo corporis voluptatem obcaecati, ullam nulla cumque, aut sunt at expedita. Assumenda mollitia repudiandae magni similique corporis incidunt voluptatum! Exercitationem, autem? Maiores saepe sequi facere tenetur amet eligendi eius, expedita voluptatum officiis exercitationem nobis. Est, quia, recusandae quod harum corporis nemo accusamus consectetur illo voluptatibus commodi nisi at quae, numquam minima nesciunt nostrum qui.',
            'property_id' => 2,
            "country_id" => 14,
            'address' => 'Australia, Sudney',
            'views' => 0,
            'product_location' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61943168.55220293!2d86.99249109450709!3d-18.63206547165136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2b2bfd076787c5df%3A0x538267a1955b1352!2sAustralia!5e0!3m2!1sen!2sbd!4v1681644373922!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'reacts' => 0,
            'phone' => '111111',
            'website' => "Null",
            'status' => 1,
            'featured_id' => 1,
            'expiry_date' => '2023-04-30 16:40:03',
            'featured_expiry_date' => '2023-04-30 16:40:03'
        ]);
        AdPost::create([
            'user_id' => 1,
            'ad_title' => 'GilkonStar Hotel',
            'category_id' => 9,
            'package_id' => 3,
            'price' => 300,
            'ad_type' => 'Null',
            'short_desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quis accusamus totam facilis molestiae ratione suscipit eum at cum laboriosam? Iste saepe est natus, velit maxime itaque tenetur necessitatibus hic perferendis quis incidunt, numquam aspernatur odio. Neque, asperiores corrupti. Illum a facere repudiandae magnam magni cum ea eos labore est asperiores aut ducimus consectetur officiis, vero doloribus quos dolore hic tempora sed veritatis rerum voluptatum! Veritatis obcaecati placeat rem explicabo impedit eos minima, culpa veniam quae sed nam eligendi nihil eius perspiciatis illo? Possimus facere consequuntur tempora sint modi veritatis amet quasi magni aliquid reiciendis aliquam illo corporis voluptatem obcaecati, ullam nulla cumque, aut sunt at expedita. Assumenda mollitia repudiandae magni similique corporis incidunt voluptatum! Exercitationem, autem? Maiores saepe sequi facere tenetur amet eligendi eius, expedita voluptatum officiis exercitationem nobis. Est, quia, recusandae quod harum corporis nemo accusamus consectetur illo voluptatibus commodi nisi at quae, numquam minima nesciunt nostrum qui.",
            'long_desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quis accusamus totam facilis molestiae ratione suscipit eum at cum laboriosam? Iste saepe est natus, velit maxime itaque tenetur necessitatibus hic perferendis quis incidunt, numquam aspernatur odio. Neque, asperiores corrupti. Illum a facere repudiandae magnam magni cum ea eos labore est asperiores aut ducimus consectetur officiis, vero doloribus quos dolore hic tempora sed veritatis rerum voluptatum! Veritatis obcaecati placeat rem explicabo impedit eos minima, culpa veniam quae sed nam eligendi nihil eius perspiciatis illo? Possimus facere consequuntur tempora sint modi veritatis amet quasi magni aliquid reiciendis aliquam illo corporis voluptatem obcaecati, ullam nulla cumque, aut sunt at expedita. Assumenda mollitia repudiandae magni similique corporis incidunt voluptatum! Exercitationem, autem? Maiores saepe sequi facere tenetur amet eligendi eius, expedita voluptatum officiis exercitationem nobis. Est, quia, recusandae quod harum corporis nemo accusamus consectetur illo voluptatibus commodi nisi at quae, numquam minima nesciunt nostrum qui.',
            'property_id' => 3,
            "country_id" => 19,
            'address' => 'Bnagladesh, Dhaka',
            'views' => 0,
            'product_location' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7497569.746422035!2d85.04539196186526!3d23.42715835670534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30adaaed80e18ba7%3A0xf2d28e0c4e1fc6b!2sBangladesh!5e0!3m2!1sen!2sbd!4v1681644587474!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'reacts' => 0,
            'phone' => '111111',
            'website' => "Null",
            'status' => 1,
            'featured_id' => 1,
            'expiry_date' => '2023-04-30 16:40:03',
            'featured_expiry_date' => '2023-04-30 16:40:03'
        ]);
        AdPost::create([
            'user_id' => 1,
            'ad_title' => '2BK flat ',
            'category_id' => 8,
            'package_id' => 2,
            'price' => 300,
            'ad_type' => 'Null',
            'short_desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quis accusamus totam facilis molestiae ratione suscipit eum at cum laboriosam? Iste saepe est natus, velit maxime itaque tenetur necessitatibus hic perferendis quis incidunt, numquam aspernatur odio. Neque, asperiores corrupti. Illum a facere repudiandae magnam magni cum ea eos labore est asperiores aut ducimus consectetur officiis, vero doloribus quos dolore hic tempora sed veritatis rerum voluptatum! Veritatis obcaecati placeat rem explicabo impedit eos minima, culpa veniam quae sed nam eligendi nihil eius perspiciatis illo? Possimus facere consequuntur tempora sint modi veritatis amet quasi magni aliquid reiciendis aliquam illo corporis voluptatem obcaecati, ullam nulla cumque, aut sunt at expedita. Assumenda mollitia repudiandae magni similique corporis incidunt voluptatum! Exercitationem, autem? Maiores saepe sequi facere tenetur amet eligendi eius, expedita voluptatum officiis exercitationem nobis. Est, quia, recusandae quod harum corporis nemo accusamus consectetur illo voluptatibus commodi nisi at quae, numquam minima nesciunt nostrum qui.",
            'long_desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quis accusamus totam facilis molestiae ratione suscipit eum at cum laboriosam? Iste saepe est natus, velit maxime itaque tenetur necessitatibus hic perferendis quis incidunt, numquam aspernatur odio. Neque, asperiores corrupti. Illum a facere repudiandae magnam magni cum ea eos labore est asperiores aut ducimus consectetur officiis, vero doloribus quos dolore hic tempora sed veritatis rerum voluptatum! Veritatis obcaecati placeat rem explicabo impedit eos minima, culpa veniam quae sed nam eligendi nihil eius perspiciatis illo? Possimus facere consequuntur tempora sint modi veritatis amet quasi magni aliquid reiciendis aliquam illo corporis voluptatem obcaecati, ullam nulla cumque, aut sunt at expedita. Assumenda mollitia repudiandae magni similique corporis incidunt voluptatum! Exercitationem, autem? Maiores saepe sequi facere tenetur amet eligendi eius, expedita voluptatum officiis exercitationem nobis. Est, quia, recusandae quod harum corporis nemo accusamus consectetur illo voluptatibus commodi nisi at quae, numquam minima nesciunt nostrum qui.',
            'property_id' => 4,
            "country_id" => 76,
            'address' => 'France',
            'views' => 0,
            'product_location' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11404779.745794881!2d-8.528771245201863!3d45.74372671907316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd54a02933785731%3A0x6bfd3f96c747d9f7!2sFrance!5e0!3m2!1sen!2sbd!4v1681644768660!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'reacts' => 0,
            'phone' => '111111',
            'website' => "Null",
            'status' => 1,
            'featured_id' => 1,
            'expiry_date' => '2023-04-30 16:40:03',
            'featured_expiry_date' => '2023-04-30 16:40:03'
        ]);
        AdPost::create([
            'user_id' => 1,
            'ad_title' => 'Problem solving is an essential part',
            'category_id' => 1,
            'package_id' => 2,
            'price' => 300,
            'ad_type' => 'Null',
            'short_desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quis accusamus totam facilis molestiae ratione suscipit eum at cum laboriosam? Iste saepe est natus, velit maxime itaque tenetur necessitatibus hic perferendis quis incidunt, numquam aspernatur odio. Neque, asperiores corrupti. Illum a facere repudiandae magnam magni cum ea eos labore est asperiores aut ducimus consectetur officiis, vero doloribus quos dolore hic tempora sed veritatis rerum voluptatum! Veritatis obcaecati placeat rem explicabo impedit eos minima, culpa veniam quae sed nam eligendi nihil eius perspiciatis illo? Possimus facere consequuntur tempora sint modi veritatis amet quasi magni aliquid reiciendis aliquam illo corporis voluptatem obcaecati, ullam nulla cumque, aut sunt at expedita. Assumenda mollitia repudiandae magni similique corporis incidunt voluptatum! Exercitationem, autem? Maiores saepe sequi facere tenetur amet eligendi eius, expedita voluptatum officiis exercitationem nobis. Est, quia, recusandae quod harum corporis nemo accusamus consectetur illo voluptatibus commodi nisi at quae, numquam minima nesciunt nostrum qui.",
            'long_desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quis accusamus totam facilis molestiae ratione suscipit eum at cum laboriosam? Iste saepe est natus, velit maxime itaque tenetur necessitatibus hic perferendis quis incidunt, numquam aspernatur odio. Neque, asperiores corrupti. Illum a facere repudiandae magnam magni cum ea eos labore est asperiores aut ducimus consectetur officiis, vero doloribus quos dolore hic tempora sed veritatis rerum voluptatum! Veritatis obcaecati placeat rem explicabo impedit eos minima, culpa veniam quae sed nam eligendi nihil eius perspiciatis illo? Possimus facere consequuntur tempora sint modi veritatis amet quasi magni aliquid reiciendis aliquam illo corporis voluptatem obcaecati, ullam nulla cumque, aut sunt at expedita. Assumenda mollitia repudiandae magni similique corporis incidunt voluptatum! Exercitationem, autem? Maiores saepe sequi facere tenetur amet eligendi eius, expedita voluptatum officiis exercitationem nobis. Est, quia, recusandae quod harum corporis nemo accusamus consectetur illo voluptatibus commodi nisi at quae, numquam minima nesciunt nostrum qui.',
            'property_id' => 5,
            "country_id" => 105,
            'address' => 'Iraq',
            'views' => 0,
            'product_location' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6835690.383602591!2d43.714386999999995!3d33.220926399999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1557823d54f54a11%3A0x6da561bba2061602!2sIraq!5e0!3m2!1sen!2sbd!4v1681730817615!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'reacts' => 0,
            'phone' => '111111',
            'website' => "Null",
            'status' => 1,
            'featured_id' => 1,
            'expiry_date' => '2023-04-30 16:40:03',
            'featured_expiry_date' => '2023-04-30 16:40:03'
        ]);
        AdPost::create([
            'user_id' => 1,
            'ad_title' => 'Some serious health outcomes',
            'category_id' => 6,
            'package_id' => 2,
            'price' => 300,
            'ad_type' => 'Null',
            'short_desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quis accusamus totam facilis molestiae ratione suscipit eum at cum laboriosam? Iste saepe est natus, velit maxime itaque tenetur necessitatibus hic perferendis quis incidunt, numquam aspernatur odio. Neque, asperiores corrupti. Illum a facere repudiandae magnam magni cum ea eos labore est asperiores aut ducimus consectetur officiis, vero doloribus quos dolore hic tempora sed veritatis rerum voluptatum! Veritatis obcaecati placeat rem explicabo impedit eos minima, culpa veniam quae sed nam eligendi nihil eius perspiciatis illo? Possimus facere consequuntur tempora sint modi veritatis amet quasi magni aliquid reiciendis aliquam illo corporis voluptatem obcaecati, ullam nulla cumque, aut sunt at expedita. Assumenda mollitia repudiandae magni similique corporis incidunt voluptatum! Exercitationem, autem? Maiores saepe sequi facere tenetur amet eligendi eius, expedita voluptatum officiis exercitationem nobis. Est, quia, recusandae quod harum corporis nemo accusamus consectetur illo voluptatibus commodi nisi at quae, numquam minima nesciunt nostrum qui.",
            'long_desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quis accusamus totam facilis molestiae ratione suscipit eum at cum laboriosam? Iste saepe est natus, velit maxime itaque tenetur necessitatibus hic perferendis quis incidunt, numquam aspernatur odio. Neque, asperiores corrupti. Illum a facere repudiandae magnam magni cum ea eos labore est asperiores aut ducimus consectetur officiis, vero doloribus quos dolore hic tempora sed veritatis rerum voluptatum! Veritatis obcaecati placeat rem explicabo impedit eos minima, culpa veniam quae sed nam eligendi nihil eius perspiciatis illo? Possimus facere consequuntur tempora sint modi veritatis amet quasi magni aliquid reiciendis aliquam illo corporis voluptatem obcaecati, ullam nulla cumque, aut sunt at expedita. Assumenda mollitia repudiandae magni similique corporis incidunt voluptatum! Exercitationem, autem? Maiores saepe sequi facere tenetur amet eligendi eius, expedita voluptatum officiis exercitationem nobis. Est, quia, recusandae quod harum corporis nemo accusamus consectetur illo voluptatibus commodi nisi at quae, numquam minima nesciunt nostrum qui.',
            'property_id' => 6,
            "country_id" => 96,
            'address' => 'Haiti',
            'views' => 0,
            'product_location' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1931138.58501788!2d-74.43491609862268!3d19.030512488630414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eb6c6f37fcbbb11%3A0xb51438b24c54f6d3!2sHaiti!5e0!3m2!1sen!2sbd!4v1681731075387!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'reacts' => 0,
            'phone' => '111111',
            'website' => "Null",
            'status' => 1,
            'featured_id' => 1,
            'expiry_date' => '2023-04-30 16:40:03',
            'featured_expiry_date' => '2023-04-30 16:40:03'
        ]);
        AdPost::create([
            'user_id' => 1,
            'ad_title' => 'Owning property is legally complex',
            'category_id' => 7,
            'package_id' => 2,
            'price' => 300,
            'ad_type' => 'Null',
            'short_desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quis accusamus totam facilis molestiae ratione suscipit eum at cum laboriosam? Iste saepe est natus, velit maxime itaque tenetur necessitatibus hic perferendis quis incidunt, numquam aspernatur odio. Neque, asperiores corrupti. Illum a facere repudiandae magnam magni cum ea eos labore est asperiores aut ducimus consectetur officiis, vero doloribus quos dolore hic tempora sed veritatis rerum voluptatum! Veritatis obcaecati placeat rem explicabo impedit eos minima, culpa veniam quae sed nam eligendi nihil eius perspiciatis illo? Possimus facere consequuntur tempora sint modi veritatis amet quasi magni aliquid reiciendis aliquam illo corporis voluptatem obcaecati, ullam nulla cumque, aut sunt at expedita. Assumenda mollitia repudiandae magni similique corporis incidunt voluptatum! Exercitationem, autem? Maiores saepe sequi facere tenetur amet eligendi eius, expedita voluptatum officiis exercitationem nobis. Est, quia, recusandae quod harum corporis nemo accusamus consectetur illo voluptatibus commodi nisi at quae, numquam minima nesciunt nostrum qui.",
            'long_desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quis accusamus totam facilis molestiae ratione suscipit eum at cum laboriosam? Iste saepe est natus, velit maxime itaque tenetur necessitatibus hic perferendis quis incidunt, numquam aspernatur odio. Neque, asperiores corrupti. Illum a facere repudiandae magnam magni cum ea eos labore est asperiores aut ducimus consectetur officiis, vero doloribus quos dolore hic tempora sed veritatis rerum voluptatum! Veritatis obcaecati placeat rem explicabo impedit eos minima, culpa veniam quae sed nam eligendi nihil eius perspiciatis illo? Possimus facere consequuntur tempora sint modi veritatis amet quasi magni aliquid reiciendis aliquam illo corporis voluptatem obcaecati, ullam nulla cumque, aut sunt at expedita. Assumenda mollitia repudiandae magni similique corporis incidunt voluptatum! Exercitationem, autem? Maiores saepe sequi facere tenetur amet eligendi eius, expedita voluptatum officiis exercitationem nobis. Est, quia, recusandae quod harum corporis nemo accusamus consectetur illo voluptatibus commodi nisi at quae, numquam minima nesciunt nostrum qui.',
            'property_id' => 7,
            "country_id" => 66,
            'address' => 'Egypt',
            'views' => 0,
            'product_location' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7292988.162061246!2d25.577651881303204!3d26.807193247113364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14368976c35c36e9%3A0x2c45a00925c4c444!2sEgypt!5e0!3m2!1sen!2sbd!4v1681731191688!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'reacts' => 0,
            'phone' => '111111',
            'website' => "Null",
            'status' => 1,
            'featured_id' => 1,
            'expiry_date' => '2023-04-30 16:40:03',
            'featured_expiry_date' => '2023-04-30 16:40:03'
        ]);
        AdPost::create([
            'user_id' => 1,
            'ad_title' => 'If you teach with technology in any form',
            'category_id' => 4,
            'package_id' => 2,
            'price' => 300,
            'ad_type' => 'Null',
            'short_desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quis accusamus totam facilis molestiae ratione suscipit eum at cum laboriosam? Iste saepe est natus, velit maxime itaque tenetur necessitatibus hic perferendis quis incidunt, numquam aspernatur odio. Neque, asperiores corrupti. Illum a facere repudiandae magnam magni cum ea eos labore est asperiores aut ducimus consectetur officiis, vero doloribus quos dolore hic tempora sed veritatis rerum voluptatum! Veritatis obcaecati placeat rem explicabo impedit eos minima, culpa veniam quae sed nam eligendi nihil eius perspiciatis illo? Possimus facere consequuntur tempora sint modi veritatis amet quasi magni aliquid reiciendis aliquam illo corporis voluptatem obcaecati, ullam nulla cumque, aut sunt at expedita. Assumenda mollitia repudiandae magni similique corporis incidunt voluptatum! Exercitationem, autem? Maiores saepe sequi facere tenetur amet eligendi eius, expedita voluptatum officiis exercitationem nobis. Est, quia, recusandae quod harum corporis nemo accusamus consectetur illo voluptatibus commodi nisi at quae, numquam minima nesciunt nostrum qui.",
            'long_desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quis accusamus totam facilis molestiae ratione suscipit eum at cum laboriosam? Iste saepe est natus, velit maxime itaque tenetur necessitatibus hic perferendis quis incidunt, numquam aspernatur odio. Neque, asperiores corrupti. Illum a facere repudiandae magnam magni cum ea eos labore est asperiores aut ducimus consectetur officiis, vero doloribus quos dolore hic tempora sed veritatis rerum voluptatum! Veritatis obcaecati placeat rem explicabo impedit eos minima, culpa veniam quae sed nam eligendi nihil eius perspiciatis illo? Possimus facere consequuntur tempora sint modi veritatis amet quasi magni aliquid reiciendis aliquam illo corporis voluptatem obcaecati, ullam nulla cumque, aut sunt at expedita. Assumenda mollitia repudiandae magni similique corporis incidunt voluptatum! Exercitationem, autem? Maiores saepe sequi facere tenetur amet eligendi eius, expedita voluptatum officiis exercitationem nobis. Est, quia, recusandae quod harum corporis nemo accusamus consectetur illo voluptatibus commodi nisi at quae, numquam minima nesciunt nostrum qui.',
            'property_id' => 8,
            "country_id" => 142,
            'address' => 'Mexico',
            'views' => 0,
            'product_location' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15019565.850544812!2d-113.28720246443137!3d23.21081775078006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x84043a3b88685353%3A0xed64b4be6b099811!2sMexico!5e0!3m2!1sen!2sbd!4v1681731360146!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'reacts' => 0,
            'phone' => '111111',
            'website' => "Null",
            'status' => 1,
            'featured_id' => 1,
            'expiry_date' => '2023-04-30 16:40:03',
            'featured_expiry_date' => '2023-04-30 16:40:03'
        ]);
    }
}
