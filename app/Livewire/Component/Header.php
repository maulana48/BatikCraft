<?php

namespace App\Livewire\Component;

use Livewire\Component;
use App\Models\{
    ProductCategory
};

class Header extends Component
{
    public $user;
    public $url = 'index';
    public $urlT;
    private $kategoriNav;
    public $cartProducts;
    public $transaksi;

    public function mount($cartProducts, $transaksi)
    {
        $this->kategoriNav = ProductCategory::all();
        $this->cartProducts = $cartProducts;
        $this->transaksi = $transaksi;
    }

    public function cart()
    {
        if ($this->user == null) {
            $this->url = 'auth.login';
            session()->flash('warning', 'Silahkan login terlebih dahulu');
        } else {
            $this->url = 'cart';
        }
    }

    public function transaksi()
    {
        if ($this->user == null) {
            $this->url = 'auth.login';
            session()->flash('warning', 'Silahkan login terlebih dahulu');
        } else {
            $this->url = 'transaksi';
        }
    }

    public function profile()
    {
        if ($this->user == null) {
            $this->url = 'auth.login';
            session()->flash('warning', 'Silahkan login terlebih dahulu');
        } else {
            $this->url = 'profile';
        }
    }
    public function render()
    {
        $this->kategoriNav = ProductCategory::all();
        return view('livewire.component.header', [
            'kategori' => $this->kategoriNav,
            'transaksi' => $this->transaksi,
            'cartProducts' => $this->cartProducts
        ]);
    }
}
