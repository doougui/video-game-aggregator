<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MainLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Closure|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Support\Htmlable|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('layouts.main');
    }
}
