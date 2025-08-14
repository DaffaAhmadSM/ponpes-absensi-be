<?php

namespace Database\Seeders;

use App\Models\AttendanceTimeSetting;
use App\Models\RoleAttendanceTime;
use Illuminate\Database\Seeder;

class AttendanceTimeSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AttendanceTimeSetting::create([
            'id' => 1,
            'name' => 'Default',
            'check_in_start' => '07:00:00',
            'check_in_end' => '08:00:00',
            'check_out_start' => '16:00:00',
            'check_out_end' => '17:00:00',
            'default' => true,
            'grace_period_minutes' => 15,
        ]);
        
        
        RoleAttendanceTime::create([
            'role_id' => 1, // Assuming 1 is the ID for the admin role
            'attendance_time_settings_id' => 1,
        ]);
        
        RoleAttendanceTime::create([
            'role_id' => 2, // Assuming 2 is the ID for the teacher role
            'attendance_time_settings_id' => 1,
        ]);
        
    }
}
