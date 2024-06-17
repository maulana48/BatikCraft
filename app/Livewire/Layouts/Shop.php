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
    private $category_list;
    private $merch_list;
    private $color;

    public $kategoriF;
    public $merkF;
    public $colorF;

    public $sort;

    // public $listeners = ['toShop' => 'mount'];

    public function mount($user = null, $url = null, $filter = null)
    {
        $batik_list = Product::with(['productReviews', 'productCategory']);

        $this->batik_list = $batik_list;
        $batik_list = $batik_list->get();

        $this->category_list = ProductCategory::all();
        $this->merch_list = Product::groupBy('merch')->select('merch', \DB::raw('count(*) as total'))->get();
        $this->color = Product::groupBy('color_type')->select('color_type', \DB::raw('count(*) as total'))->get();
        $this->url = 'product';

        if ($filter) {
            if (isset($filter["category_id"]) && count($filter["category_id"]) != 0) {
                $this->filtering($filter["category_id"], [], null, null, []);
            }
        }
    }

    public function filtering($kategori = [], $merk = [], $min = null, $max = null, $warna = [])
    {
        $this->kategoriF = $kategori;
        $this->merkF = $merk;
        $this->minF = $min;
        $this->maxF = $max;
        $this->colorF = $warna;
        $this->batik_list = Product::with(['productReviews', 'productCategory']);

        $this->category_list = ProductCategory::all();
        $this->merch_list = Product::groupBy('merch')->select('merch', \DB::raw('count(*) as total'))->get();
        $this->color = Product::groupBy('color_type')->select('color_type', \DB::raw('count(*) as total'))->get();

        dd($kategori, $merk, $min, $max, $warna);

        if ($min != null || $max != null) {
            $this->batik_list = $this->batik_list->whereBetween('harga', [$min, $max]);
        }

        // filter kategori
        if (count($this->kategoriF) != 0) {
            $this->batik_list = $this->batik_list->whereIn('product_category_id', $this->kategoriF);
        }

        // filter merk
        if (count($this->merkF) != 0) {
            $this->batik_list = $this->batik_list->whereIn('merch', $this->merkF);
        }

        // filter warna
        if (count($this->colorF) != 0) {
            $this->batik_list = $this->batik_list->whereIn('color_type', $this->colorF);
        }
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
            'merch_list' => $this->merch_list,
            'color' => $this->color,
        ]);
    }
}
