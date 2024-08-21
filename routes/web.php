<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Users Route
Route::get('users', [UserController::class, 'index'])->name('users');
Route::post('adduser', [UserController::class, 'add'])->name('add.user');

// Admin Route
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('action.login');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('action.logout')->middleware('auth');
Route::get('/admin-panel', function () {
    return view('pages.admin.index');
})->name('admin.panel')->middleware('auth');

// User Route
Route::get('/', [KategoriController::class, 'index'])->name('user');
Route::get('/checkout', function () {
    return view('pages.user.checkout');
})->name('checkout');

// use route resources for kategoris
Route::resource('category', KategoriController::class);
