<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;
use Illuminate\Support\Facades\{ DB };
use App\Models\{ 
    ProductBatik,
    Pemesanan,
    PemesananKeranjang,
    ProductPesanan,
};

class Pembayaran extends Component
{
    public $listeners = ['pembayaran' => 'mount'];
    public function mount($user, $pemesananId){
        $this->user = $user;

        $this->pemesanan = Pemesanan::query()
            ->with(['pembayaran'])
            ->where('id', $pemesananId)
            ->get();
        
        $this->product_pesanan = ProductPesanan::query()
            ->with(['productbatik'])
            ->where('pemesanan_id', $this->pemesanan[0]->id)
            ->get();
        $this->url = 'pembayaran';
    }

    public function bayar(){
        $this->pemesanan[0]->status = 3;
        $this->pemesanan[0]->update();
        $this->pemesanan[0]->pembayaran->status = 2;
        $this->pemesanan[0]->pembayaran->update();
        return 'pembayaran berhasil';
    }

    public function render()
    {
        return view('livewire.layouts.' . $this->url);
    }
}
