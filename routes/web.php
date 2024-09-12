<?php

use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;

// Login Route
Route::get('/login', [LoginController::class, 'login'])->name('login');

// Admin Route
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('action.login');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('action.logout')->middleware('auth');
Route::middleware(['isAdmin'])->group(function () {
    Route::get('/admin-panel', function () {
        return view('pages.admin.index');
    })->name('admin.panel');

    // Management Users Route
    Route::get('/users', [UserController::class, 'index'])->name('master.user');
    Route::get('/users/create', [UserController::class, 'create'])->name('add.user');
    Route::post('/users', [UserController::class, 'store'])->name('action.add.user');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('edit.user');
    Route::put('edit-user/{id}', [UserController::class, 'update'])->name('action.edit.user');
    Route::delete('/delete-user/{id}', [UserController::class, 'destroy'])->name('delete.user');

    // Barang Route
    Route::get('/products', [BarangController::class, 'index'])->name('master.product');
    Route::get('/products/create', [BarangController::class, 'create'])->name('add.product');
    Route::post('products', [BarangController::class, 'store'])->name('action.add.product');
    Route::get('/edit-product/{id}', [BarangController::class, 'edit'])->name('edit.product');
    Route::put('edit-product/{id}', [BarangController::class, 'update'])->name('action.edit.product');
    Route::delete('/delete-product/{id}', [BarangController::class, 'destroy'])->name('delete.product');



    // Management Categorys Route
    Route::get('categories', [KategoriController::class, 'index'])->name('categories');
    Route::get('/categories/create', [KategoriController::class, 'create'])->name('add.category');
    Route::post('category', [KategoriController::class, 'store'])->name('action.add.category');
    Route::get('/edit-category/{id}', [KategoriController::class, 'edit'])->name('edit.category');
    Route::put('edit-category/{id}', [KategoriController::class, 'update'])->name('action.edit.category');
    Route::delete('/delete-category/{id}', [KategoriController::class, 'destroy'])->name('delete.category');
});

// Barang Route Show
Route::get('/products/{id}/show', [BarangController::class, 'show'])->name('show.product');

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [BarangController::class, 'search'])->name('search');

// User Route
Route::get('/checkout', [KeranjangController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::get('/confirmation', [KeranjangController::class, 'confirmation'])->name('confirmation')->middleware('auth');
Route::post('/confirmation', [KeranjangController::class, 'actionconfirm'])->name('action.confirmation')->middleware('auth');
Route::get('orders', [UserController::class, 'orders'])->name('orders')->middleware('auth');

// Livewire Route test
Route::get('counter', Counter::class);
