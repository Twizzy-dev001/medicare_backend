<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'Administrator',
            'slug' => 'admin',
            'description' => 'System administrator with full access',
        ]);

        Role::create([
            'name' => 'User',
            'slug' => 'user',
            'description' => 'Regular user with limited access',
        ]);

        Role::create([
            'name' => 'Staff',
            'slug' => 'staff',
            'description' => 'Regular staff member',
        ]);

        Role::create([
            'name' => 'Customer',
            'slug' => 'customer',
            'description' => 'Customer user with customer-related access',
        ]);
    }
}
