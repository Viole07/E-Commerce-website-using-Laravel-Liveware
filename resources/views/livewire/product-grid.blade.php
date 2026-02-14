<div>
    <div class="mb-8">
        <input 
            wire:model.live.debounce.300ms="search" 
            type="text" 
            placeholder="Search tech gear..." 
            class="w-full bg-gray-800 border border-gray-700 rounded-xl px-6 py-4 text-white focus:border-blue-500 outline-none transition shadow-2xl"
        >
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($products as $product)
            <livewire:product-card :product="$product" :key="'product-'.$product->id" />
        @empty
            <div class="col-span-3 text-center py-20 text-gray-500">
                No products found matching "{{ $search }}"
            </div>
        @endforelse
    </div>
</div>