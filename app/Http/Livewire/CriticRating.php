<?php

namespace App\Http\Livewire;

class CriticRating extends RatingComponent
{
    public $game = [];
    public $prefix = 'criticRating';

    public function rate()
    {
        $this->emitEvent('gameWithRatingAdded', $this->game, $this->prefix);
    }

    public function render()
    {
        return view('livewire.critic-rating');
    }
}
