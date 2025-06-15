<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

//Products Routes
Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
Route::post('/products/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
Route::delete('/products/{id}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/products/edit/{id}', [\App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/edit/{id}', [\App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
Route::get('/products/info/{id}', [\App\Http\Controllers\ProductController::class, 'info'])->name('products.info');
//Categories Routes
Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/create', [\App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
