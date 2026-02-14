<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductCard extends Component
{
    public $product;

    public function addToCart()
    {
        $cart = session()->get('cart', []);
        
        $cart[$this->product->id] = [
            "name" => $this->product->name,
            "quantity" => 1,
            "price" => $this->product->price,
            "image" => $this->product->image
        ];
        
        session()->put('cart', $cart);
        $this->dispatch('cart-updated'); 
        $this->dispatch('notify', message: 'Added to cart!');
    }

    public function updateQuantity($qty)
    {
        $cart = session()->get('cart', []);
        
        if ($qty <= 0) {
            unset($cart[$this->product->id]);
        } else {
            $cart[$this->product->id]['quantity'] = $qty;
        }
        
        session()->put('cart', $cart);
        $this->dispatch('cart-updated');
    }

    public function render()
    {
        return view('livewire.product-card', [
            'inCart' => session('cart.' . $this->product->id)
        ]);
    }
}