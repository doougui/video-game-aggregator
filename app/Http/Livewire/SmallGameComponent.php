<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;

class SmallGameComponent extends Component
{
    protected function formatForView($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'coverImageUrl' => isset($game['cover']) ? Str::replaceFirst(
                    'thumb',
                    'cover_small',
                    $game['cover']['url']
                ) : asset('/img/cover_not_found.jpg'),
                'first_release_date' => Carbon::parse(
                    $game['first_release_date']
                )->format('M d, Y')
            ])->toArray();
        });
    }
}
