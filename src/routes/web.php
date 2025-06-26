<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSearchController;
use Illuminate\Support\Facades\Route;


Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{productId}', [ProductController::class, 'show'])->name('detail');
Route::patch('/products/{productId}/update', [ProductController::class, 'update'])->name('update');
Route::get('/products/register', [ProductController::class, 'register'])->name('register');
Route::post('/products', [ProductController::class, 'store'])->name('store');
Route::get('/products/search', [ProductSearchController::class, 'search'])->name('search');
Route::delete('/products/{productId}', [ProductController::class, 'destroy'])->name('delete');
