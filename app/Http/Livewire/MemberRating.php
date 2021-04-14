<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MemberRating extends Component
{
    public $game = [];
    public $prefix = 'memberRating';

    public function rate()
    {
        $this->emit('gameWithRatingAdded', [
            'slug' => $this->prefix . '_' . $this->game['slug'],
            'rating' => $this->game['memberRating'] / 100
        ]);
    }

    public function render()
    {
        return view('livewire.member-rating');
    }
}
