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
            'id' => 1,
            'name' => 'admin',
            'description' => 'Administrator with full access',
        ]);
        
        Role::create([
            'id' => 2,
            'name' => 'teacher',
            'description' => 'Teacher with limited access',
        ]);
        
        Role::create([
            'id' => 3,
            'name' => 'parent',
            'description' => 'Parent with access to child\'s attendance',
        ]);
    }
}
