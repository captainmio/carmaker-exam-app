<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CarColorController;
use App\Http\Controllers\Api\CarTypeController;
use App\Http\Controllers\Api\CarManufacturerController;
use App\Http\Controllers\Api\CarController;
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
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('me', [AuthController::class, 'loginUser']);

Route::prefix('car')->middleware('auth:api')->group(function () {

    Route::get('/attributes', [CarController::class, 'getAttributes']);
    Route::post('/', [CarController::class, 'store']);
    Route::get('/', [CarController::class, 'index']);

    Route::prefix('color')->group(function () {
        Route::get('/', [CarColorController::class, 'index']);
        Route::post('/', [CarColorController::class, 'store']);
        Route::delete('/{id}', [CarColorController::class, 'destroy']);
    });

    Route::prefix('type')->group(function () {
        Route::get('/', [CarTypeController::class, 'index']);
        Route::post('/', [CarTypeController::class, 'store']);
        Route::delete('/{id}', [CarTypeController::class, 'destroy']);
    });

    Route::prefix('manufacturer')->group(function () {
        Route::get('/', [CarManufacturerController::class, 'index']);
        Route::post('/', [CarManufacturerController::class, 'store']);
        Route::delete('/{id}', [CarManufacturerController::class, 'destroy']);
    });
});