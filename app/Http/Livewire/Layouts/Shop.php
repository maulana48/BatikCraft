<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\{ 
    ProductBatik,
    KategoriProduct,
};

class Shop extends Component
{
    use WithPagination;

    public $url;
    public $batik;
	public $kategori;

	public $kategoriF;
	public $merks = [];
	public $merkF;
	public $warna;
	public $warnaF;
    
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
        
        $warna = $batik->groupBy('tipe_warna')->map(function ($value) {
            return $value;
        });

        $this->warna = $warna;
        $this->url = 'product';
    }

    public function filtering($kategori = [], $merk = [], $min = null, $max = null, $warna = []){
        $this->kategoriF = $kategori;
        $this->merkF = $merk;
        $this->minF = $min;
        $this->maxF = $max;
        $this->warnaF = $warna;
		$this->batik = ProductBatik::with(['reviewproduct', 'kategoriproduct'])->get();
        
        if($min != null || $max != null){
            $filtered = $this->batik->filter(function ($value, $key) {
                return $value->harga >= $this->minF && $value->harga <= $this->maxF;
            });
        }
        else{
            $filtered = $this->batik;
        }

        // filter kategori
        if(count($this->kategoriF) != 0){
            $filtered = $filtered->filter(function ($value, $key) {
                return in_array($value->kategori_product_id,$this->kategoriF);
            });
        }

        // filter merk
        if(count($this->merkF) != 0){
            $filtered = $filtered->filter(function ($value, $key) {
                return in_array($value->merk,$this->merkF);
            });
        }

        // filter warna
        if(count($this->warnaF) != 0){
            $filtered = $filtered->filter(function ($value, $key) {
                return in_array($value->tipe_warna,$this->warnaF);
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
        return view('livewire.layouts.shop', [
            'batiks' => $this->batik->paginate(9)
        ]);
    }
}
