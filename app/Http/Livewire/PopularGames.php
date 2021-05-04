<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class PopularGames extends GameComponent
{
    public $games = [];
    public string $prefix = 'popular';

    public function fetch()
    {
        $nonformattedGames = Cache::remember('popular-games', 120, function () {
            $before = Carbon::now()->subMonths(2)->timestamp;
            $after = Carbon::now()->addMonths(2)->timestamp;

            return Http::withHeaders(config('services.igdb'))
                ->withBody(
            "fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug;
                    where platforms = (48, 49, 130, 6)
                    & ( first_release_date >={$before}
                    & first_release_date < {$after}
                    & total_rating_count > 5 );
                    sort total_rating_count desc;
                    limit 12;", "text/plain"
                )
                ->post('https://api.igdb.com/v4/games')
                ->json();
        });

        $this->games = $this->formatForView($nonformattedGames);

        $this->emitEvents('gameWithRatingAdded', $this->games, $this->prefix);
    }

    public function render()
    {
        return view('livewire.popular-games');
    }
}
