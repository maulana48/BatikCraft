<?php

namespace App\Livewire\Layouts;

use Livewire\Component;
use App\Models\{
    Product,
    ProductCategory
};

class Home extends Component
{

    public $url;
    private $batik_list;
    private $productId;
    private $latests;
    private $category_list;

    public function mount()
    {

        $batik_list = Product::with(['productReviews', 'productCategory', 'main_media'])->limit(8)->get();
        $latests = Product::with(['productReviews', 'productCategory', 'main_media'])->latest()->limit(4)->get();

        $category_list = ProductCategory::query()->limit(6)->get();

        $this->batik_list = $batik_list;
        $this->latests = $latests;
        $this->category_list = $category_list;
        $this->url = 'home';

    }

    public function open_shop()
    {
        $this->dispatch('shop_open');
    }

    // public function detailProduct($id){
    //     $this->url = 'product';
    //     $this->emitUp('detailProduct_open'); 
    //     $this->productId = $id;
    // }

    public function kategoriProduct($id)
    {
        $this->url = 'auth.kategori';
        $this->productId = $id;
    }

    public function render()
    {
        return view('livewire.layouts.home', [
            'batik_list' => $this->batik_list,
            'latests' => $this->latests,
            'category_list' => $this->category_list,
        ]);
    }
}
