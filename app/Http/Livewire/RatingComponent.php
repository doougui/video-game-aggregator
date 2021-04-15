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
     * @param $ratingType
     * @param string $prefix
     */
    protected function emitEvent($event, $ratingType, $game, $prefix = '')
    {
        $this->emit($event, [
            'slug' => $prefix . '_' . $game['slug'],
            'rating' => $game[$ratingType] / 100
        ]);
    }
}
