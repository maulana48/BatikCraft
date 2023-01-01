<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;

class Sidebar extends Component
{
    public $url = 'component.sidebar';
    public $listeners = ['logout'];

    public function mount($user){
        $this->user = $user;
    }

    public function profile(){
        $this->emit('profile');
    }
    
    public function pembayaran(){
        $this->emitUp('cart');
    }
    
    public function logout(){
        $this->emit('logout');
    }

    public function render()
    {
        return view('livewire.' . $this->url);
    }
}
