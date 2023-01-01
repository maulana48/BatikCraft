<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;

class CheckOut extends Component
{
    // public $user;
    // public $title;
    // public $icon;
    // public $url;

    // public function mount($user, $productId){
    //     if($user == null){
    //         $this->url = 'auth.login';
    //         session()->flash('success', 'Silahkan login terlebih dahulu');
    //         $this->emitUp('login');
    //         return;
    //     }
    //     $this->user = $user;
    //     $this->orderedProduct = '';
    //     $this->url = 'check-out';
    // }

    public function render()
    {
        return view('livewire.layouts.check-out');
    }
}
