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
    public $checked;
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

    public function checking($id){
        $checked = $this->batik_keranjang->firstWhere('product_id', $id);
        if($checked->status == 1){
            $checked->update(['status' => 2]);
        }
        else{
            $checked->update(['status' => 1]);
            return 'Pilih untuk Check-out';
        }

        return 'Checked';
    }

    public function delete($id){
        $deleted = $this->batik_keranjang->firstWhere('product_id', $id);
        $deleted = $deleted->delete();
        return 'deleted';
    }

    public function checkOut($konfirmasi = false){
        $this->url = 'check-out';
        $this->checked = $this->batik_keranjang->where('status', 2)->sortBy('product_id');
        $this->batik = ProductBatik::query()
            ->whereIn('id', $this->checked->map->only(['product_id']))
            ->orderBy('id')
            ->orderBy('updated_at')->get();
        // $this->emitUp('checkOut');
        
        if($konfirmasi){
            foreach($this->checked as $keys => $check){
                $total = $check->jumlah * $this->batik->find($check->product_id)->harga;
            }

            $payload = [
                'total_harga' => $total,
                'alamat_pengiriman' => $this->user->alamat,
                'metode_pengiriman' => 'Cargo mungkin?',
                'estimasi_waktu' => now()->addDays(7)->get(),
                'status' => 3,
            ];
            
            dd($payload);

            $payload = [
                'product_id' => $this->checked,
                'jumlah' => $this->checked,
                'pemesanan_id' => ''
            ];
        }
        
        return '';
    }

    public function render()
    {
        return view('livewire.layouts.' . $this->url);
    }
}
