<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\{ Hash, File, DB };
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
    public $formUrl;
    public $batik;
	public $kategori;

	public $nama;
	public $kategori_product_id;
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
    
    
        public function test(){
            dd($this->batikEdit);
        }
    public function product(){
        $this->url = 'product';
        $this->emitUp('transaksi');
    }
    
    public function create(){
        $this->url = 'form';
        $this->urlForm = 'createProduct';
        $this->title = 'Tambah Produk Baru';
        $this->message = 'Masukkan data untuk produk ini.';
    }

    public function createProduct(){
        $messages = [
            'required' => 'Input :attribute tidak boleh kosong.',
            'min' => 'Input :attribute harus lebih dari 5 karakter',
            'email' => ':attribute tidak valid',
            'image' => 'gambar tidak valid',
            'confirmed' => 'konfirmasi password tidak valid'
        ];

        $rules = [
            'nama' => 'required',
            'kategori_product_id' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required|min:5',
            'tipe_warna' => 'required',
            'stok' => 'required',
            'asal_kota' => 'required',
            'motif_batik' => 'required',
            'media' => 'required|image|max:2048',
        ];

        $payload = $this->validate($rules, $messages);
        if($this->media){
            $payload['media'] = $this->media->store('img/Product', ['disk' => 'public_uploads']);
        }
        
        $batik = ProductBatik::create($payload);

        if(!$batik){
            return session()->flash('Error', 'Gagal menambahkan data product, coba lagi');
        }

        return session()->flash('success', 'Data product berhasil ditambahkan');
    }

    public function edit($id){
        $this->url = 'form';
        $this->urlForm = 'editProduct(' .$id. ')';
        $this->title = 'Edit Produk';
        $this->message = 'Masukkan data terbaru untuk produk ini.';

        $batikEdit = $this->batik->find($id);
        $this->nama = $batikEdit->nama;
        $this->kategori_product_id = $batikEdit->kategori_product_id;
        $this->harga = $batikEdit->harga;
        $this->deskripsi = $batikEdit->deskripsi;
        $this->tipe_warna = $batikEdit->tipe_warna;
        $this->stok = $batikEdit->stok;
        $this->asal_kota = $batikEdit->asal_kota;
        $this->motif_batik = $batikEdit->motif_batik;
        $this->media = $batikEdit->media;
    
        // $this->emitUp('editProduct', $id);
    }

    public function editProduct($id){
        $messages = [
            'required' => 'Input :attribute tidak boleh kosong.',
            'min' => 'Input :attribute harus lebih dari 5 karakter',
            'email' => ':attribute tidak valid',
            'image' => 'gambar tidak valid',
            'confirmed' => 'konfirmasi password tidak valid'
        ];

        $rules = [
            'nama' => 'required',
            'kategori_product_id' => 'required',
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

    public function delete($id)
    {
        $batik = ProductBatik::find($id);
        File::delete(public_path($batik->media));
        $batik->delete();
        session()->flash('success', 'Data product berhasil dihapus');
        dd(session());
    }

    public function render()
    {
        return view('livewire.dashboard.' . $this->url);
    }
}
