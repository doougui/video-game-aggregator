<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CriticRating extends Component
{
    public $game = [];
    public $prefix = 'criticRating';

    public function rate()
    {
        $this->emit('gameWithRatingAdded', [
            'slug' => $this->prefix . '_' . $this->game['slug'],
            'rating' => $this->game['memberRating'] / 100
        ]);
    }

    public function render()
    {
        return view('livewire.critic-rating');
    }
}
