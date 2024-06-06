<?php

namespace App\Livewire\Layouts;

use Livewire\Component;
use App\Models\{
    Product as ProductModel,
    User as UserModel
};

class Product extends Component
{
    public $user;
    public $url;
    public $urlT;
    private $batik;
    private $kategori;
    private $rating;
    private $product_with_same_color_type;
    private $product_with_same_category;
    private $productId;

    public function mount(UserModel $user, $productId)
    {
        $this->user = $user;
        $batik = ProductModel::find($productId);
        $rating = $batik->productReviews()->get();

        foreach ($rating as $r) {
            $this->rating += $r->rating;
        }

        $this->rating = (count($rating) != 0) ? $this->rating / count($rating) : count($rating);

        $kategori = $batik->productCategory()->first();
        $product_with_same_category = ProductModel::where('product_category_id', $batik->product_category_id)->get();
        $product_with_same_color_type = ProductModel::where([['color_type', $batik->color_type], ['product_category_id', $batik->product_category_id]])->get();

        $this->batik = $batik;
        $this->kategori = $kategori;
        $this->product_with_same_category = $product_with_same_category;
        $this->product_with_same_color_type = $product_with_same_color_type;
        $this->url = 'product';
    }

    public function addCart($jumlah)
    {
        if ($this->user == null) {
            $this->url = 'auth.login';
            session()->flash('warning', 'Silahkan login terlebih dahulu');
            $this->emitUp('login');
            return 'Gagal';
        }

        if ($this->batik->stok == 0) {
            return 'Product Habis';
        }
        $keranjang = $this->user->keranjang;
        $jumlah = ($jumlah > $this->batik->stok) ? $this->batik->stok : $jumlah;
        $payload = [
            'product_id' => $this->batik->id,
            'keranjang_id' => $keranjang->id,
            'jumlah' => $jumlah,
            'status' => 1,
        ];

        $this->batik->stok = $this->batik->stok - $jumlah;
        $this->batik->update(['stok' => $this->batik->stok]);
        $pk = $keranjang->productkeranjang()->firstWhere('product_id', $payload['product_id']);
        if ($pk) {
            $pk->update($payload);
        } else {
            $keranjang->productkeranjang()->create($payload);
        }

        return 'Product ditambahkan';
    }

    public function productDetail($id)
    {
        $this->dispatch('detailProduct', $id);
    }

    public function render()
    {
        // if (!$this->batik) {
        //     session()->flash('warning', 'Product not found');
        //     $this->dispatch('home');
        //     return;
        // }

        return view('livewire.layouts.product', [
            'batik' => $this->batik,
            'kategori' => $this->kategori,
            'rating' => $this->rating,
            'product_with_same_category' => $this->product_with_same_category,
            'product_with_same_color_type' => $this->product_with_same_color_type,
        ]);
    }
}
