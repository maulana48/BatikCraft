<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\{ Hash, File, DB };
use App\Models\{ 
    ProductBatik,
    KategoriProduct,
    Keranjang,
    Pembayaran,
    Pemesanan,
    PemesananKeranjang,
    ProductKeranjang,
    ReviewProduct,
    User 
};

class Transaksi extends Component
{
    public $title;
    public $icon;
    public $url;
    public $formUrl;
    public $transaksi;
    public $detailTransaksi;
    public $detailProduct;
    public $detailUser;
	public $kategori;

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
        $test = ProductBatik::find(9);
        dd($test->productpesanan->pemesanan);
        $this->detailTransaksi = $detailTransaksi;
        $this->detailUser = $detailUser;
    }
    public function render()
    {
        return view('livewire.dashboard.' . $this->url);
    }
}
