<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;

class BaseSmallGameComponent extends Component
{
    protected function formatForView($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'coverImageUrl' => Str::replaceFirst(
                    'thumb',
                    'cover_small',
                    $game['cover']['url']
                ),
                'first_release_date' => Carbon::parse(
                    $game['first_release_date']
                )->format('M d, Y')
            ])->toArray();
        });
    }
}
