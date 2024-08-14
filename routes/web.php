<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.user.index');
})->name('user');

Route::get('/admin-panel', function () {
    return view('pages.admin.index');
})->name('admin');

Route::get('/checkout', function () {
    return view('pages.user.checkout');
})->name('checkout');
