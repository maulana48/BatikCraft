<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $title;
    public $icon;
    public $url;
    public $urlT;
    public $listeners = ['home'];

    public function mount(){
        $this->url = 'index';
    }

    public function home(){
        return view('livewire.dashboard.index');
        die;
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
        $this->url = 'auth.login';
    }

    public function logout(){
        $this->url = 'auth.logout';
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
            'admin' => true
        ]);
    }
}