<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Productbatik;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public $title;
    public $icon;
    public $url;
    public $batik;
    public $product;
	public $kategori;

	public $nama;
	public $harga;
	public $deskripsi;
	public $tipe_warna;
	public $stok;
	public $asal_kota;
	public $motif_batik;
	public $media;

    public function test(){
        dd($this->product);
    }
    public function edit($id){
    }

    public function render()
    {
        dd($this->product);
        return view('livewire.dashboard.form');
    }
}
