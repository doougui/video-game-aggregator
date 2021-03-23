<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;

class MostAnticipated extends Component
{
    public $games = [];

    public function fetch()
    {
        $nonformattedGames = Cache::remember('most-anticipated', 7, function () {
            $afterFourMonths = Carbon::now()->addMonths(4)->timestamp;
            $current = Carbon::now()->timestamp;

            return Http::withHeaders(config('services.igdb'))
                ->withBody(
            "fields name, summary, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug, rating_count;
                    where platforms = (48, 49, 130, 6)
                    & ( first_release_date >={$current}
                    & first_release_date < {$afterFourMonths} );
                    sort total_rating_count desc;
                    limit 4;", "text/plain"
                )
                ->post('https://api.igdb.com/v4/games')
                ->json();
        });

        $this->games = $this->formatForView($nonformattedGames);
    }

    private function formatForView($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'coverImageUrl' => Str::replaceFirst(
                    'thumb',
                    'cover_small',
                    $game['cover']['url']
                ),
                'first_release_date' => Carbon::parse(
                    $game['first_release_date']
                )->format('M d, Y')
            ])->toArray();
        });
    }

    public function render()
    {
        return view('livewire.most-anticipated');
    }
}
