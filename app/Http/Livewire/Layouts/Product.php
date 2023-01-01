<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;
use App\Models\{ 
    ProductBatik,
};

class Product extends Component
{
    public $user;
    public $url;
    public $urlT;
    public $kategoriBatik;
    public $batik;
    public $rating;
    public $tipe_warna;

    public function mount($user, $productId){
        $this->user = $user;
		$batik = ProductBatik::find($productId);
        $rating = $batik->reviewproduct;
        foreach($rating as $r){
            $this->rating += $r->rating;
        }
        $this->rating = (count($rating) != 0 ) ? $this->rating / count($rating) : count($rating);
        $kategori = ProductBatik::where('kategori_product_id', $batik->kategori_product_id)->limit(4)->get();
        $tipe_warna = ProductBatik::where([['tipe_warna', $batik->tipe_warna], ['kategori_product_id', $batik->kategori_product_id]])->get();
	    $this->batik = $batik;
	    $this->tipe_warna = $tipe_warna;
	    $this->kategoriBatik = $kategori;
        $this->url = 'product';
    }

    public function addCart($jumlah){
        if($this->user == null){
            $this->url = 'auth.login';
            session()->flash('success', 'Silahkan login terlebih dahulu');
            $this->emitUp('login');
            return 'Gagal';
        }

        if($this->batik->stok == 0){
            return 'Product Habis';
        }
        $keranjang = $this->user->keranjang;
        $jumlah = ($jumlah > $this->batik->stok) ? $batik->stok : $jumlah;
        $payload = [
            'product_id' => $this->batik->id,
            'keranjang_id' => $keranjang->id,
            'jumlah' => $jumlah,
            'status' => 1,
        ];

        $this->batik->stok  = $this->batik->stok - $jumlah;
        $this->batik->update(['stok' => $this->batik->stok]);
        $pk = $keranjang->productkeranjang()->firstWhere('product_id', $payload['product_id']);
        if($pk){
            $pk->update($payload);
        }
        else{
            $keranjang->productkeranjang()->create($payload);
        }

        return 'Product ditambahkan';
    }

    public function render()
    {
        return view('livewire.layouts.product');
    }
}
