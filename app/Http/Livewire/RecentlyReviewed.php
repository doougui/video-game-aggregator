<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class RecentlyReviewed extends GameComponent
{
    public $games = [];
    public string $prefix = 'reviewed';

    public function fetch()
    {
        $nonformattedGames = Cache::remember('recently-reviewed', 7, function () {
            $before = Carbon::now()->subMonths(2)->timestamp;
            $current = Carbon::now()->timestamp;

            return Http::withHeaders(config('services.igdb'))
                ->withBody(
            "fields name, summary, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug, rating_count;
                    where platforms = (48, 49, 130, 6)
                    & ( first_release_date >={$before}
                    & first_release_date < {$current}
                    & rating_count > 5 );
                    sort total_rating_count desc;
                    limit 3;", "text/plain"
                )
                ->post('https://api.igdb.com/v4/games')
                ->json();
        });

        $this->games = $this->formatForView($nonformattedGames);

        $this->emitEvents('gameWithRatingAdded', $this->games, $this->prefix);
    }

    public function render()
    {
        return view('livewire.recently-reviewed');
    }
}
