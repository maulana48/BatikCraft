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
    public function mount($user){
        $this->user = $user;

        $this->pemesanan = PemesananKeranjang::query()
            ->where('keranjang_id', $this->user->keranjang->id)
            ->limit(1)
            ->get();
        
        $this->pemesanan = Pemesanan::query()
            ->where('id', $this->pemesanan[0]->pemesanan_id)
            ->get();
        
        $this->product_pesanan = ProductPesanan::query()
            ->with(['productbatik'])
            ->where('pemesanan_id', $this->pemesanan[0]->id)
            ->get();
        $this->url = 'pembayaran';
    }

    public function bayar(){
        $this->pemesanan[0]->status = 2;
        $this->pemesanan[0]->update();
        return 'pembayaran berhasil';
    }

    public function render()
    {
        return view('livewire.layouts.' . $this->url);
    }
}
