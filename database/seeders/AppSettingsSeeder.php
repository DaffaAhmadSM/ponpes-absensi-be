<?php

namespace Database\Seeders;

use App\Models\AppSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        AppSetting::create([
            'key' => 'radius',
            'value' => '10',
            'type' => 'integer',
            'description' => 'Radius in meters for attendance check-in/check-out',
        ]);

    }
}
