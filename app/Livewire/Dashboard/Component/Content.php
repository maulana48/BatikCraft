<?php

namespace App\Livewire\Dashboard\Component;

use Livewire\Component;
use Livewire\Attributes\On;

class Content extends Component
{
    public $admin;
    public $url;

    public function mount($admin = null, $url = "")
    {
        $this->admin = $admin;
        $this->url = $url;
    }

    #[On('home')]
    public function home()
    {
        $this->url = 'home';
    }

    #[On('product_open')]
    public function product_open()
    {
        $this->url = 'product';
    }

    #[On('transaction_open')]
    public function transaction_open()
    {
        $this->url = 'transaction';
    }

    #[On('profile_open')]
    public function profile_open()
    {
        $this->url = 'profile';
    }

    public function login()
    {
        if ($this->admin) {
            return;
        }
        $this->url = 'auth.login';
        $this->title = 'Login Page';
        $this->icon = 'batik(1).png';
    }

    public function logout()
    {
        $this->url = 'auth.login';
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/dashboard');
    }

    public function registration()
    {
        $this->url = 'auth.registration';
    }

    public function render()
    {
        return view('livewire.dashboard.component.content');
    }
}
