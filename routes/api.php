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

Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('auth.register');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('auth.login');

Route::middleware('jwt.verify')->group(function (){
    Route::get('/person', [\App\Http\Controllers\PersonController::class, 'all'])->name('person.all');
    Route::get('/person/{id}', [\App\Http\Controllers\PersonController::class, 'index'])->name('person.id');
    Route::get('/planets', [\App\Http\Controllers\PlanetController::class, 'all'])->name('planets.all');
    Route::get('/planets/{id}', [\App\Http\Controllers\PlanetController::class, 'index'])->name('planets.id');
    Route::get('/vehicles', [\App\Http\Controllers\VehicleController::class, 'all'])->name('vehicles.all');
    Route::get('/vehicles/{id}', [\App\Http\Controllers\VehicleController::class, 'index'])->name('vehicles.id');
});