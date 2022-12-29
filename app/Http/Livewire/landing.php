<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Landing extends Component
{
    public $url = 'index';
    public $urlT;

    public function login(){
        $this->url = 'auth.login';
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
        return view('livewire.landing', [
            'url' => $this->url,
            'urlT' => $this->urlT,
        ]);
    }
}
