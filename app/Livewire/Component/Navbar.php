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

    public function mount($user, $category_list)
    {
        $this->user = $user;
        $this->category_list = $category_list;
    }

    public function home()
    {
    }
    public function shop()
    {
    }
    public function registration()
    {
    }


    public function profile()
    {
        dd($this);
        $this->emit('login');
    }
    public function render()
    {
        $this->category_list = ProductCategory::all();

        return view('livewire.component.navbar', [
            'user' => $this->user,
            'category_list' => $this->category_list,
        ]);
    }
}
