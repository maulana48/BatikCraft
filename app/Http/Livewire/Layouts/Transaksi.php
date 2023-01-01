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

class Transaksi extends Component
{
    public function mount($user){
        $this->user = $user;

        $this->pemesanan = PemesananKeranjang::query()
            ->where('keranjang_id', $this->user->keranjang->id)
            ->get();
        
        $this->pemesanan = Pemesanan::query()
            ->with(['pembayaran', 'productpesanan'])
            ->whereIn('id', $this->pemesanan->map->only(['pemesanan_id']))
            ->get();
            

        $this->url = 'transaksi';
    }

    public function detailPemesanan($id){
        $this->emit('pembayaran', $this->user, $id);
        $this->url = 'pembayaran';
    }

    public function render()
    {
        return view('livewire.layouts.' . $this->url);
    }
}
