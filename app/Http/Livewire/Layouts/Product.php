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

class Product extends Component
{
    public $title;
    public $icon;
    public $url;
    public $urlT;
    public $kategoriBatik;
    public $batik;
    public $rating;
    public $tipe_warna;

    public function mount($user, $productId){
		$batik = ProductBatik::find($productId);
        $rating = $batik->reviewproduct;
        foreach($rating as $r){
            $this->rating += $r->rating;
        }
        $this->rating = $this->rating / count($rating);
        $kategori = ProductBatik::where('id', $batik->kategori_product_id)->get();
        $tipe_warna = ProductBatik::where([['tipe_warna', $batik->tipe_warna], ['kategori_product_id', $batik->kategori_product_id]])->get();
        $this->title = 'BatikCraft';
	    $this->icon = 'batik(1).png';
	    $this->batik = $batik;
	    $this->tipe_warna = $tipe_warna;
	    $this->kategoriBatik = $kategori;
        $this->url = 'product';
    }
    public function render()
    {
        return view('livewire.layouts.product');
    }
}
