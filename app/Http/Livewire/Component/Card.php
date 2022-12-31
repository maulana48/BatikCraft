<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;

class Card extends Component
{
    public $product = [];

    public function mount($product){
        $review = $product->reviewproduct;
        $jumlah_review = count($review);
        if($jumlah_review == 0){
            $rating = 0;
        }
        else{
            $rating = 0;
            foreach($review as $r){
                $rating += $r->rating;
            }
            $rating = $rating / $jumlah_review;
        }
        $product->rating = $rating;
        $product->jumlah_review = $jumlah_review;
        $this->product = [$product];
    }

    public function productDetail($id){
        $this->emitUp('detailProduct', $id);
    }

    public function render()
    {
        return view('livewire.component.card', [
            'productCard' => $this->product[0]
        ]);
    }
}
