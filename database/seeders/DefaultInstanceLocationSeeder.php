<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultInstanceLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\InstanceLocation::create([
            'name' => 'Default Location',
            'longitude' => '0.0000',
            'latitude' => '0.0000',
            'description' => 'This is the default instance location.',
        ]);
    }
}
