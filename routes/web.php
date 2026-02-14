<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CartPage;
use App\Models\Product;
use App\Models\Order;

// 1. Home Route: Redirects or shows the Shop directly
Route::get('/', function () {
    return view('shop', ['products' => Product::all()]);
})->name('shop.index');

// 2. Shop Route (if you still want /shop to work separately)
Route::get('/shop', function () {
    return view('shop', ['products' => Product::all()]);
});

// 3. Cart Page: Now a full-page Livewire component
Route::get('/cart', CartPage::class)->name('cart.index');

// 4. Checkout: Handles the Order creation and session clearing
Route::get('/checkout', function() {
    $cart = session()->get('cart', []);
    
    if(empty($cart)) {
        return redirect()->route('shop.index');
    }

    $order = Order::create([
        'total_amount' => collect($cart)->sum(fn($i) => $i['price'] * $i['quantity']),
        'items' => $cart, // This uses the Array Casting we fixed!
    ]);

    session()->forget('cart');
    return view('success', ['order' => $order]);
})->name('checkout');

// 5. Order History
Route::get('/orders', function() {
    return view('orders', ['orders' => Order::latest()->get()]);
})->name('orders.index');