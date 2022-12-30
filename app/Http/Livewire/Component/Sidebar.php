<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;

class Sidebar extends Component
{
    public $url = 'component.sidebar';
    public $listeners = ['logout'];

    public function logout(){
        $this->emit('logout');
        $this->render();
    }
    public function render()
    {
        return view('livewire.' . $this->url);
    }
}
