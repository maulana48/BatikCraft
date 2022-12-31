<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;
use Illuminate\Support\Facades\{ DB };
use App\Models\{ 
    ProductBatik
};

class Cart extends Component
{
    public $user;
    public $batik;
    public $batik_keranjang;
    public $title;
    public $icon;
    public $url;

    public function mount($user, $productId){
        if($user == null){
            $this->url = 'auth.login';
            session()->flash('success', 'Silahkan login terlebih dahulu');
            $this->emitUp('login');
            return;
        }
        $this->url = 'cart';
        $this->user = $user;
        $this->batik_keranjang = $user->keranjang->productkeranjang;
        $batik = $this->batik_keranjang->map->only(['product_id']);
        $batik = ProductBatik::query()->whereIn('id', $batik)->orderBy('updated_at')->get();

        $this->batik = $batik;
    }

    public function checked($id){
        $checked = $this->batik_keranjang->firstWhere('product_id', $id);
        if($checked->status == 1){
            $checked->update(['status' => 2]);
        }
        else{
            $checked->update(['status' => 1]);
            return 'Pilih untuk Check-out';
        }

        return 'checked';
    }

    public function delete($id){
        $deleted = $this->batik_keranjang->firstWhere('product_id', $id);
        $deleted = $deleted->delete();
        return 'deleted';
    }

    public function checkOut(){
        $this->url = 'check-out';
        $this->emitUp('checkout');
        return ;
    }

    public function render()
    {
        return view('livewire.layouts.' . $this->url);
    }
}
