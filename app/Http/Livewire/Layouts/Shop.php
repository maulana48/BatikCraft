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
	public $kategoriF;
	public $merks = [];
	public $merkF;
    
	public $filter = [];
	public $filters = [];
	public $sort;

    // public $listeners = ['toShop' => 'mount'];

    public function mount(){
		$batik = ProductBatik::with(['reviewproduct', 'kategoriproduct'])->get();
        
        $kategori = KategoriProduct::all();

	    $this->batik = $batik;
	    $this->kategori = $kategori;
        $merk = $batik->groupBy('merk')->map(function ($value) {
            return $value;
        });
        $this->merks = $merk;
        $this->url = 'product';
    }

    public function filtering($kategori = [], $merk = []){
        $this->kategoriF = $kategori;
        $this->merkF = $merk;
		$this->batik = ProductBatik::with(['reviewproduct', 'kategoriproduct'])->get();

        // filter kategori
        if(count($this->kategoriF) != 0){
            $filtered = $this->batik->filter(function ($value, $key) {
                return in_array($value->kategori_product_id,$this->kategoriF);
            });
        }
        else{
            $filtered = $this->batik;
        }

        // filter merk
        if(count($this->merkF) != 0){
            $filtered = $filtered->filter(function ($value, $key) {
                return in_array($value->merk,$this->merkF);
            });
        }

        $this->batik = $filtered;
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
