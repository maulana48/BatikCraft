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

    public $kategoriF = [];
    public $merkF = [];
    public $colorF = [];
    public $minF = 0;
    public $maxF = 0;

    public $sort;

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

    public function filtering($kategori = [], $merk = [], $min = 0, $max = 0, $color = [])
    {
        $this->kategoriF = $kategori;
        $this->merkF = $merk;
        $this->minF = $min;
        $this->maxF = $max;
        $this->colorF = $color;

        if (!$this->batik_list) {
            $this->batik_list = Product::with(['productReviews', 'productCategory']);
        }

        // filter harga
        if ($min) {
            $this->batik_list = $this->batik_list->where('price', '>=', $min);
        }
        if ($max) {
            $this->batik_list = $this->batik_list->where('price', '<=', $max);
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

    public function sorting($sort)
    {
        if (!$this->batik_list) {
            $this->batik_list = Product::with(['productReviews', 'productCategory']);
        }

        switch ($sort) {
            case 'default':
                // $this->batik_list = $this->batik_list->sort();
                break;
            case 'latest':
                $this->batik_list = $this->batik_list->orderByDesc('created_at');
                break;
            case 'price-low-to-high':
                $this->batik_list = $this->batik_list->orderBy('price');
                break;
            case 'price-high-to-low':
                $this->batik_list = $this->batik_list->orderByDesc('price');
                break;
        }

        if (count($this->kategoriF) != 0 || count($this->merkF) != 0 || $this->minF || $this->maxF || count($this->colorF) != 0) {
            $this->filtering($this->kategoriF, $this->merkF, $this->minF, $this->maxF, $this->colorF);
        }
    }

    public function render()
    {
        if ($this->sort != '') {
            $this->sorting($this->sort);
        }

        if (!$this->category_list) {
            $this->category_list = ProductCategory::all();
        }
        if (!$this->merch_list) {
            $this->merch_list = Product::groupBy('merch')->select('merch', \DB::raw('count(*) as total'))->get();
        }
        if (!$this->color) {
            $this->color = Product::groupBy('color_type')->select('color_type', \DB::raw('count(*) as total'))->get();
        }

        $batik_list = $this->batik_list;

        return view('livewire.layouts.shop', [
            'batik_list' => $batik_list->paginate(9),
            'category_list' => $this->category_list,
            'merch_list' => $this->merch_list,
            'color' => $this->color,
        ]);
    }
}
