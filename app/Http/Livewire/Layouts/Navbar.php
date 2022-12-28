<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;

class Navbar extends Component
{
    public $url = 'navbar';

    public function login(){
        $this->url = 'login';
    }

    public function logout(){
        $this->url = 'logout';
    }

    public function registration(){
        $this->url = 'registration';
    }
    public function render()
    {
        return view('livewire.layouts.' . $this->url, [
            'url' => $this->url,
        ]);
    }
}
