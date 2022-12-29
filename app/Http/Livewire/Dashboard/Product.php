<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\{ DB };
use App\Models\{ 
    ProductBatik,
    KategoriProduct,
    Keranjang,
    Pembayaran,
    Pemesanan,
    PemesananKeranjang,
    ProductKeranjang,
    ReviewProduct,
    User 
};

class Product extends Component
{
    use WithFileUploads;

    public $title;
    public $icon;
    public $url;
    public $batik;
    public $batikEdit;
	public $kategori;

	public $nama;
	public $harga;
	public $deskripsi;
	public $tipe_warna;
	public $stok;
	public $asal_kota;
	public $motif_batik;
	public $media;

    public function mount(){
		$batik = ProductBatik::with(['reviewproduct:rating', 'kategoriproduct'])
            ->latest()
            ->get();
        
        $kategori = KategoriProduct::all();

	    $this->batik = $batik;
	    $this->kategori = $kategori;
	    $this->url = 'product';

    }

    public function product(){
        $this->url = 'product';
        return view('livewire.dashboard.' . $this->url);
    }

    public function test(){
        dd($this->batikEdit);
    }

    public function editProduct($id){
        $messages = [
            'required' => 'Input :attribute tidak boleh kosong.',
            'min' => 'Input :attribute harus lebih dari 3 karakter',
            'email' => ':attribute tidak valid',
            'image' => 'gambar tidak valid',
            'confirmed' => 'konfirmasi password tidak valid'
        ];

        $rules = [
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required|min:5',
            'tipe_warna' => 'required',
            'stok' => 'required',
            'asal_kota' => 'required',
            'motif_batik' => 'required',
            'media' => 'image|max:2048',
        ];
        
        $payload = $this->validate($rules, $messages);
        if($this->media){
            $payload['media'] = $this->media->store('img/Product', ['disk' => 'public_uploads']);
        }
        
        $batik = ProductBatik::find($id);
        $batik = $batik->update($payload);

        if(!$batik){
            return session()->flash('Error', 'Gagal update data product, coba lagi');
        }

        return session()->flash('success', 'Update data product berhasil');

    }

    public function edit($id){
        $this->url = 'form';
        $this->batikEdit = $this->batik->find($id);
        $this->nama = $this->batikEdit->nama;
        $this->harga = $this->batikEdit->harga;
        $this->deskripsi = $this->batikEdit->deskripsi;
        $this->tipe_warna = $this->batikEdit->tipe_warna;
        $this->stok = $this->batikEdit->stok;
        $this->asal_kota = $this->batikEdit->asal_kota;
        $this->motif_batik = $this->batikEdit->motif_batik;
        $this->media = $this->batikEdit->media;

        // $this->emitUp('editProduct', $id);
    }

    public function render()
    {
        return view('livewire.dashboard.' . $this->url, [
            'product' => $this->batikEdit
        ]);
    }
}
