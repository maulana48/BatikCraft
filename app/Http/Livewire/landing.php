<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Landing extends Component
{
    public $title;
    public $icon;
    public $url = 'profile';
    public $urlT;
    public function login(){
        $this->url = 'auth.login';
        $this->title = 'Login';
        $this->icon = 'batik(1).png';
        return $this->url;
        $this->render();
    }

    public function logout(){
        $this->url = 'auth.logout';
    }

    public function registration(){
        $this->url = 'auth.registration';
    }

    public function detailBatik($urlT){
        $this->url = 'auth.detail';
        $this->urlT = $urlT;
    }

    public function kategoriBatik($urlT){
        $this->url = 'auth.kategori';
        $this->urlT = $urlT;
    }
    
    public function render()
    {
        $this->title = 'BatikCraft';
        $this->icon = 'batik(1).png';

        return view('livewire.landing', [
            'url' => $this->url,
            'urlT' => $this->urlT,
        ])->layout('layouts.app', [
            'title' => $this->title,
            'icon' => $this->icon,
        ]);
    }
}
