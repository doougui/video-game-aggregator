<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChooseNickname extends Component
{
    public $nickname;

    protected function rules()
    {
        return [
            'nickname' => 'required|string|max:255|unique:users,nickname,' . auth()->user()->id . '|alpha_dash|',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateNickname()
    {
        $validatedData = $this->validate();

        auth()->user()->update($validatedData);

        return redirect()->to(route('games.index'));
    }

    public function render()
    {
        return view('livewire.choose-nickname');
    }
}
