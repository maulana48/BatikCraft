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
    private $batiks;
    public $kategori;

    public $kategoriF;
    public $merks = [];
    public $merkF;
    public $warna;
    public $warnaF;

    public $sort;

    // public $listeners = ['toShop' => 'mount'];

    public function mount()
    {
        $batiks = Product::with(['productReviews', 'productCategory']);
        $kategori = ProductCategory::all();

        $this->batiks = $batiks;
        $this->kategori = $kategori;

        $batiks = $batiks->get();

        $merk = $batiks->groupBy('merk')->map(function ($value) {
            return $value;
        });
        $this->merks = $merk;

        $warna = $batiks->groupBy('color_type')->map(function ($value) {
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
        $this->batiks = Product::with(['productReviews', 'productCategory'])->get();

        if ($min != null || $max != null) {
            $filtered = $this->batiks->filter(function ($value, $key) {
                return $value->harga >= $this->minF && $value->harga <= $this->maxF;
            });
        } else {
            $filtered = $this->batiks;
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

        $this->batiks = $filtered;
    }

    public function sort($sort)
    {
        if ($sort == 'default') {
            $this->batiks = $this->batiks->sort();
        }
        if ($sort == 'latest') {
            $this->batiks = $this->batiks->sortByDesc('created_at');
        }
        if ($sort == 'price-low-to-high') {
            $this->batiks = $this->batiks->sortBy('harga');
        }
        if ($sort == 'price-high-to-low') {
            $this->batiks = $this->batiks->sortByDesc('harga');
        }
    }

    public function render()
    {
        if ($this->sort != '') {
            $this->sort($this->sort);
        }
        return view('livewire.layouts.shop', [
            'batik_list' => $this->batiks->paginate(9),
        ]);
    }
}
