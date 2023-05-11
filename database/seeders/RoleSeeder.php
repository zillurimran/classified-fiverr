<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Role::create([
            'name' => 'admin',
            'permissions' => json_encode(['create', 'read', 'update', 'delete']),
        ]);

        Role::create([
            'name' => 'user',
            'permissions' => json_encode(['read']),
        ]);

        Role::create([
            'name' => 'agent',
            'permissions' => json_encode(['read', 'update', 'delete']),
        ]);

        Role::create([
            'name' => 'moderator',
            'permissions' => json_encode(['read', 'update']),
        ]);
    }
}
