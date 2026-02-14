<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Success | Tech Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white flex items-center justify-center h-screen font-sans">
    <div class="text-center bg-gray-800 p-12 rounded-2xl shadow-2xl border border-green-500/30">
        <div class="text-7xl mb-6">🎉</div>
        <h1 class="text-5xl font-extrabold text-green-400 mb-2">Payment Successful!</h1>
        <p class="text-gray-400 text-lg">Order <span class="text-white font-bold">#{{ $order->id }}</span> has been placed successfully.</p>
        
        <div class="mt-10 flex gap-4 justify-center">
            <a href="{{ route('shop.index') }}" class="bg-blue-600 hover:bg-blue-500 px-8 py-3 rounded-xl font-bold transition shadow-lg">
                Back to Shop
            </a>
            <a href="{{ route('orders.index') }}" class="bg-gray-700 hover:bg-gray-600 px-8 py-3 rounded-xl font-bold transition">
                View My Orders
            </a>
        </div>
    </div>
</body>
</html>