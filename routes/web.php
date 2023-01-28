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
Route::get('/qoutes', [QoutesController::class, 'index']);
Route::get('/qoutes/create', [QoutesController::class, 'create'])->middleware('auth');
Route::post('/qoutes', [QoutesController::class, 'store'])->middleware('auth');

// NOTE : multiple middleware harus array ['middleware_1', 'middleware_2']

Route::resource('/qoutes', QoutesController::class)->middleware(['auth','IsAuthor'])->except(['index','create','store']);

// Route::middleware('auth')->group(function (){
// 	Route::get('qoutes/{qoutes}/edit', [QoutesController::class, 'edit']);
// });

// Route::resource('/qoutes', QoutesController::class)->except('index')->middleware('auth');

// Authentication
Route::get('auth/register', [RegisterController::class, 'index']);
Route::post('auth/register', [RegisterController::class, 'store']);

Route::get('auth/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('auth/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::delete('auth/logout', [LoginController::class, 'logout'])->middleware('auth');

// User
Route::get('/user', [UserController::class, 'index'])->middleware('auth');

// {user} agar dapat dikenali oleh controller sebagiai route model binding
Route::get('/user/{user}', [UserController::class, 'show'])->middleware('auth');

// Alternatif lain jika tidak ingin merubah identifier di model
// Route::get('/user/{user:username}', [UserController::class, 'show'])->middleware('auth');

Route::get('/user/{username}/edit', [UserController::class, 'edit'])->middleware(['auth', 'ItsMe']);
Route::get('/user/{username}/edit/password', [UserController::class, 'edit'])->middleware(['auth', 'ItsMe']);
Route::put('/user/{username}/edit/password', [UserController::class, 'changePassword'])->middleware(['auth', 'ItsMe']);
Route::put('/user/{username}', [UserController::class, 'update'])->middleware(['auth', 'ItsMe']);

