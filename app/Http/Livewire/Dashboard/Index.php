<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\{ 
    ProductBatik,
    Pemesanan,
    User,
    Pembayaran
};

class Index extends Component
{
    public $pemesanan;
    public $user;
    public $batik;
    public $pembayaran;

    public function mount(){
        $this->pemesanan = Pemesanan::all();
        $this->user = User::query()->where('role', 2)->get();
        $this->batik = ProductBatik::all();
        $this->pembayaran = Pembayaran::all();
    }

    public function render()
    {
        return view('livewire.dashboard.index');
    }
}
