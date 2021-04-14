<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ReviewCard extends Component
{
    public array $game;
    public string $prefix;

    /**
     * Create a new component instance.
     *
     * @param $game
     * @param $prefix
     */
    public function __construct($game, $prefix)
    {
        $this->game = $game;
        $this->prefix = $prefix;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.review-card');
    }
}
