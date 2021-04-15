<?php

namespace App\Http\Livewire;

class MemberRating extends RatingComponent
{
    public $game = [];
    public $prefix = 'memberRating';

    public function rate()
    {
        $this->emitEvent('gameWithRatingAdded', 'memberRating', $this->game, $this->prefix);
    }

    public function render()
    {
        return view('livewire.member-rating');
    }
}
