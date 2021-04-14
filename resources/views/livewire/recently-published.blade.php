<div wire:init="fetch" class="recent-reviews w-full lg:w-3/4 mr-0 lg:mr-32">
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Recently Published</h2>

    <div class="recently-reviewed-container space-y-12 mt-8">
        @forelse($games as $game)
            <x-detailed-card :game="$game" :prefix="$prefix" />
        @empty
            @foreach(range(1, 3) as $game)
                <x-detailed-card-skeleton />
            @endforeach
        @endforelse
    </div>
</div>
