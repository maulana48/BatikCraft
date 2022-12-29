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

class Shop extends Component
{
    public $title;
    public $icon;
    public $url;
    public $urlT;
    public $batik;
	public $terbaru;
	public $kategori;
    
	public $filter;
	public $filters = [];
	public $sort;

    public function mount(){
		$batik = ProductBatik::with(['reviewproduct', 'kategoriproduct'])->get();
        
        $kategori = KategoriProduct::all();

	    $this->batik = $batik;
	    $this->kategori = $kategori;
        $this->url = 'product';

    }

    public function filters(){
        array_push($this->filter, $this->filter);
        dd($this->filter);
    }

    public function sort($sort){
        if($sort == 'default'){
            $this->batik = $this->batik->sort();
        }
        if($sort == 'latest'){
            $this->batik = $this->batik->sortByDesc('created_at');
        }
        if($sort == 'price-low-to-high'){
            $this->batik = $this->batik->sortBy('harga');
        }
        if($sort == 'price-high-to-low'){
            $this->batik = $this->batik->sortByDesc('harga');
        }
    }

    public function render()
    {
        if($this->sort != ''){
            $this->sort($this->sort);
        }
        return view('livewire.layouts.shop');
    }
}
