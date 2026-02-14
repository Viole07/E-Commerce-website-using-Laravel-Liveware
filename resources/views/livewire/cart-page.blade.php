<div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-10 border-b border-gray-700 pb-6">
        <h1 class="text-4xl font-bold">Shopping Cart</h1>
        @if(count($cart) > 0)
            <button wire:click="clearCart" class="text-red-500 hover:text-red-400 text-sm font-bold uppercase tracking-widest">
                Clear All Items
            </button>
        @endif
    </div>

    @if(count($cart) > 0)
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2 space-y-4">
                @foreach($cart as $id => $item)
                    <div class="bg-gray-800 p-6 rounded-2xl border border-gray-700 flex items-center justify-between shadow-lg">
                        <div class="flex items-center gap-6">
                            <img src="{{ $item['image'] }}" class="w-20 h-20 object-cover rounded-xl border border-gray-700">
                            <div>
                                <h3 class="text-xl font-bold">{{ $item['name'] }}</h3>
                                <p class="text-gray-500 text-sm">₹{{ number_format($item['price'], 2) }} each</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-6">
                            <div class="flex items-center bg-gray-900 rounded-lg border border-gray-700 overflow-hidden">
                                <button wire:click="updateQuantity({{ $id }}, {{ $item['quantity'] - 1 }})" class="px-3 py-1 hover:bg-gray-700">-</button>
                                <span class="px-4 py-1 font-mono text-blue-400 font-bold">{{ $item['quantity'] }}</span>
                                <button wire:click="updateQuantity({{ $id }}, {{ $item['quantity'] + 1 }})" class="px-3 py-1 hover:bg-gray-700">+</button>
                            </div>
                            <button wire:click="removeItem({{ $id }})" class="text-gray-500 hover:text-red-500 transition">🗑️</button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="bg-gray-800 p-8 rounded-2xl border border-blue-500/20 h-fit sticky top-10 shadow-2xl">
                <h3 class="text-gray-400 uppercase text-xs font-bold tracking-widest mb-6">Order Summary</h3>
                <div class="flex justify-between mb-4">
                    <span class="text-gray-400">Subtotal</span>
                    <span>₹{{ number_format($total, 2) }}</span>
                </div>
                <div class="flex justify-between border-t border-gray-700 pt-4 mt-4">
                    <span class="text-xl font-bold">Total</span>
                    <span class="text-2xl font-bold text-green-400">₹{{ number_format($total, 2) }}</span>
                </div>
                <a href="{{ route('checkout') }}" class="block w-full bg-blue-600 hover:bg-blue-500 text-center py-4 rounded-xl font-bold mt-8 transition shadow-lg">
                    Proceed to Checkout
                </a>
            </div>
        </div>
    @else
        <div class="text-center py-20 bg-gray-800 rounded-3xl border border-dashed border-gray-700">
            <p class="text-gray-500 text-xl">Your cart is empty!</p>
            <a href="{{ route('shop.index') }}" class="mt-4 inline-block bg-blue-600 px-8 py-2 rounded-lg">Browse Products</a>
        </div>
    @endif
</div>