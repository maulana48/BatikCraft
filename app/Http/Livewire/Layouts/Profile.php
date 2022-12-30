<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;

class Profile extends Component
{
    public function mount($user, $productId){
    }
    public function render()
    {
        return view('livewire.layouts.profile');
    }
}
