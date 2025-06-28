@props(['songket'])

<div class="group relative bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
    <div class="aspect-square overflow-hidden bg-gradient-to-br from-amber-100 to-orange-100">
        <img src="{{ $songket->primary_image }}" alt="{{ $songket->name }}"
            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">

        @if ($songket->is_featured)
            <div class="absolute top-3 left-3 bg-amber-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
                Featured
            </div>
        @endif
    </div>

    <div class="p-6">
        <div class="mb-2">
            <span class="text-sm text-amber-600 font-medium">{{ $songket->category->name }}</span>
        </div>

        <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-amber-600 transition-colors">
            {{ $songket->name }}
        </h3>

        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
            {{ Str::limit($songket->description, 100) }}
        </p>

        <div class="flex items-center justify-between mb-4">
            <div class="text-2xl font-bold text-amber-600">
                {{ $songket->formatted_price }}
            </div>

            @if ($songket->reviews_count > 0)
                <div class="flex items-center text-sm text-gray-500">
                    <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <span>{{ number_format($songket->reviews_avg_rating, 1) }} ({{ $songket->reviews_count }})</span>
                </div>
            @endif
        </div>

        <div class="flex gap-2 mb-4">
            @if ($songket->colors)
                @foreach (array_slice($songket->colors, 0, 4) as $color)
                    <div class="w-6 h-6 rounded-full border-2 border-gray-200"
                        style="background-color: {{ $color }}"></div>
                @endforeach
                @if (count($songket->colors) > 4)
                    <div
                        class="w-6 h-6 rounded-full border-2 border-gray-200 bg-gray-100 flex items-center justify-center text-xs text-gray-600">
                        +{{ count($songket->colors) - 4 }}
                    </div>
                @endif
            @endif
        </div>

        {{-- <a href="{{ route('catalog.show', $songket) }}"
            class="block w-full bg-amber-500 hover:bg-amber-600 text-white text-center py-3 rounded-lg font-semibold transition-colors">
            View Details
        </a> --}}
    </div>
</div>
