<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;
use App\Models\{ 
    KategoriProduct
};

class Navbar extends Component
{
    public $url = 'index';
    public $urlT;
    private $kategoriNav;

    public function loginNav(){
        $this->emit('landing', 'login');
    }

    public function logoutNav(){
        $this->emit('logout');
    }

    public function registrationNav(){
        $this->emit('registration');
    }

    public function detailBatik($urlT){
        $this->emit('detailBatik', $urlT);
    }

    public function kategoriBatik($urlT){
        $this->emit('detailBatik', $urlT);
    }
    public function render()
    {
        $this->kategoriNav = KategoriProduct::all();
        return view('livewire.layouts.navbar', [
            'kategori' => $this->kategoriNav
        ]);
    }
}
