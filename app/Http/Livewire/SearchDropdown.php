<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search = '';
    public $results = [];

    public function render()
    {
        if (strlen($this->search) > 0) {
            $this->results = Http::withHeaders(config('services.igdb'))
                ->withBody(
                    "search \"{$this->search}\";
                        fields name, cover.url, slug;
                        limit 6;", "text/plain"
                )
                ->post('https://api.igdb.com/v4/games')
                ->json();
        }

        return view('livewire.search-dropdown');
    }
}
