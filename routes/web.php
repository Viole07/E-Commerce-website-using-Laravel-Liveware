<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

// The Shop Page
Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');

// Cart Logic
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.index');
Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::get('/orders', [CartController::class, 'orders'])->name('orders.index');
Route::patch('/update-cart', [CartController::class, 'updateCart'])->name('update.cart');
Route::delete('/remove-from-cart', [CartController::class, 'removeItem'])->name('remove.from.cart');