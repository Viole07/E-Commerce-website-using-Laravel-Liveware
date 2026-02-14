<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Com Shop | Tech Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body class="bg-gray-900 text-white font-sans p-10">
    
    <div class="flex justify-between items-center mb-6 border-b border-gray-700 pb-4">
        <h1 class="text-4xl font-bold">Our Tech Store</h1>
        
        <livewire:cart-counter />
    </div>

    @if(session('success'))
        <div class="bg-green-600/20 border border-green-500 text-green-400 p-4 rounded-lg mb-6 flex justify-between">
            {{ session('success') }}
            <button onclick="this.parentElement.remove()" class="text-green-400 hover:text-white">&times;</button>
        </div>
    @endif
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($products as $product)
            <livewire:product-card :product="$product" :key="'product-'.$product->id" />
        @endforeach
    </div>

    <p class="mt-10 text-gray-600 text-xs italic">
        Rendered at: {{ now()->format('H:i:s') }} | Host: ecom.test | 
        <a href="{{ route('orders.index') }}" class="text-blue-500 hover:underline">View All Orders History</a>
    </p>
    <div id="toast" class="fixed bottom-10 right-10 bg-green-600 text-white px-6 py-3 rounded-xl shadow-2xl transform translate-y-20 opacity-0 transition-all duration-300">
    </div>

<script>
    window.addEventListener('notify', event => {
        const toast = document.getElementById('toast');
        toast.innerText = event.detail.message;
        toast.classList.remove('translate-y-20', 'opacity-0');
        
        setTimeout(() => {
            toast.classList.add('translate-y-20', 'opacity-0');
        }, 3000);
    });
</script>

    @livewireScripts
</body>
</html>