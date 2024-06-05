<?php

namespace App\Livewire\Layouts;

use Livewire\Component;

class Profile extends Component
{
    public $title;
    public $user;

    public function mount($user)
    {
        if (!$user) {
            $this->url = 'auth.login';
            session()->flash('warning', 'Silahkan login terlebih dahulu');
            $this->dispatch('login');
            return;
        }
        $this->user = $user;
    }
    public function render()
    {
        return view('livewire.layouts.profile');
    }
}
