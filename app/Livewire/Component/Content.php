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
    public $pageName;
    private $filter = [];
    private $productId;
    private $orderId;
    private $kategori;
    public $cartProducts;
    public $transaksi;
    public $breadcumb = [];

    protected $listeners = ['home', 'cart', 'logout', 'registration', 'login', 'detailProduct_open', 'checkOut' => '$refresh', 'detailOrder_open'];

    public function boot()
    {
        $user = session()->get('user');
        if (!$this->user && $user) {
            $this->user = $user;
        }
    }

    public function mount($user, $url, $pageName)
    {
        $this->user = $user;
        $this->url = $url;
        $this->pageName = $pageName;
        // $this->breadcumb = [$this->pageName];
    }

    #[On('home')]
    public function home()
    {
        $this->url = 'home';
        $this->pageName = 'Home';
        $this->breadcumb = [$this->pageName];
    }

    #[On('shop_open')]
    public function shop($catId = null)
    {
        $this->filter = [];
        if ($catId) {
            $this->filter['category_id'] = $catId;
        }

        $this->url = 'shop';
        $this->pageName = 'Shop';
        $this->breadcumb = [$this->pageName];
    }

    #[On('detailProduct_open')]
    public function detailProduct_open($id)
    {

        $this->url = 'product';
        $this->pageName = 'Product';
        // $this->breadcumb = [$this->pageName];
        array_push($this->breadcumb, $this->pageName);
        $this->productId = $id;
    }

    #[On('cart_open')]
    public function cart()
    {
        if ($this->user == null) {
            $this->url = 'auth.login';
            session()->flash('warning', 'Silahkan login terlebih dahulu');
            return;
        }

        $this->url = 'cart';
        $this->pageName = 'Cart';
        $this->breadcumb = [$this->pageName];
    }

    #[On('profile_open')]
    public function profile()
    {
        if ($this->user == null) {
            $this->url = 'auth.login';
            session()->flash('warning', 'Silahkan login terlebih dahulu');
            return;
        }

        $this->url = 'profile';
        $this->pageName = 'Profile';
        $this->breadcumb = [$this->pageName];
    }

    #[On('transaction_open')]
    public function transaction_open()
    {
        if ($this->user == null) {
            $this->url = 'auth.login';
            session()->flash('warning', 'Silahkan login terlebih dahulu');
            return;
        }

        $this->url = 'transaction';
        $this->pageName = 'Transaksi';
        $this->breadcumb = [$this->pageName];
    }

    #[On('detailOrder_open')]
    public function detailOrder_open($orderId)
    {
        $this->url = 'payment';
        $this->pageName = 'Pembayaran';
        $this->breadcumb = [$this->pageName];
        $this->orderId = $orderId;
        $this->render();
    }

    public function checkOut()
    {
        if ($this->user == null) {
            $this->url = 'auth.login';
            session()->flash('warning', 'Silahkan login terlebih dahulu');
            return;
        }

        $this->url = 'check-out';
        $this->pageName = 'Check out';
        $this->breadcumb = [$this->pageName];
    }

    #[On('login')]
    public function login()
    {
        if ($this->user) {
            return;
        }
        $this->url = 'auth.login';
        $this->pageName = 'Login';
        $this->breadcumb = [$this->pageName];
        $this->title = 'Login Page';
        $this->icon = 'batik(1).png';
    }

    #[On('logout')]
    public function logout()
    {
        session()->invalidate();
        session()->regenerateToken();

        $this->url = 'auth.login';
        $this->pageName = 'Login';
        $this->breadcumb = [$this->pageName];
        $this->user = null;

        return redirect('/');
    }

    public function registration()
    {
        $this->url = 'auth.registration';
        $this->pageName = 'Registration';
        $this->breadcumb = [$this->pageName];
    }

    public function render()
    {
        return view('livewire.component.content', [
            'url' => $this->url,
            'pageName' => $this->pageName,
            'breadcumb' => $this->breadcumb,
            'user' => $this->user,
            'productId' => $this->productId,
            'orderId' => $this->orderId,
            'filter' => $this->filter,
        ]);
    }
}
