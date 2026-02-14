<a href="{{ route('cart.index') }}" class="bg-gray-700 hover:bg-gray-600 px-5 py-2 rounded-lg flex items-center gap-2 transition relative">
    <span>🛒</span> View Cart 
    <span class="bg-blue-600 text-[10px] px-2 py-0.5 rounded-full absolute -top-2 -right-2 border border-gray-900 font-bold">
        {{ $count }}
    </span>
</a>