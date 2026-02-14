<div class="bg-gray-800 p-4 rounded-xl shadow-lg border border-gray-700 flex flex-col hover:border-blue-500/50 transition">
    <div class="w-full h-48 bg-gray-700 rounded-lg overflow-hidden mb-4 border border-gray-700">
        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
    </div>

    <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
    <p class="text-gray-400 text-sm mt-1 flex-grow">{{ $product->description }}</p>
    
    <div class="flex justify-between items-center mt-6">
        <p class="text-green-400 font-bold text-xl">₹{{ number_format($product->price, 2) }}</p>
        
        @if($inCart)
            <div class="flex items-center bg-gray-900 rounded-lg overflow-hidden border border-blue-600/50">
                <button wire:click="updateQuantity({{ $inCart['quantity'] - 1 }})" class="px-3 py-2 hover:bg-gray-700 font-bold transition">-</button>
                <span class="px-4 py-2 text-blue-400 font-bold font-mono">{{ $inCart['quantity'] }}</span>
                <button wire:click="updateQuantity({{ $inCart['quantity'] + 1 }})" class="px-3 py-2 hover:bg-gray-700 font-bold transition">+</button>
            </div>
        @else
            <button wire:click="addToCart" class="bg-blue-600 hover:bg-blue-500 text-white px-6 py-2 rounded-lg transition font-medium">
                Add to Cart
            </button>
        @endif
    </div>
</div>