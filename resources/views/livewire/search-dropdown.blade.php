<div class="relative" x-data="{ visible:true }" @click.away="visible = false">
    <input wire:model.debouce.300ms="search"
           type="text"
           class="bg-gray-800 text-sm rounded-full focus:outline-none focus:shadow-outline w-64 px-3 pl-8 py-1"
           placeholder="Search..."
           @focus="visible = true"
           @keydown.escape.window="visible = false"
    >
    <div class="absolute top-0 flex items-center h-full ml-2">
        <svg class="fill-current text-gray-400 w-4" viewBox="0 0 24 24"><path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z" /></svg>
    </div>

    <div wire:loading class="top-0 right-0 absolute">
        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    </div>

    @if(strlen($search) > 0)
        <div class="absolute z-50 bg-gray-800 text-xs rounded w-64 mt-2" x-show="visible">
            <ul>
                @forelse($results as $game)
                    <li class="border-b border-gray-700">
                        <a href="{{ route('games.show', $game['slug']) }}" class="block flex items-center transition ease-in-out duration-150 hover:bg-gray-700 p-3">
                            @isset($game['cover'])
                                <img src="{{ Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']) }}" alt="{{ $game['name'] }}" class="w-10">
                            @endisset
                            <span class="ml-4">{{ $game['name'] }}</span>
                        </a>
                    </li>
                @empty
                    <li class="p-3">No results for "{{ $search }}".</li>
                @endforelse
            </ul>
        </div>
    @endif
</div>