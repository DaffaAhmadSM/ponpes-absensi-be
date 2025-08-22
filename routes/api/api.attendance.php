<?php

use App\Http\Controllers\api\AttendanceController;

Route::group(['middleware' => 'auth:sanctum', 'prefix' => 'attendance'], function () {
    Route::get('/history', [AttendanceController::class, 'indzex'])->name('attendance.list');
    Route::post('/check-in', [AttendanceController::class, 'checkIn'])->name('attendance.check-in');
    Route::post('/check-out', [AttendanceController::class, 'checkOut'])->name('attendance.check-out');
});
