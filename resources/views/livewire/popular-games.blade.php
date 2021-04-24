<div wire:init="fetch" class="popular-games border-b border-gray-800 pb-16" id="popular-games">
    <h2 class="text-blue-400 uppercase tracking-wide font-semibold">{{ __('Popular Games') }}</h2>

    <div class="popular-games-container text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-y-6 gap-x-12">
        @forelse($games as $game)
            <x-game-card :game="$game" :prefix="$prefix" />
        @empty
            @foreach(range(1, 12) as $game)
                <x-game-card-skeleton />
            @endforeach
        @endforelse
    </div>
</div>
