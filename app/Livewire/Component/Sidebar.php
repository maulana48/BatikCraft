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

    public function profile()
    {
        $this->emit('profile');
    }

    public function pembayaran()
    {
        $this->emitUp('cart');
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
