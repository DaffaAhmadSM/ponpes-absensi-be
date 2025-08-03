<?php

use App\Http\Controllers\api\InstanceLocationController;

Route::group(['middleware' => 'auth:sanctum', 'prefix' => 'instance/location'], function () {
    Route::get('default', [InstanceLocationController::class, 'getDefaultLocation'])->name('instance.location.default');
    Route::get('/list', [InstanceLocationController::class, 'index'])->name('instance.location.list');
});
