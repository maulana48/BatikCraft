<?php

namespace App\Livewire\Layouts;

use Livewire\Component;

class Payment extends Component
{
    public $pemesanan;
    public $product_pesanan;

    public function render()
    {
        return view('livewire.layouts.' . $this->url);
    }
}
