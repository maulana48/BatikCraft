<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\{ 
    ProductBatik,
    Pemesanan,
    User,
    Pembayaran,
    ProductPesanan
};

class Index extends Component
{
    public $pemesanan;
    public $user;
    public $batik;
    public $pembayaran;

    public function mount(){
        $this->pemesanan = Pemesanan::all()->count();
        $this->user = User::query()->where('role', 2)->get();
        $this->batik = ProductBatik::all();
        $this->terpopuler = ProductPesanan::query()
            ->select(DB::raw('SUM(jumlah) as total'))
            ->groupBy('product_id', 'id')
            ->orderBy('jumlah')
            ->get();
        dd($this->terpopuler);
        $this->pembayaran = Pembayaran::all();
    }

    public function render()
    {
        return view('livewire.dashboard.index');
    }
}
