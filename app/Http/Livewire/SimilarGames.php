<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;

class SimilarGames extends Component
{
    public $games = [];
    public $prefix = 'similar';
    public $baseGame;

    public function fetch()
    {
        $nonformattedGames = Cache::remember('popular-games', 7, function () {
            return Http::withHeaders(config('services.igdb'))
                ->withBody(
            "
                        fields
                            similar_games.rating,
                            similar_games.name,
                            similar_games.slug,
                            similar_games.cover.url,
                            similar_games.platforms.abbreviation;
                        where slug=\"{$this->baseGame}\";
                    ", "text/plain"
                )
                ->post('https://api.igdb.com/v4/games')
                ->json();
        });

        $this->games = $this->formatForView($nonformattedGames[0]['similar_games']);

        collect($this->games)->filter(function ($game) {
            return $game['rating'];
        })->each(function ($game) {
            $this->emitEvent('gameWithRatingAdded', $game);
        });
    }

    private function emitEvent($event, $game)
    {
        $this->emit($event, [
            'slug' => $this->prefix . '_' . $game['slug'],
            'rating' => $game['rating'] / 100
        ]);
    }

    private function formatForView($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'coverImageUrl' => Str::replaceFirst(
                    'thumb',
                    'cover_big',
                    $game['cover']['url']
                ),
                'rating' => isset($game['rating'])
                    ? round($game['rating'])
                    : null,
                'platforms' => (array_key_exists('platforms', $game))
                    ? collect($game['platforms'])->pluck('abbreviation')->filter()->implode(', ')
                    : null
            ])->toArray();
        })->take(6);
    }

    public function render()
    {
        return view('livewire.similar-games');
    }
}
