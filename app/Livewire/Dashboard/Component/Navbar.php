<?php

namespace App\Livewire\Dashboard\Component;

use Livewire\Component;

class Navbar extends Component
{
    public $admin;
    public $url;

    public function mount($admin = null, $url = "")
    {
        $this->admin = $admin;
        $this->url = $url;
    }

    public function open_logout()
    {
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('dashboard');
    }

    public function open_home()
    {
        $this->url = 'home';
        $this->dispatch('home');
    }

    public function open_product()
    {
        $this->url = 'product';
        $this->dispatch('product_open');
    }

    public function open_transaction()
    {
        $this->url = 'transaction';
        $this->dispatch('transaction_open');
    }

    public function open_profile()
    {
        $this->url = 'profile';
        $this->dispatch('profile_open');
    }

    public function open_registration()
    {
        $this->url = 'auth.registration';
        $this->dispatch('registration_open');
    }

    public function render()
    {
        return view('livewire.dashboard.component.navbar');
    }
}
