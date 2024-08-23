<?php

use App\Http\Controllers\BarangController;
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
Route::middleware(['isAdmin'])->group(function () {
    Route::get('/admin-panel', function () {
        return view('pages.admin.index');
    })->name('admin.panel');
    Route::get('/master-product', [BarangController::class, 'index'])->name('master.product');
    Route::get('/add-product', [BarangController::class, 'create'])->name('add.product');
    Route::post('actionaddproduct', [BarangController::class, 'add'])->name('action.add.product');
});
// Route::get('/admin-panel', function () {
//     return view('pages.admin.index');
// })->name('admin.panel')->middleware('auth');

// User Route
Route::get('/', [KategoriController::class, 'index'])->name('home');
Route::get('/checkout', function () {
    return view('pages.user.checkout');
})->name('checkout')->middleware('auth');

// use route resources for kategoris
Route::resource('category', KategoriController::class);
