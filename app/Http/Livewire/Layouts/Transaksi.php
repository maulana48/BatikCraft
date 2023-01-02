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
    public $detailPemesanan; 
    public $pemesanan; 
    public $product_pesanan;
    
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

    public function detailP($id){
        if($this->user == null){
            $this->url = 'auth.login';
            session()->flash('success', 'Silahkan login terlebih dahulu');
        }
        $this->url = 'pembayaran';
        
        $this->pemesanan = Pemesanan::query()
            ->with(['pembayaran'])
            ->where('id', $id)
            ->get();
        
        $this->product_pesanan = ProductPesanan::query()
            ->with(['productbatik'])
            ->where('pemesanan_id', $this->pemesanan[0]->id)
            ->get();
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
