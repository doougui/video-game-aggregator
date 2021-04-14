<div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
    <div class="relative flex-none">
        <a href="{{ route('games.show', $game['slug']) }}">
            <img src="{{ $game['coverImageUrl'] }}" alt="{{ $game['name'] }}" class="w-48 hover:opacity-75 transition ease-in-out duration-150">
        </a>

        @isset($game['rating'])
            <div id="{{ $prefix }}_{{ $game['slug'] }}" class="absolute -bottom-5 -right-5 w-16 h-16 bg-gray-900 rounded-full"></div>
        @endisset
    </div>

    <div class="ml-12">
        <a href="{{ route('games.show', $game['slug']) }}"
           class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4"
        >
            {{ $game['name'] }}
        </a>
        <div class="text-gray-400 mt-1">
            {{ $game['platforms'] }}
        </div>
        <p class="mt-6 text-gray-400 hidden lg:block">
            {{ $game['summary'] }}
        </p>
    </div>
</div>
