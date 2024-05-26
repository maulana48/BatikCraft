<?php

namespace App\Livewire\Component;

use Livewire\Component;
use App\Models\{
    ProductCategory
};

class Navbar extends Component
{
    public $user;
    public $category_list;

    public function mount($user)
    {
        $this->user = $user;
        $this->category_list = ProductCategory::query()->limit(6)->get();
    }

    public function home()
    {
        $this->dispatch('home');
    }

    public function open_shop()
    {
        $this->dispatch('shop_open');
    }

    public function registration()
    {
        $this->dispatch('registration');
    }

    public function login()
    {
        $this->dispatch('login');
    }

    public function render()
    {
        return view('livewire.component.navbar', [
            'user' => $this->user,
            'category_list' => $this->category_list,
        ]);
    }
}
