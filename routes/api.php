<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\Auth\TokenController;
use App\Http\Controllers\TitanController;
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

// PROTECTED ROTUES
Route::middleware(['auth:sanctum', 'admin.token'])->group(function(){
    Route::post('/characters', [CharacterController::class, 'store']);
    Route::delete('/characters/{character}', [CharacterController::class, 'destroy']);
    Route::put('/characters/{character}', [CharacterController::class, 'update']);

    Route::post('/titans', [TitanController::class, 'store']);
    Route::delete('/titans/{titan}', [TitanController::class, 'destroy']);
    Route::put('/titans/{titan}', [TitanController::class, 'update']);
});

Route::get('/characters', [CharacterController::class, 'index']);
Route::get('/characters/{character}', [CharacterController::class, 'show']);

Route::get('/titans', [TitanController::class, 'index']);
Route::get('/titans/{titan}', [TitanController::class, 'show']);

// AUTH
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');

// ADMIN ROUTES
Route::prefix('admin')->middleware(['auth:sanctum', 'admin.token'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    Route::post('/photo-test', [DashboardController::class, 'photo']);
});


// TOKEN ROUTES
Route::middleware('auth:sanctum')->prefix('tokens')->group(function(){
    Route::post('/remove-all', [TokenController::class, 'removeAllTokens']);
    Route::get('/get-user-from-token', function(Request $request){
        return $request->user();
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
