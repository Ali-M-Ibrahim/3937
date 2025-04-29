<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\UniController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get("uni",[UniController::class,'index']);
    Route::post("save-uni",[UniController::class,'store']);
    Route::get("uni/{id}",[UniController::class,'view']);
    Route::put("update-uni/{id}",[UniController::class,'update']);
    Route::delete("delete-uni/{id}",[UniController::class,'delete']);
});



Route::get("login",[ApiAuthController::class,'login'])->name("login");
Route::post("register",[ApiAuthController::class,'register']);

