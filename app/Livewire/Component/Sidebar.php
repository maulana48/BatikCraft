<?php

namespace App\Livewire\Component;

use Livewire\Component;

class Sidebar extends Component
{
    private $user;
    public $listeners = ['logout'];

    public function mount($user)
    {
        $this->user = $user;
    }

    public function open_profile()
    {
        $this->dispatch('profile_open');
    }

    public function open_transaction()
    {
        $this->dispatch('transaction_open');
    }

    public function logout()
    {
        $this->dispatch('logout');
    }

    public function render()
    {
        return view('livewire.component.sidebar', [
            'user' => $this->user,
        ]);
    }
}
