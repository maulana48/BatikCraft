<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;

class Profile extends Component
{
    public $title;

    public function mount($user, $productId){
        if($user == null){
            $this->url = 'auth.login';
            session()->flash('success', 'Silahkan login terlebih dahulu');
            $this->emitUp('login');
            return;
        }
        $this->user = $user;
    }
    public function render()
    {
        return view('livewire.layouts.profile');
    }
}
