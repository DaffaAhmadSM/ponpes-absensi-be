<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $role_id
 * @property int $attendance_time_settings_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\AttendanceTimeSetting $attendanceTimeSetting
 * @property-read \App\Models\Role $role
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleAttendanceTime newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleAttendanceTime newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleAttendanceTime query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleAttendanceTime whereAttendanceTimeSettingsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleAttendanceTime whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleAttendanceTime whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleAttendanceTime whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RoleAttendanceTime whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
