<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

Route::get('/login-admin', function () {
    return view('pages.admin.login');
})->name('login');

Route::post('actionlogin', [KategoriController::class, 'login'])->name('action.login');
Route::get('actionlogout', [KategoriController::class, 'logout'])->name('action.logout');

Route::get('/admin-panel', function () {
    return view('pages.admin.index');
})->name('admin.panel');

Route::get('/', [KategoriController::class, 'index'])->name('user')->middleware('auth');

Route::get('/checkout', function () {
    return view('pages.user.checkout');
})->name('checkout');

// use route resources for kategoris
Route::resource('category', KategoriController::class);
