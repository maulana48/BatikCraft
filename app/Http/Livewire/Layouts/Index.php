<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;

class Index extends Component
{
    public $kategori;
    public $batik;
    public $terbaru;

    public function mount($kategori, $batik, $terbaru){
        $this->kategori = [$kategori];
        $this->batik = [$batik];
        $this->terbaru = [$terbaru];
    }
    public function render()
    {
        return view('livewire.layouts.index', [
            'kategoriA' => $this->kategori[0],
            'batikA' => $this->batik[0],
            'terbaruA' => $this->terbaru[0]
        ]);
    }
}
