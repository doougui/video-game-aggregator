<?php

namespace App\Http\Livewire;

class MemberRating extends RatingComponent
{
    public $game = [];
    public $prefix = 'memberRating';

    public function rate()
    {
        $this->emitEvent('gameWithRatingAdded', $this->game, $this->prefix);
    }

    public function render()
    {
        return view('livewire.member-rating');
    }
}
