<?php

namespace App\Livewire;

use Livewire\Component;
use Laravel\Sanctum\PersonalAccessToken as PAT;
use App\Models\{
    ProductCategory
};

class Landing extends Component
{
    public $user;
    public $title;
    public $icon;
    public $url;
    public $productId;
    public $kategori;
    public $cartProducts;
    public $transaksi;

    protected $listeners = ['shops' => 'shop', 'cart', 'logout', 'registration', 'login', 'detailProduct', 'checkOut' => '$refresh'];

    public function mount()
    {
        $this->kategori = ProductCategory::query()->limit(6)->get();
        $token = session()->get('token' . '');
        if (!$token == '') {
            $token = PAT::findToken($token->plainTextToken);
            if ($token) {
                if ($token->tokenable->role == 2) {
                    $this->user = $token->tokenable;
                    $this->cartProducts = $this->user->cart->cartProducts->count();
                    $this->transaksi = $this->user->cart->cartOrder->count();
                }
            }
        }
    }

    public function home()
    {
        $this->url = 'index';
        $this->render();
    }

    public function shop()
    {
        $this->url = 'shop';
        $this->render();
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
        if ($this->user) {
            $this->cartProducts = $this->user->cart->cartProducts->count();
        }
        $this->title = 'BatikCraft';
        $this->icon = 'batik(1).png';
        $this->url = ($this->url == '') ? 'Index' : $this->url;

        return view('livewire.landing')->layout('layouts.app', [
            'title' => $this->title,
            'icon' => $this->icon,
            'user' => $this->user,
            'cartProducts' => $this->cartProducts,
            'transaksi' => $this->transaksi,
            'category_list' => $this->kategori,
        ]);
    }
}
