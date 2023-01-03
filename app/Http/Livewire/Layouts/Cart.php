<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;
use Illuminate\Support\Facades\{ DB };
use App\Models\{ 
    ProductBatik,
    Pemesanan,
    ProductPesanan,
    PemesananKeranjang,
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

    public function mount($user = null){
        if($user == null){
            $this->url = 'auth.login';
            session()->flash('warning', 'Silahkan login terlebih dahulu');
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
            $total = 0;
            foreach($this->checked as $keys => $check){
                $total += $check->jumlah * $this->batik->find($check->product_id)->harga;
            }
            
            $payload = [
                'total_harga' => $total,
                'alamat_pengiriman' => $this->user->alamat,
                'metode_pengiriman' => 'J&T mungkin?',
                'estimasi_waktu' => now()->addDays(7),
                'status' => 3,
            ];
            
            $pemesanan = Pemesanan::create($payload);

            foreach($this->checked as $keys => $check){
                $payload = [
                    'product_id' => $check->product_id,
                    'jumlah' => $check->jumlah,
                    'pemesanan_id' => $pemesanan->id
                ];

                ProductPesanan::create($payload);
                $check->delete();
            }

            $pemesananKeranjang = PemesananKeranjang::create([
                'keranjang_id' => $this->user->keranjang->id,
                'pemesanan_id' => $pemesanan->id
            ]);

            session()->flash('success', 'Pemesanan berhasil!');
        }
        
        return '';
    }

    public function render()
    {
        return view('livewire.layouts.' . $this->url, [
            'batik' => $this->batik,
        ]);
    }
}
