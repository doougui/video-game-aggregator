<div wire:init="fetch">
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold mt-12">Coming Soon</h2>

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
