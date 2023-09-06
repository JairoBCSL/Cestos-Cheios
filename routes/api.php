<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('jwt.auth')->group(function(){
    Route::apiResource('cargo', App\Http\Controllers\CargoController::class);
    Route::apiResource('membro', App\Http\Controllers\MembroController::class);
    Route::apiResource('oferta', App\Http\Controllers\OfertaController::class);
    Route::post('/me', [App\Http\Controllers\AuthController::class, 'me']);
    Route::post('/refresh', [App\Http\Controllers\AuthController::class, 'refresh']);
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);
});


Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);



