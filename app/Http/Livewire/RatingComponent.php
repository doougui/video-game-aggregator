<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RatingComponent extends Component
{
    /**
     * Emits specified event
     *
     * @param $event
     * @param $game
     * @param string $prefix
     */
    protected function emitEvent($event, $game, $prefix = '')
    {
        $this->emit($event, [
            'slug' => $prefix . '_' . $game['slug'],
            'rating' => $game['memberRating'] / 100
        ]);
    }
}
