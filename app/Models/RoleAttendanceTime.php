<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleAttendanceTime extends Model
{
    protected $fillable = [
        'role_id',
        'attendance_time_settings_id',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function attendanceTimeSetting()
    {
        return $this->belongsTo(AttendanceTimeSetting::class, 'attendance_time_settings_id');
    }
}
