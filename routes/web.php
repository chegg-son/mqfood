<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Admin Route
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('action.login');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('action.logout')->middleware('auth');
Route::middleware(['isAdmin'])->group(function () {
    Route::get('/admin-panel', function () {
        return view('pages.admin.index');
    })->name('admin.panel');

    // Barang Route
    Route::get('/products', [BarangController::class, 'index'])->name('master.product');
    Route::get('/products/create', [BarangController::class, 'create'])->name('add.product');
    Route::post('products', [BarangController::class, 'store'])->name('action.add.product');
    Route::get('/edit-product/{id}', [BarangController::class, 'edit'])->name('edit.product');
    Route::put('edit-product/{id}', [BarangController::class, 'update'])->name('action.edit.product');
    Route::delete('/delete-product/{id}', [BarangController::class, 'destroy'])->name('delete.product');
});
// Route::get('/admin-panel', function () {
//     return view('pages.admin.index');
// })->name('admin.panel')->middleware('auth');

// User Route
Route::get('/', [KategoriController::class, 'index'])->name('home');
Route::get('users', [UserController::class, 'index'])->name('users');
Route::post('adduser', [UserController::class, 'add'])->name('add.user');
Route::get('/checkout', function () {
    return view('pages.user.checkout');
})->name('checkout')->middleware('auth');

// use route resources for kategoris
Route::resource('category', KategoriController::class);
