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
    public $orderId;
    public $kategori;
    public $cartProducts;
    public $transaksi;

    protected $listeners = ['home', 'cart', 'logout', 'registration', 'login', 'detailProduct_open', 'checkOut' => '$refresh', 'detailOrder_open'];

    public function boot()
    {
        $user = session()->get('user');
        if (!$this->user && $user) {
            $this->user = $user;
        }
    }

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

    #[On('detailOrder_open')]
    public function detailOrder_open($orderId)
    {
        $this->url = 'payment';
        $this->orderId = $orderId;
        $this->render();
    }

    #[On('detailProduct_open')]
    public function detailProduct_open($id)
    {
        $this->url = 'product';
        $this->productId = $id;
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

    #[On('login')]
    public function login()
    {
        if ($this->user) {
            return;
        }
        $this->url = 'auth.login';
        $this->title = 'Login Page';
        $this->icon = 'batik(1).png';
    }

    #[On('logout')]
    public function logout()
    {
        session()->invalidate();
        session()->regenerateToken();

        $this->url = 'auth.login';
        $this->user = null;

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
            'orderId' => $this->orderId,
        ]);
    }
}
