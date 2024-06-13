<?php

namespace App\Livewire\Dashboard\Component;

use Livewire\Component;

class Navbar extends Component
{
    public $admin;
    public $url;

    public function mount($admin = null)
    {
        $this->admin = $admin;
        $this->url = 'index';
    }

    public function logout()
    {
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('auth.login');
    }

    public function open_home()
    {
        $this->dispatch('home');
    }

    public function open_product()
    {
        $this->dispatch('product_open');
    }

    public function open_transaction()
    {
        $this->dispatch('transaction_open');
    }

    public function open_profile()
    {
        $this->dispatch('profile_open');
    }

    public function registration()
    {
        $this->dispatch('registration');
    }

    public function render()
    {
        return view('livewire.dashboard.component.navbar');
    }
}
