<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::middleware('jwt.verify')->group(function (){
    Route::get('/person', [\App\Http\Controllers\PersonController::class, 'all']);
    Route::get('/person/{id}', [\App\Http\Controllers\PersonController::class, 'index']);
    Route::get('/planets', [\App\Http\Controllers\PlanetController::class, 'all']);
    Route::get('/planets/{id}', [\App\Http\Controllers\PlanetController::class, 'index']);
    Route::get('/vehicles', [\App\Http\Controllers\VehicleController::class, 'all']);
    Route::get('/vehicles/{id}', [\App\Http\Controllers\VehicleController::class, 'index']);
});