<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

//Products Routes
Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
Route::post('/products/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('products.create');

//Categories Routes
Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
