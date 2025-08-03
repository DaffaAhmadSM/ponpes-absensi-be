<?php

Route::group(['middleware' => 'auth:sanctum', 'prefix' => 'attendance'], function () {
    Route::get('/list', [\App\Http\Controllers\api\AttendanceController::class, 'index'])->name('attendance.list');
    Route::post('/check-in', [\App\Http\Controllers\api\AttendanceController::class, 'checkIn'])->name('attendance.check-in');
    Route::post('/check-out', [\App\Http\Controllers\api\AttendanceController::class, 'checkOut'])->name('attendance.check-out');
});