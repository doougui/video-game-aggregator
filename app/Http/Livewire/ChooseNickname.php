<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChooseNickname extends Component
{
    public $nickname;
    public $isSigningUp;

    public function mount()
    {
        $this->nickname = auth()->user()->nickname;
        $this->isSigningUp = false;

        if (session()->pull('isSigningUp')) {
            $this->isSigningUp = true;
        }
    }

    protected function rules()
    {
        return [
            'nickname' => 'required|string|max:255|alpha_dash|unique:users,nickname,' . auth()->user()->id,
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

        session()->forget('isSigningUp');

        return redirect()->to(route('games.index'));
    }

    public function render()
    {
        return view('livewire.choose-nickname');
    }
}
