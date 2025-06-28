@php
    $cartItems = auth()->user()->cartItems()->with('songket')->get();
    $cartCount = $cartItems->sum('quantity');
    $cartTotal = $cartItems->sum('total_price');
@endphp

@if ($cartCount > 0)
    <div class="fixed bottom-6 right-6 z-50" x-data="{ open: false }">
        <!-- Floating Cart Button -->
        <button @click="open = !open"
            class="bg-amber-500 hover:bg-amber-600 text-white rounded-full p-4 shadow-lg transition-colors relative">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13l-1.5 6m0 0h9m-9 0V19a2 2 0 002 2h9a2 2 0 002-2v-4">
                </path>
            </svg>
            <span
                class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-6 w-6 flex items-center justify-center">
                {{ $cartCount }}
            </span>
        </button>

        <!-- Floating Cart Panel -->
        <div x-show="open" @click.away="open = false" x-transition
            class="absolute bottom-16 right-0 w-80 bg-white rounded-lg shadow-xl border border-gray-200 max-h-96 overflow-hidden">
            <div class="p-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Shopping Cart</h3>
            </div>

            <div class="max-h-64 overflow-y-auto">
                @foreach ($cartItems as $item)
                    <div class="p-4 border-b border-gray-100 flex items-center space-x-3">
                        <img src="{{ $item->songket->primary_image }}" alt="{{ $item->songket->name }}"
                            class="w-12 h-12 object-cover rounded">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">{{ $item->songket->name }}</p>
                            <p class="text-xs text-gray-500">{{ $item->selected_color }} • {{ $item->selected_size }}
                            </p>
                            <p class="text-xs text-gray-500">Qty: {{ $item->quantity }}</p>
                        </div>
                        <div class="text-sm font-medium text-amber-600">
                            {{ $item->formatted_total_price }}
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="p-4 border-t border-gray-200">
                <div class="flex justify-between items-center mb-3">
                    <span class="text-base font-medium text-gray-900">Total:</span>
                    <span class="text-lg font-bold text-amber-600">Rp
                        {{ number_format($cartTotal, 0, ',', '.') }}</span>
                </div>
                <div class="space-y-2">
                    {{-- <a href="{{ route('cart.index') }}" --}}
                    <a href="{{ route('home') }}"
                        class="block w-full bg-gray-100 hover:bg-gray-200 text-gray-800 text-center py-2 rounded-lg font-medium transition-colors">
                        View Cart
                    </a>
                    {{-- <a href="{{ route('checkout.index') }}" --}}
                    <a href="{{ route('home') }}"
                        class="block w-full bg-amber-500 hover:bg-amber-600 text-white text-center py-2 rounded-lg font-medium transition-colors">
                        Checkout
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif
