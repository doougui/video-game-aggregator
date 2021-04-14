<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;

/**
 * Class BaseGameComponent
 * @package App\Http\Livewire
 */
class BaseGameComponent extends Component
{
    /**
     * Emits specified event
     *
     * @param $event
     * @param $games
     * @param string $prefix
     * @return \Illuminate\Support\Collection
     */
    protected function emitEvents($event, $games, $prefix = '')
    {
        return collect($games)->filter(function ($game) {
            return $game['rating'];
        })->each(function ($game) use ($event, $prefix) {
            $this->emit($event, [
                'slug' => $prefix . '_' . $game['slug'],
                'rating' => $game['rating'] / 100
            ]);
        });
    }

    /**
     * Formats data to present nicely to the user and avoid doing the logic
     * inside view files
     *
     * @param $games
     * @return \Illuminate\Support\Collection
     */
    protected function formatForView($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'coverImageUrl' => isset($game['cover']) ? Str::replaceFirst(
                    'thumb',
                    'cover_big',
                    $game['cover']['url']
                ) : asset('/img/cover_not_found.jpg'),
                'rating' => isset($game['rating'])
                    ? round($game['rating'])
                    : null,
                'platforms' => isset($game['platforms']) ? collect($game['platforms'])
                    ->pluck('abbreviation')
                    ->filter()
                    ->implode(', ')
                    : 'No specified platform(s)'
            ])->toArray();
        });
    }
}
