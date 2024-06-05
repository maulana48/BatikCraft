<?php

namespace App\Livewire\Layouts;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\{
    Product,
    ProductCategory,
};

class Shop extends Component
{
    use WithPagination;

    public $url;
    private $batik_list;
    public $category_list;

    public $kategoriF;
    public $merk_list = [];
    public $merkF;
    public $warna;
    public $warnaF;

    public $sort;

    // public $listeners = ['toShop' => 'mount'];

    public function mount()
    {
        $batik_list = Product::with(['productReviews', 'productCategory']);
        $category_list = ProductCategory::all();

        $this->batik_list = $batik_list;
        $this->category_list = $category_list;

        $batik_list = $batik_list->get();

        $merk = $batik_list->groupBy('merk')->map(function ($value) {
            return $value;
        });
        $this->merk_list = $merk;

        $warna = $batik_list->groupBy('color_type')->map(function ($value) {
            return $value;
        });

        $this->warna = $warna;
        $this->url = 'product';
    }

    public function filtering($kategori = [], $merk = [], $min = null, $max = null, $warna = [])
    {
        $this->kategoriF = $kategori;
        $this->merkF = $merk;
        $this->minF = $min;
        $this->maxF = $max;
        $this->warnaF = $warna;
        $this->batik_list = Product::with(['productReviews', 'productCategory'])->get();

        if ($min != null || $max != null) {
            $filtered = $this->batik_list->filter(function ($value, $key) {
                return $value->harga >= $this->minF && $value->harga <= $this->maxF;
            });
        } else {
            $filtered = $this->batik_list;
        }

        // filter kategori
        if (count($this->kategoriF) != 0) {
            $filtered = $filtered->filter(function ($value, $key) {
                return in_array($value->product_category_id, $this->kategoriF);
            });
        }

        // filter merk
        if (count($this->merkF) != 0) {
            $filtered = $filtered->filter(function ($value, $key) {
                return in_array($value->merk, $this->merkF);
            });
        }

        // filter warna
        if (count($this->warnaF) != 0) {
            $filtered = $filtered->filter(function ($value, $key) {
                return in_array($value->color_type, $this->warnaF);
            });
        }

        $this->batik_list = $filtered;
    }

    public function sort($sort)
    {
        if ($sort == 'default') {
            $this->batik_list = $this->batik_list->sort();
        }
        if ($sort == 'latest') {
            $this->batik_list = $this->batik_list->sortByDesc('created_at');
        }
        if ($sort == 'price-low-to-high') {
            $this->batik_list = $this->batik_list->sortBy('harga');
        }
        if ($sort == 'price-high-to-low') {
            $this->batik_list = $this->batik_list->sortByDesc('harga');
        }
    }

    public function render()
    {
        if ($this->sort != '') {
            $this->sort($this->sort);
        }

        return view('livewire.layouts.shop', [
            'batik_list' => $this->batik_list->paginate(9),
            'category_list' => $this->category_list,
            'merk_list' => $this->merk_list,
            'warna' => $this->warna,
        ]);
    }
}
