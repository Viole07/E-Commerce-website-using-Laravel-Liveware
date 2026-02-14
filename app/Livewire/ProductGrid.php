<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductGrid extends Component
{
    public $search = '';

    public function render()
    {
        // Demonstration of Eloquent's 'when' for conditional filtering
        $products = Product::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->get();

        return view('livewire.product-grid', [
            'products' => $products
        ]);
    }
}