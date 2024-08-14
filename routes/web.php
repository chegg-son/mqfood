<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main.index');
});

Route::get('/admin-panel', function () {
    return view('admin.index');
});
