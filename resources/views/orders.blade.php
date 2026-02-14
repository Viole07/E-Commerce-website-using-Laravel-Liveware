<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order History | Tech Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white p-10 font-sans">
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-10 border-b border-gray-700 pb-6">
            <h1 class="text-4xl font-bold text-white">Order History</h1>
            <a href="{{ route('shop.index') }}" class="text-blue-400 hover:text-blue-300 transition flex items-center gap-2">
                <span>←</span> Back to Shop
            </a>
        </div>

        <div class="grid gap-8">
            @forelse($orders as $order)
                <div class="bg-gray-800 rounded-2xl border border-gray-700 shadow-2xl overflow-hidden">
                    <div class="p-6 bg-gray-800/50 flex justify-between items-center border-b border-gray-700/50">
                        <div>
                            <div class="flex items-center gap-3 mb-1">
                                <span class="bg-green-600/20 text-green-400 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-widest">Paid</span>
                                <span class="text-gray-500 font-mono text-sm">#{{ $order->id }}</span>
                            </div>
                            <p class="text-gray-400 text-xs italic">{{ $order->created_at->format('M d, Y \a\t h:i A') }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-3xl font-bold text-white">₹{{ number_format($order->total_amount, 2) }}</p>
                            <p class="text-gray-500 text-[10px] uppercase font-bold tracking-tighter mt-1">Status: Confirmed</p>
                        </div>
                    </div>

                    <div class="p-6 bg-gray-900/30">
                        <h3 class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-4">Items in this order</h3>
                        <div class="space-y-4">
                            @foreach($order->items as $id => $item)
                                <div class="flex items-center justify-between group">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 rounded-lg overflow-hidden bg-gray-800 border border-gray-700">
                                            <img src="{{ $item['image'] }}" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition">
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold text-gray-200">{{ $item['name'] }}</p>
                                            <p class="text-xs text-gray-500">
                                                Qty: <span class="text-blue-400 font-bold">{{ $item['quantity'] }}</span> 
                                                × ₹{{ number_format($item['price'], 2) }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-mono font-bold text-gray-300">
                                            ₹{{ number_format($item['price'] * $item['quantity'], 2) }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-24 bg-gray-800 rounded-3xl border border-dashed border-gray-700">
                    <div class="text-5xl mb-4 opacity-20">📦</div>
                    <p class="text-gray-500 text-xl font-medium">No order history found yet.</p>
                    <a href="{{ route('shop.index') }}" class="mt-6 inline-block bg-blue-600 hover:bg-blue-500 px-8 py-3 rounded-xl font-bold transition">
                        Start Shopping
                    </a>
                </div>
            @endforelse
        </div>
    </div>

    <div class="max-w-4xl mx-auto mt-12 text-center">
        <p class="text-gray-600 text-[10px] uppercase tracking-[0.2em]">
            E-Commerce Development Environment | Herd v{{ phpversion() }}
        </p>
    </div>
</body>
</html>