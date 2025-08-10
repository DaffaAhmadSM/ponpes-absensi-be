<?php

namespace Database\Seeders;

use App\Models\AttendanceTimeSetting;
use Illuminate\Database\Seeder;

class AttendanceTimeSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AttendanceTimeSetting::create([
            'name' => 'Default',
            'check_in_start' => '07:00:00',
            'check_in_end' => '08:00:00',
            'check_out_start' => '16:00:00',
            'check_out_end' => '17:00:00',
            'default' => true,
            'grace_period_minutes' => 15,
        ]);
    }
}
