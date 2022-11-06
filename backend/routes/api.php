<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CarColorController;
use App\Http\Controllers\Api\CarTypeController;
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

Route::prefix('car')->middleware('auth:api')->group(function () {
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
});