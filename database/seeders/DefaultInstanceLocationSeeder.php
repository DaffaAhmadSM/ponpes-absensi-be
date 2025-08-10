<?php

namespace Database\Seeders;

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
            'longitude' => 00.00000000,
            'latitude' => 00.00000000,
            'description' => 'This is the default instance location.',
            'default' => true,
            'address' => '123 Default St, Default City, Default Country',
        ]);
    }
}
