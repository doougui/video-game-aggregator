<div wire:init="fetch" class="similar-games mt-8">
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">{{ __('Similar Games') }}</h2>

    <div class="similar-games-container text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12">
        @forelse($games as $game)
            <x-game-card :game="$game" :prefix="$prefix" />
        @empty
            @foreach(range(1, 6) as $game)
                <x-game-card-skeleton />
            @endforeach
        @endforelse
    </div>
</div>
