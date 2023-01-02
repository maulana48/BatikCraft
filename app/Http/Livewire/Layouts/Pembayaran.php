<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;

class Pembayaran extends Component
{
    public $pemesanan; 
    public $product_pesanan;

    public function render()
    {
        return view('livewire.layouts.' . $this->url);
    }
}
