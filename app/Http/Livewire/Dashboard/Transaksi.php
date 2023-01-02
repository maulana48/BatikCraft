<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\{ 
    ProductBatik,
    Pemesanan
};

class Transaksi extends Component
{
    public $title;
    public $icon;
    public $url;
    public $transaksi;
    public $detailTransaksi;
    public $detailProduct;
    public $detailUser;

    public function mount(){
		$transaksi = Pemesanan::with(['pembayaran', 'pemesanankeranjang'])
            ->latest()
            ->get();
        
	    $this->transaksi = $transaksi;
	    $this->url = 'transaksi';
    }
    public function transaksi()
    {
        $this->url = 'transaksi';
        // return view('livewire.dashboard.' . $this->url);
    }
    public function detail($id)
    {
        $this->url = 'detail-transaksi';
        $detailTransaksi = $this->transaksi->find($id);
        $detailUser =  $detailTransaksi->pemesanankeranjang->keranjang->user;
        $detailProduct = $detailTransaksi->productpesanan;
        
        $this->$detailProduct = $detailProduct->load('productbatik');
        $this->detailTransaksi = $detailTransaksi;
        $this->detailUser = $detailUser;
    }
    public function render()
    {
        return view('livewire.dashboard.' . $this->url);
    }
}
