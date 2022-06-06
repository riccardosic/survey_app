<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'destroy']);
    Route::resource('/survey', \App\Http\Controllers\SurveyController::class);
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index']);
});
Route::post('/register', [AuthController::class, 'store']);
Route::post('/login', [AuthController::class, 'index']);