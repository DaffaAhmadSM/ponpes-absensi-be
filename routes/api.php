<?php

use App\Http\Controllers\api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/user", function (Request $request) {
    return $request->user();
})->middleware("auth:sanctum");

Route::get("unathorized", function () {
    return response()->json(["error" => "Unauthorized"], 401);
})->name("login");

Route::post("login", [AuthController::class, "login"]);
Route::post("logout", [AuthController::class, "logout"])->middleware(
    "auth:sanctum",
);
