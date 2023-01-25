<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\QoutesController;
use App\Http\Controllers\RegisterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home
Route::resource('/qoutes', QoutesController::class);

// Authentication
Route::get('auth/register', [RegisterController::class, 'index']);
Route::post('auth/register', [RegisterController::class, 'store']);

Route::get('auth/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('auth/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::delete('auth/logout', [LoginController::class, 'logout'])->middleware('auth');

// User
Route::get('/user', [UserController::class, 'index'])->middleware('auth');
