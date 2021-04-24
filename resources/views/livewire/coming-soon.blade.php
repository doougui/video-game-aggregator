<div wire:init="fetch" id="coming-soon">
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold mt-12">{{ __('Coming Soon') }}</h2>

    <div class="coming-soon-container space-y-10 mt-8">
        @forelse($games as $game)
            <x-game-card-small :game="$game" />
        @empty
            @foreach(range(1, 4) as $game)
                <x-game-card-small-skeleton />
            @endforeach
        @endforelse
    </div>
</div>
