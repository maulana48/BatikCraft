<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;
use Illuminate\Support\Facades\{ DB };
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

class Index extends Component
{
    public $title;
    public $icon;
    public $url;
    public $urlT;
    public $batik;
    public $productId;
	public $terbaru;
	public $kategori;

    public function mount(){
		$batik = ProductBatik::with(['reviewproduct', 'kategoriproduct'])
            ->latest()
            ->get();
        
        $kategori = KategoriProduct::all();
        $terbaru = $batik->take(4);

	    $this->batik = $batik;
	    $this->terbaru = $terbaru;
	    $this->kategori = $kategori;
        $this->url = 'index';

    }

    public function shop(){
        $this->url = 'shop';
        $this->emitUp('shop');
    }

    public function detailProduct($id){
        $this->url = 'product';
        $this->productId = $id;
    }

    public function kategoriProduct($id){
        $this->url = 'auth.kategori';
        $this->productId = $id;
    }

    public function render()
    {
        return view('livewire.layouts.' . $this->url);
    }
}
