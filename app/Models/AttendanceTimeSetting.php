<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name Name of the attendance time setting
 * @property string $check_in_start Start time for check-in
 * @property string $check_in_end End time for check-in
 * @property string $check_out_start Start time for check-out
 * @property string $check_out_end End time for check-out
 * @property int $grace_period_minutes Grace period in minutes for late check-in
 * @property int $default Is this the default attendance time setting?
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttendanceTimeSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttendanceTimeSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttendanceTimeSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttendanceTimeSetting whereCheckInEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttendanceTimeSetting whereCheckInStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttendanceTimeSetting whereCheckOutEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttendanceTimeSetting whereCheckOutStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttendanceTimeSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttendanceTimeSetting whereDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttendanceTimeSetting whereGracePeriodMinutes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttendanceTimeSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttendanceTimeSetting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttendanceTimeSetting whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AttendanceTimeSetting extends Model
{
    //
}
