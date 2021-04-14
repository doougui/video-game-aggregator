<?php

namespace App\Http\Livewire;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class SimilarGames extends GameComponent
{
    public $games = [];
    public string $prefix = 'similar';
    public string $baseGame;

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

        $this->games = $this
            ->formatForView($nonformattedGames[0]['similar_games'])
            ->take(6);

        $this->emitEvents('gameWithRatingAdded', $this->games, $this->prefix);
    }

    public function render()
    {
        return view('livewire.similar-games');
    }
}
