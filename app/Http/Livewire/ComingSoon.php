<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ComingSoon extends SmallGameComponent
{
    public $games = [];

    public function fetch()
    {
        $nonformattedGames = Cache::remember('coming-soon', 120, function () {
            $current = Carbon::now()->timestamp;

            return Http::withHeaders(config('services.igdb'))
                ->withBody(
            "fields name, summary, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug, rating_count;
                    where platforms = (48, 49, 130, 6)
                    & ( first_release_date >= {$current} );
                    sort first_release_date desc;
                    limit 4;", "text/plain"
                )
                ->post('https://api.igdb.com/v4/games')
                ->json();
        });

        $this->games = $this->formatForView($nonformattedGames);
    }

    public function render()
    {
        return view('livewire.coming-soon');
    }
}
