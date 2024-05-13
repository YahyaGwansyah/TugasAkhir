<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return redirect()->route('login');
});


// routes/web.php


// Route untuk admin
Route::group(['middleware' => ['auth', 'admin']], function () {
    // Admin dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/artikel', ArtikelController::class);
    Route::resource('/kategori', KategoriController::class);

    // Admin-only routes
});

// Route untuk user
Route::group(['middleware' => ['auth']], function () {
    // User dashboard
    Route::get('/user/index', [UserController::class, 'index'])->name('user.index');

    // User-only routes
});

