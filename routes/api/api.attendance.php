<?php

use App\Http\Controllers\api\AttendanceController;

Route::group(['middleware' => 'auth:sanctum', 'prefix' => 'attendance'], function () {
    Route::post('/check-in', [AttendanceController::class, 'checkIn'])->name('attendance.check-in');
    Route::post('/check-out', [AttendanceController::class, 'checkOut'])->name('attendance.check-out');
    Route::get('/history', [AttendanceController::class, 'index'])->name('attendance.list');
});
