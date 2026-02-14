<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 

class CartCounter extends Component
{
    /**
     * This attribute tells Livewire to run this function 
     * whenever the 'cart-updated' event is dispatched.
     */
    #[On('cart-updated')] 
    public function updateCount()
    {
        // This empty function triggers a re-render of the component
    }

    public function render()
    {
        return view('livewire.cart-counter', [
            'count' => count((array) session('cart', []))
        ]);
    }
}