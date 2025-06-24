<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/register', [ProductController::class, 'register'])->name('register');
Route::get('/products/show', [ProductController::class, 'show'])->name('detail');
