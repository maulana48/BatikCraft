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
    public $transaction;

    public function mount($user)
    {
        $this->kategoriNav = ProductCategory::all();
        $this->cartProducts = $this->user ? $this->user->cart->cartProducts->count() : 0;
        $this->transaction = $this->user ? $this->user->cart->cartOrder->count() : 0;
    }

    public function open_cart()
    {
        $this->dispatch('cart_open');
    }

    public function open_transaction()
    {
        $this->dispatch('transaction_open');
    }

    public function open_profile()
    {
        $this->dispatch('profile_open');
    }
    public function render()
    {
        $this->kategoriNav = ProductCategory::all();
        return view('livewire.component.header', [
            'kategori' => $this->kategoriNav,
            'transaction' => $this->transaction,
            'cartProducts' => $this->cartProducts
        ]);
    }
}
