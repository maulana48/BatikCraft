<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Laravel\Sanctum\PersonalAccessToken as PAT;
use App\Models\{ 
    KategoriProduct
};

class Dashboard extends Component
{
    public $title;
    public $icon;
    public $url;
    public $urlT;
    public $admin;
    public Location $location;
    public $listeners = ['home' => 'mount'];

    public function boot(){
        // $this->url = 'auth.login';
        // session()->invalidate();
        // session()->regenerateToken();
        $token = session()->get('token'. '');
        if($token == '' && !session()->has('admin')){
            $this->url = 'auth.login';
            $this->login();
            session()->flash('success', 'Silahkan login terlebih dahulu');
        }
        else{
            $token = PAT::findToken($token->plainTextToken);
            $this->admin = $token->tokenable;
            $this->url = 'index';
            // $this->location->refresh();
        }
    }

    public function home(){
        return view('livewire.dashboard.index');
        return;
    }

    public function product(){
        $this->url = 'product';
    }

    public function transaksi(){
        $this->url = 'transaksi';
    }

    public function footer(){
        $this->url = 'layouts.footer';
    }

    public function profile(){
        $this->url = 'profile';
    }

    public function login(){
        if($this->admin){
            return;
        }
        $this->url = 'auth.login';
        $this->title = 'Login Page';
        $this->icon = 'batik(1).png';
    }

    public function logout(){
        $this->url = 'auth.login';
        session()->invalidate();
        session()->regenerateToken();
    }

    public function registration(){
        $this->url = 'auth.registration';
    }

    public function render()
    {
        $this->title = 'BatikCraft';
        $this->icon = 'batik(1).png';
        // $this->emitTo('index', 'render');
        return view('livewire.dashboard')->layout('layouts.app', [
            'title' => $this->title,
            'icon' => $this->icon,
            'admin' => $this->admin
        ]);
    }
}