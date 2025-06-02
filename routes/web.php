<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])->name('products.index');

Route::post('/products/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
