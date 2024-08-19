<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;


Route::get('/', [KategoriController::class, 'index'])->name('user');

Route::get('/admin-panel', function () {
    return view('pages.admin.index');
})->name('admin');

Route::get('/checkout', function () {
    return view('pages.user.checkout');
})->name('checkout');

// use route resources for kategoris
Route::resource('category', KategoriController::class);
