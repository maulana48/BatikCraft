<?php

namespace App\Livewire\Component;

use Livewire\Component;
use App\Models\{
    ProductCategory
};

class Navbar extends Component
{
    public $url = 'index';
    public $urlT;
    private $kategoriNav;

    public function loginNav()
    {
        dd($this->emit('Landing', 'login'));
    }

    public function logoutNav()
    {
        $this->emit('logout');
    }

    public function registrationNav()
    {
        $this->emit('registration');
    }

    public function detailBatik($urlT)
    {
        $this->emit('detailBatik', $urlT);
    }

    public function kategoriBatik($urlT)
    {
        $this->emit('detailBatik', $urlT);
    }
    public function render()
    {
        $this->kategoriNav = ProductCategory::all();
        return view('livewire.component.navbar', [
            'kategori' => $this->kategoriNav
        ]);
    }
}
