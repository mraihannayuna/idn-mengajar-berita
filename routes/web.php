<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::get('register', [AuthController::class, 'register_form'])->name('auth.register.form');
Route::post('register', [AuthController::class, 'register'])->name('auth.register');

Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::resource('posts', PostController::class);
