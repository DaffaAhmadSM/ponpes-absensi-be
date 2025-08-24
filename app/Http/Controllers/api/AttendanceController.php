<?php

namespace App\Http\Controllers\api;

use App\Enums\AttendanceStatus;
use App\Http\Controllers\Controller;
use App\Models\AppSetting;
use App\Models\AttendanceTimeSetting;
use App\Models\InstanceLocation;
use App\Models\MemberAttendance;
use App\Models\RoleAttendanceTime;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    // private int $max_distance_km = 2;

    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'date',
            'month' => 'date_format:Ym',
            'year' => 'date_format:Y',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $attendace = MemberAttendance::where('user_id', $request->user()->id);

        // $attendace = $request->user()->memberAttendances();
        if ($request->has('month')) {
            $attendace = $attendace->whereMonth('attendance_date', Carbon::createFromFormat('Ym', $request->month)->month);
        }
        if ($request->has('year')) {
            $attendace = $attendace->whereYear('attendance_date', Carbon::createFromFormat('Y', $request->year)->year);
        }

        $attendace = $attendace->orderBy('attendance_date', 'desc')
            ->cursorPaginate(100);

        return response()->json($attendace);

    }

    public function checkIn(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $check_attendance = MemberAttendance::where('user_id', $request->user()->id)
            ->where('attendance_date', Carbon::parse($request->date))
            ->first();

        if ($check_attendance) {
            return response()->json(['message' => 'User has already checked in on this date'], 422);
        }

        $default_location = InstanceLocation::where('default', true)->first();
        if (! $default_location) {
            return response()->json(['message' => 'default location not found'], 500);
        }
        // harvesine formula to calculate distance
        $distance = $this->haversineGreatCircleDistance(
            $default_location->latitude,
            $default_location->longitude,
            $request->latitude,
            $request->longitude
        );



        $checkin_calc = AttendanceStatus::PRESENT;
        if ($distance > $this->max_distance_km() * 1000) {
            $checkin_calc = AttendanceStatus::OUT_OF_RANGE; // out of range
        }

        if ($checkin_calc != AttendanceStatus::OUT_OF_RANGE) {
            $checkin_calc = $this->checkInCalculation(now(), $request->user());
        }

        $status = '';
//        check if checkin_calc is string return error
        if (is_string($checkin_calc)) {
            return response()->json(['message' => $checkin_calc], 422);
        }else{
            $status = $checkin_calc->label();
        }

        MemberAttendance::create([
            'user_id' => $request->user()->id,
            'instance_location_id' => $default_location->id,
            'attendance_date' => Carbon::parse($request->date),
            'check_in_time' => now(),
            'check_in_status' => $status,
            'check_in_latitude' => $request->latitude,
            'check_in_longitude' => $request->longitude,
            'notes' => $request->notes ?? null,
        ]);

        return response()->json(['message' => 'Check-in successful']);
    }

    public function checkout(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
        ]);

        $attendance = MemberAttendance::where('user_id', $request->user()->id)
            ->where('attendance_date', Carbon::parse($request->date))
            ->first();
        if (! $attendance) {
            return response()->json(['message' => 'User has not checked in yet on this date'], 404);
        }

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $default_location = InstanceLocation::where('default', true)->first();
        if (! $default_location) {
            return response()->json(['message' => 'default location not found'], 500);
        }
        // harvesine formula to calculate distance
        $distance = $this->haversineGreatCircleDistance(
            $default_location->latitude,
            $default_location->longitude,
            $request->latitude,
            $request->longitude
        );

        $checkout_calc = AttendanceStatus::PRESENT;

        if ($distance > $this->max_distance_km() * 1000) {
            $checkout_calc = AttendanceStatus::OUT_OF_RANGE; // out of range
        }
        if ($checkout_calc != AttendanceStatus::OUT_OF_RANGE) {
            $checkout_calc = $this->checkOutCalculation(now(), $request->user());
        }

        $status = '';

        // check if checkout_calc is string return error
        if (is_string($checkout_calc)) {
            return response()->json(['message' => $checkout_calc], 422);
        }else{
            $status = $checkout_calc->label();
        }

        if ($attendance->check_out_time != null) {
            return response()->json(['message' => 'User has already checked out'], 422);
        }

        $attendance->check_out_time = now();
        $attendance->check_out_status = $status;
        $attendance->check_out_latitude = $request->latitude;
        $attendance->check_out_longitude = $request->longitude;
        $attendance->save();

        return response()->json(['message' => 'Check-out successful']);
    }

    private function checkInCalculation(Carbon $checkinTime, User $user): string|AttendanceStatus
    {
        // 1 present
        // 2 late
        // error string
        $userRole = $user->role_id;

        $role_attendance_setting = RoleAttendanceTime::where('role_id', $userRole)->with('attendanceTimeSetting')
            ->first();
        if (! $role_attendance_setting) {
            return 'Role attendance time setting not found please contact admin';
        }

        $checkInStart = Carbon::parse($role_attendance_setting->attendanceTimeSetting->check_in_start);
        $checkInEnd = Carbon::parse($role_attendance_setting->attendanceTimeSetting->check_in_end)
            ->addMinutes($role_attendance_setting->attendanceTimeSetting->grace_period_minutes);

        if ($checkinTime > $checkInEnd) {
            return AttendanceStatus::LATE; // late
        }
        if ($checkinTime < $checkInStart) {
            return AttendanceStatus::TO_EARLY; // to early
        }

        return AttendanceStatus::ON_TIME; // on time
    }

    private function max_distance_km(): int
    {
        $rad = AppSetting::where('key', 'radius')->first();
        if (! $rad) {
            return 2; // default radius
        }
        return (int) $rad->value;
    }

    private function checkOutCalculation(Carbon $checkoutTime, User $user): string|AttendanceStatus
    {
        // 1 present
        // 2 to early
        // error string

        $userRole = $user->role_id;
        $role_attendance_setting = RoleAttendanceTime::where('role_id', $userRole)->with('attendanceTimeSetting')
            ->first();
        if (! $role_attendance_setting) {
            return 'Role attendance time setting not found';
        }

        $checkOutStart = Carbon::parse($role_attendance_setting->attendanceTimeSetting->check_out_start);
        $checkOutEnd = Carbon::parse($role_attendance_setting->attendanceTimeSetting->check_out_end);

        if ($checkoutTime < $checkOutStart) {
            return AttendanceStatus::TO_EARLY;
        }

        if ($checkoutTime > $checkOutEnd) {
            return AttendanceStatus::LATE;
        }

        return AttendanceStatus::ON_TIME;
    }

    private function haversineGreatCircleDistance(
        $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
    {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
          cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));

        return $angle * $earthRadius;
    }
}
