<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;

class Product extends Component
{
    public $kategoriBatik;
    public $batik;
    public $tipe_warna;

    public function mount($kategoriBatik, $batik, $tipe_warna){
        $this->kategoriBatik = [$kategoriBatik];
        $this->batik = [$batik];
        $this->tipe_warna = [$tipe_warna];
    }
    public function render()
    {
        return view('livewire.layouts.index', [
            'kategoriBatikA' => $this->kategoriBatik[0],
            'batikA' => $this->batik[0],
            'tipe_warnaA' => $this->tipe_warna[0]
        ]);
    }
}
