<div wire:init="fetch">
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">{{ __('Most Anticipated') }}</h2>

    <div class="most-anticipated-container space-y-10 mt-8">
        @forelse($games as $game)
            <x-game-card-small :game="$game" />
        @empty
            @foreach(range(1, 4) as $game)
                <x-game-card-small-skeleton />
            @endforeach
        @endforelse
    </div>
</div>
