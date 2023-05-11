<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blogs;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blogs::create([
            'user_id'        => 1,
            'category_id'    => 1,
            'title'          => "Ut enim ad minima veniam, quis",
            'sub_title'      => "Ut enim ad minima veniam, quis exercitationem Ut enim ad minima veniam, quis exercitationem Ut enim ad minima veniam, quis exercitationem",
            'slug'           => "ut-enim-ad-minima-veniam-quis-exercitationem",
            'video_link'     => "tK9Oc6AEnR4",
            'description'    => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Metus cum cursus nunc nec velit volutpat consequat. Vitae dui, massa viverra nam dui laoreet ipsum. Sagittis sed feugiat blandit adipiscing mauris. Facilisis dictum in tellus ac turpis. Pretium, facilisis turpis duis pulvinar blandit est. Dolor accumsan pellentesque ullamcorper volutpat urna arcu. Nisi nulla et mauris et, ultricies odio semper gravida. Justo, lorem leo ullamcorper leo ornare phasellus. Dolor tristique sem quam eget tempor aliquet sem amet, eget. Vitae id mattis consectetur gravida sit lorem donec. Phasellus enim sodales congue varius arcu et, pulvinar ultrices. Faucibus nulla massa erat ut. Egestas integer pharetra proin pellentesque tellus quis pulvinar mauris. Sed quisque pellentesque platea vel. Proin felis tellus nunc risus tortor, nibh. Vulputate mauris fermentum tincidunt diam sed. Vel interdum nisl, pellentesque ante consectetur. At praesent lorem placerat nibh nunc. Massa lectus id et amet quam venenatis, in mus. Arcu cras risus est porttitor tincidunt posuere feugiat. Sem velit ornare id duis Amet nullam eget mus diam nisl, vel. Sed at id quam bibendum lacus felis. Porta arcu, nunc ultricies",
        ]);

        Blogs::create([
            'user_id'        => 1,
            'category_id'    => 2,
            'title'          => "Ut enim ad minima veniam, quis exercitationem",
            'sub_title'      => "Ut enim ad minima veniam, quis exercitationem Ut enim ad minima veniam, quis exercitationem Ut enim ad minima veniam, quis exercitationem",
            'slug'           => "ut-enim-ad-minima-veniam-quis-exercitationem",
            'video_link'     => "tK9Oc6AEnR4",
            'description'    => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Metus cum cursus nunc nec velit volutpat consequat. Vitae dui, massa viverra nam dui laoreet ipsum. Sagittis sed feugiat blandit adipiscing mauris. Facilisis dictum in tellus ac turpis. Pretium, facilisis turpis duis pulvinar blandit est. Dolor accumsan pellentesque ullamcorper volutpat urna arcu. Nisi nulla et mauris et, ultricies odio semper gravida. Justo, lorem leo ullamcorper leo ornare phasellus. Dolor tristique sem quam eget tempor aliquet sem amet, eget. Vitae id mattis consectetur gravida sit lorem donec. Phasellus enim sodales congue varius arcu et, pulvinar ultrices. Faucibus nulla massa erat ut. Egestas integer pharetra proin pellentesque tellus quis pulvinar mauris. Sed quisque pellentesque platea vel. Proin felis tellus nunc risus tortor, nibh. Vulputate mauris fermentum tincidunt diam sed. Vel interdum nisl, pellentesque ante consectetur. At praesent lorem placerat nibh nunc. Massa lectus id et amet quam venenatis, in mus. Arcu cras risus est porttitor tincidunt posuere feugiat. Sem velit ornare id duis Amet nullam eget mus diam nisl, vel. Sed at id quam bibendum lacus felis. Porta arcu, nunc ultricies",
        ]);

        Blogs::create([
            'user_id'        => 1,
            'category_id'    => 2,
            'title'          => "Ut enim ad minima veniam, quis exercitationem",
            'sub_title'      => "Ut enim ad minima veniam, quis exercitationem Ut enim ad minima veniam, quis exercitationem Ut enim ad minima veniam, quis exercitationem",
            'slug'           => "ut-enim-ad-minima-veniam-quis-exercitationem",
            'video_link'     => "tK9Oc6AEnR4",
            'description'    => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Metus cum cursus nunc nec velit volutpat consequat. Vitae dui, massa viverra nam dui laoreet ipsum. Sagittis sed feugiat blandit adipiscing mauris. Facilisis dictum in tellus ac turpis. Pretium, facilisis turpis duis pulvinar blandit est. Dolor accumsan pellentesque ullamcorper volutpat urna arcu. Nisi nulla et mauris et, ultricies odio semper gravida. Justo, lorem leo ullamcorper leo ornare phasellus. Dolor tristique sem quam eget tempor aliquet sem amet, eget. Vitae id mattis consectetur gravida sit lorem donec. Phasellus enim sodales congue varius arcu et, pulvinar ultrices. Faucibus nulla massa erat ut. Egestas integer pharetra proin pellentesque tellus quis pulvinar mauris. Sed quisque pellentesque platea vel. Proin felis tellus nunc risus tortor, nibh. Vulputate mauris fermentum tincidunt diam sed. Vel interdum nisl, pellentesque ante consectetur. At praesent lorem placerat nibh nunc. Massa lectus id et amet quam venenatis, in mus. Arcu cras risus est porttitor tincidunt posuere feugiat. Sem velit ornare id duis Amet nullam eget mus diam nisl, vel. Sed at id quam bibendum lacus felis. Porta arcu, nunc ultricies",
        ]);

        Blogs::create([
            'user_id'        => 1,
            'category_id'    => 2,
            'title'          => "Ut enim ad minima veniam, quis exercitationem",
            'sub_title'      => "Ut enim ad minima veniam, quis exercitationem Ut enim ad minima veniam, quis exercitationem Ut enim ad minima veniam, quis exercitationem",
            'slug'           => "ut-enim-ad-minima-veniam-quis-exercitationem",
            'image'          => "blog1.jpg",
            'description'    => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Metus cum cursus nunc nec velit volutpat consequat. Vitae dui, massa viverra nam dui laoreet ipsum. Sagittis sed feugiat blandit adipiscing mauris. Facilisis dictum in tellus ac turpis. Pretium, facilisis turpis duis pulvinar blandit est. Dolor accumsan pellentesque ullamcorper volutpat urna arcu. Nisi nulla et mauris et, ultricies odio semper gravida. Justo, lorem leo ullamcorper leo ornare phasellus. Dolor tristique sem quam eget tempor aliquet sem amet, eget. Vitae id mattis consectetur gravida sit lorem donec. Phasellus enim sodales congue varius arcu et, pulvinar ultrices. Faucibus nulla massa erat ut. Egestas integer pharetra proin pellentesque tellus quis pulvinar mauris. Sed quisque pellentesque platea vel. Proin felis tellus nunc risus tortor, nibh. Vulputate mauris fermentum tincidunt diam sed. Vel interdum nisl, pellentesque ante consectetur. At praesent lorem placerat nibh nunc. Massa lectus id et amet quam venenatis, in mus. Arcu cras risus est porttitor tincidunt posuere feugiat. Sem velit ornare id duis Amet nullam eget mus diam nisl, vel. Sed at id quam bibendum lacus felis. Porta arcu, nunc ultricies",
        ]);
    }
}
