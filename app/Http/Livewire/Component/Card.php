<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;

class Card extends Component
{
    public $product = [];

    public function mount($product){
        $this->product = [$product];
    }


    public function render()
    {
        return view('livewire.component.card', [
            'productCard' => $this->product[0]
        ]);
    }
}
