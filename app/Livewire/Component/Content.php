<?php

namespace App\Livewire\Component;

use Livewire\Attributes\On;
use Livewire\Component;

class Content extends Component
{
    public $user;
    public $title;
    public $icon;
    public $url;
    public $productId;
    public $kategori;
    public $cartProducts;
    public $transaksi;

    protected $listeners = ['home', 'cart', 'logout', 'registration', 'login', 'detailProduct', 'checkOut' => '$refresh'];

    public function mount($user, $url)
    {
        $this->user = $user;
        $this->url = $url;
    }

    #[On('home')]
    public function home()
    {
        $this->url = 'home';
    }

    #[On('shop_open')]
    public function shop()
    {
        dd('shop');
        $this->url = 'shop';
    }

    #[On('cart_open')]
    public function cart()
    {
        if ($this->user == null) {
            $this->url = 'auth.login';
            session()->flash('warning', 'Silahkan login terlebih dahulu');
        } else {
            $this->url = 'cart';
        }
    }

    #[On('profile_open')]
    public function profile()
    {
        $this->url = 'profile';
    }

    #[On('transaction_open')]
    public function transaction_open()
    {
        $this->url = 'transaction';
    }

    public function productDetail($id)
    {
        $this->detailProduct($id);
    }

    public function detailProduct($id)
    {
        $this->url = 'product';
        $this->productId = $id;
        $this->render();
    }

    public function checkOut()
    {
        if ($this->user == null) {
            $this->url = 'auth.login';
            session()->flash('warning', 'Silahkan login terlebih dahulu');
        } else {
            $this->url = 'check-out';
        }
    }

    public function login()
    {
        if ($this->user) {
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
        return redirect('/');
    }

    public function registration()
    {
        $this->url = 'auth.registration';
    }

    public function render()
    {
        return view('livewire.component.content', [
            'url' => $this->url,
            'user' => $this->user,
            'productId' => $this->productId,
        ]);
    }
}
