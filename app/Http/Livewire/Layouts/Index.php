<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;
use App\Models\{ 
    ProductBatik,
    KategoriProduct
};

class Index extends Component
{

    public $url;
    public $batik;
    public $productId;
	public $terbaru;
	public $kategori;

    public function mount(){
        
        $batik = ProductBatik::with(['reviewproduct', 'kategoriproduct'])->limit(8)->get();
        $terbaru = ProductBatik::with(['reviewproduct', 'kategoriproduct'])->latest()->limit(4)->get();
        
        $kategori = KategoriProduct::query()->limit(6)->get();

	    $this->batik = $batik;
	    $this->terbaru = $terbaru;
	    $this->kategori = $kategori;
        $this->url = 'index';

    }

    public function shop(){
        $this->emitUp('shops');
        dd($this);
    }

    // public function detailProduct($id){
    //     $this->url = 'product';
    //     $this->emitUp('detailProduct'); 
    //     $this->productId = $id;
    // }

    public function kategoriProduct($id){
        $this->url = 'auth.kategori';
        $this->productId = $id;
    }

    public function render()
    {
        return view('livewire.layouts.' . $this->url);
    }
}
