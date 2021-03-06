<div class="game bg-gray-800 rounded-lg shadow-md flex flex-col lg:flex-row text-center lg:text-left p-6">
    <div class="relative self-center lg:self-start flex-none">
        <a href="{{ $game['slug'] ? route('games.show', $game['slug']) : '#' }}">
            <img src="{{ $game['coverImageUrl'] }}" alt="{{ $game['name'] ?? __('No specified name') }}" class="w-48 hover:opacity-75 transition ease-in-out duration-150">
        </a>

        @isset($game['rating'])
            <div id="{{ $prefix }}_{{ $game['slug'] ?? '#' }}" class="absolute -bottom-5 -right-5 w-16 h-16 bg-gray-900 rounded-full"></div>
        @endisset
    </div>

    <div class="lg:ml-12">
        <a href="{{ $game['slug'] ? route('games.show', $game['slug']) : '#' }}"
           class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4"
        >
            {{ $game['name'] ?? __('No specified name') }}
        </a>
        <div class="text-gray-400 mt-1">
            {{ $game['platforms'] ?? __('No specified name') }}
        </div>
        <p class="mt-6 text-gray-400 hidden lg:block">
            {{ $game['summary'] ?? __('Summary not available') }}
        </p>
    </div>
</div>
