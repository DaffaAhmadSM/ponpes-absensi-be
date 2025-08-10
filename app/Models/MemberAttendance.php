<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $instance_location_id
 * @property string $attendance_date
 * @property string|null $check_in_time
 * @property string|null $check_out_time
 * @property string $check_in_status
 * @property string|null $check_out_status
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\InstanceLocation $instanceLocation
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MemberAttendance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MemberAttendance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MemberAttendance query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MemberAttendance whereAttendanceDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MemberAttendance whereCheckInStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MemberAttendance whereCheckInTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MemberAttendance whereCheckOutStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MemberAttendance whereCheckOutTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MemberAttendance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MemberAttendance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MemberAttendance whereInstanceLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MemberAttendance whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MemberAttendance whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MemberAttendance whereUserId($value)
 * @mixin \Eloquent
 */
class MemberAttendance extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function instanceLocation()
    {
        return $this->belongsTo(InstanceLocation::class);
    }
}
