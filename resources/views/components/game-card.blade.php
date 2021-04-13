<div class="game mt-8">
    <div class="relative inline-block">
        <a href="{{ route('games.show', $game['slug']) }}">
            <img src="{{ $game['coverImageUrl'] }}" alt="{{ $game['name'] }}" class="hover:opacity-75 transition ease-in-out duration-150">
        </a>

        @isset($game['rating'])
            <div id="{{ $game['slug'] }}" class="absolute -bottom-5 -right-5 w-16 h-16 bg-gray-800 rounded-full"></div>

            @push('scripts')
                @include('_rating', [
                    'slug' => $game['slug'],
                    'rating' => $game['rating'],
                    'event' => null
                ])
            @endpush
        @endisset
    </div>

    <a href="{{ route('games.show', $game['slug']) }}"
       class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8"
    >
        {{ $game['name'] }}
    </a>
    <div class="text-gray-400 mt-1">
        {{ $game['platforms'] }}
    </div>
</div>
