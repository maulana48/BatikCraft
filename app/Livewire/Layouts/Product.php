<?php

namespace App\Livewire\Layouts;

use Livewire\Component;
use App\Models\{
    Product as ProductModel,
    User as UserModel
};

class Product extends Component
{
    public $url;
    public $pageName;
    public $user;
    public $urlT;
    public $batik;
    public $kategori;
    public $rating;
    public $product_with_same_color_type;
    public $product_with_same_category;
    private $productId;

    public function mount($user = null, $productId)
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
        $this->pageName = 'Detail Batik';
    }

    public function addCart($amount)
    {
        if (!$this->user) {
            $this->url = 'auth.login';
            session()->flash('warning', 'Silahkan login terlebih dahulu');
            $this->dispatch('login');
            return 'Gagal';
        }

        if ($this->batik->stock == 0) {
            return 'Product Habis';
        }

        $cart = $this->user->cart;
        $amount = ($amount > $this->batik->stock) ? $this->batik->stock : $amount;
        $payload = [
            'product_id' => $this->batik->id,
            'cart_id' => $cart->id,
            'amount' => $amount,
            'status' => 1,
        ];

        $this->batik->stock = $this->batik->stock - $amount;
        $this->batik->update(['stock' => $this->batik->stock]);
        $pk = $cart->cartProducts()->firstWhere('product_id', $payload['product_id']);
        if ($pk) {
            $pk->update($payload);
        } else {
            $cart->cartProducts()->create($payload);
        }

        return 'Product ditambahkan';
    }

    public function productDetail($id)
    {
        $this->dispatch('detailProduct_open', $id);
    }

    public function render()
    {
        return view('livewire.layouts.product', [
            'kategori' => $this->kategori,
            'rating' => $this->rating,
        ]);
    }
}
