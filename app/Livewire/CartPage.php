<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class CartPage extends Component
{
    public $cart = [];

    public function mount()
    {
        $this->cart = session()->get('cart', []);
    }

    public function updateQuantity($id, $qty)
    {
        if ($qty <= 0) {
            unset($this->cart[$id]);
        } else {
            $this->cart[$id]['quantity'] = $qty;
        }
        session()->put('cart', $this->cart);
        $this->dispatch('cart-updated'); // Keeps the header badge in sync!
    }

    public function removeItem($id)
    {
        unset($this->cart[$id]);
        session()->put('cart', $this->cart);
        $this->dispatch('cart-updated');
    }

    public function clearCart()
    {
        session()->forget('cart');
        $this->cart = [];
        $this->dispatch('cart-updated');
    }

    public function render()
    {
        $total = collect($this->cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        return view('livewire.cart-page', ['total' => $total]);
    }
}