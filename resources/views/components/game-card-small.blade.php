<div class="game flex">
    <a href="{{ $game['slug'] ? route('games.show', $game['slug']) : '#' }}">
        <img src="{{ $game['coverImageUrl'] }}" alt="{{ $game['name'] ?? 'No specified name' }}" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
    </a>

    <div class="ml-4">
        <a href="{{ $game['slug'] ? route('games.show', $game['slug']) : '#' }}" class="hover:text-gray-300">{{ $game['name'] ?? 'No specified name' }}</a>
        <div class="text-gray-400 text-sm mt-1">
            {{ $game['first_release_date'] ?? 'Release date not provided' }}
        </div>
    </div>
</div>
