<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ObreiroMiddleware;
use App\Http\Middleware\PastorMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');

Route::middleware('auth')->group(function(){
    Route::middleware(ObreiroMiddleware::class)
        ->get('/oferta', [App\Http\Controllers\OfertaController::class, 'create'])
        ->name('create-oferta');
    Route::middleware(PastorMiddleware::class)
        ->get('/relatorio', [App\Http\Controllers\OfertaController::class, 'list'])
        ->name('relatorio-oferta');
});
