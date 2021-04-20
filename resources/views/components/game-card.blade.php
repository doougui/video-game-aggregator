<div class="game mt-8">
    <div class="relative inline-block">
        <a href="{{ $game['slug'] ? route('games.show', $game['slug']) : '#' }}">
            <img src="{{ $game['coverImageUrl'] }}" alt="{{ $game['name'] ?? 'No specified name' }}" class="hover:opacity-75 transition ease-in-out duration-150">
        </a>

        @isset($game['rating'])
            <div id="{{ (isset($prefix) ? $prefix . '_' : '') . $game['slug'] ?? '#' }}" class="absolute -bottom-5 -right-5 w-16 h-16 bg-gray-800 rounded-full"></div>
        @endisset
    </div>

    <a href="{{ $game['slug'] ? route('games.show', $game['slug']) : '#' }}"
       class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8"
    >
        {{ $game['name'] ?? 'No specified name' }}
    </a>
    <div class="text-gray-400 mt-1">
        {{ $game['platforms'] ?? 'No specified platforms' }}
    </div>
</div>
