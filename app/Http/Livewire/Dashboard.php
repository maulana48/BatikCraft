<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $title;
    public $icon;
    public $url;
    public $urlT;

    public function mount(){
        $this->url = 'index';
    }

    public function test(){
        $this->url = $this->url;
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

    public function logout(){
        $this->url = 'dashboard.logout';
    }

    public function registration(){
        $this->url = 'dashboard.registration';
    }

    public function render()
    {
        $this->title = 'BatikCraft';
        $this->icon = 'batik(1).png';
        // $this->emitTo('index', 'render');
        return view('livewire.dashboard', [
            'url' => $this->url,
            'urlT' => $this->urlT,
        ])->layout('layouts.app', [
            'title' => $this->title,
            'icon' => $this->icon,
            'admin' => true
        ]);
    }
}