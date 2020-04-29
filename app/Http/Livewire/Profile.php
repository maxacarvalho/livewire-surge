<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Profile extends Component
{
    public $saved = false;
    public $username = '';
    public $about = '';

    public function mount()
    {
        $this->username = auth()->user()->username;
        $this->about = auth()->user()->about;
    }

    public function updated($field)
    {
        if ($field !== 'saved') {
            $this->saved = false;
        }
    }

    public function save()
    {
        $profileData = $this->validate([
            'username' => 'max:24',
            'about' => 'max:140',
        ]);

        auth()->user()->update($profileData);

        $this->saved = true;
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
