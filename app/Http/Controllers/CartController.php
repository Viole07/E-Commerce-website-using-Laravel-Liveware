<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\Order;   

class CartController extends Controller
{
    /**
     * Add a product to the session-based cart.
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    /**
     * Show the cart page.
     */
    public function viewCart()
    {
        return view('cart');
    }

    /**
     * Handle the dummy checkout and create an order record.
     */
    public function checkout()
    {
        $cart = session()->get('cart', []);
        if(empty($cart)) return redirect()->route('shop.index');

        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        // No need for json_encode because of the $casts array in Order model
        $order = Order::create([
            'total_amount' => $total,
            'items' => $cart, 
            'status' => 'paid'
        ]);

        session()->forget('cart');
        return view('success', ['order' => $order]);
    }

    /**
     * Show the order history page.
     */
    public function orders()
    {
        // Fetches all orders from the SQLite database
        $orders = Order::latest()->get();
        return view('orders', compact('orders'));
    }
    public function updateCart(Request $request)
{
    if($request->id && $request->quantity){
        $cart = session()->get('cart');
        
        if($request->quantity <= 0) {
            unset($cart[$request->id]);
        } else {
            $cart[$request->id]["quantity"] = $request->quantity;
        }
        
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Cart updated successfully!');
    }
}

    public function removeItem(Request $request)
{
    if($request->id) {
        $cart = session()->get('cart');
        if(isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Product removed!');
    }
}
}