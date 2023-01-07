<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\{ File, DB };
use App\Models\{ 
    ProductBatik,
    KategoriProduct,
    Media
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
	public $listCat = false;
    //protected $listeners = ['delete' => 'mount'];

	public $nama;
	public $merk;
	public $kategori_product_id;
	public $harga;
	public $deskripsi;
	public $tipe_warna;
	public $stok;
	public $asal_kota;
	public $motif_batik;
	public $media = [];
    
    public function mount(){
        $batik = ProductBatik::with(['reviewproduct:rating', 'kategoriproduct'])
        ->latest()
        ->get();
        
        $kategori = KategoriProduct::all();
        
	    $this->batik = $batik;
	    $this->kategori = $kategori;
	    $this->url = 'product';

    }
    
    
    // public function test(){
    //     dd($this->batikEdit);
    // }
    // public function product(){
    //     $this->url = 'product';
    //     $this->emitUp('transaksi');
    // }
    
    public function list(){
        $this->listCat = false;
        $this->render();
    }

    public function listCat(){
        $this->listCat = true;
        $this->render();
    }

    public function createCat(){
        $this->url = 'cat-form';
        $this->urlForm = 'createCategory';
        $this->title = 'Tambah Category Baru';
        $this->message = 'Masukkan data untuk categori ini.';
    }

    public function createCategory(){
        $messages = [
            'required' => 'Input :attribute tidak boleh kosong.',
            'min' => 'Input :attribute harus lebih dari :min karakter',
            'image' => 'gambar tidak valid',
        ];

        $rules = [
            'nama' => 'required|min:3',
            'deskripsi' => 'required|min:5',
            'media' => 'required',  // |image|max:2048
        ];

        $payload = $this->validate($rules, $messages);
        $payload['media'] = $this->media[0]->store('img/Kategori', ['disk' => 'public_uploads']);
        $category = KategoriProduct::create($payload);
        
        if(!$category){
            return session()->flash('Error', 'Gagal menambahkan data kategori, coba lagi');
        }
        
        if($this->media){
            foreach ($this->media as $media) {
                $payload = [
                    'entitas_id' => $category->id,
                    'nama_entitas' => 'kategori_product',
                    'file' => $media = '/' . $media->store('img/Kategori', ['disk' => 'public_uploads']),
                    'ekstensi' => substr($media, strrpos($media, '.')+1)
                ];
                Media::create($payload);
            }
        }
        $this->media = null;

        return session()->flash('success', 'Data kategori berhasil ditambahkan');
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
            'min' => 'Input :attribute harus lebih dari :min karakter',
            'image' => 'gambar tidak valid'
        ];

        $rules = [
            'nama' => 'required',
            'merk' => 'required',
            'kategori_product_id' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required|min:5',
            'tipe_warna' => 'required',
            'stok' => 'required',
            'asal_kota' => 'required',
            'motif_batik' => 'required',
            'media' => 'required|image|max:2048',  // 
        ];
        
        $payload = $this->validate($rules, $messages);
        $payload['media'] = $this->media[0]->store('img/Product', ['disk' => 'public_uploads']);
        $batik = ProductBatik::create($payload);
        
        if(!$batik){
            return session()->flash('Error', 'Gagal menambahkan data product, coba lagi');
        }
        
        if($this->media){
            foreach ($this->media as $media) {
                $payload = [
                    'entitas_id' => $batik->id,
                    'nama_entitas' => 'product_batik',
                    'file' => $media = '/' . $media->store('img/Product', ['disk' => 'public_uploads']),
                    'ekstensi' => substr($media, strrpos($media, '.')+1)
                ];
                Media::create($payload);
            }
        }
        
        $this->media = null;

        return session()->flash('success', 'Data product berhasil ditambahkan');
    }

    public function edit($id){
        $this->url = 'form';
        $this->urlForm = 'editProduct(' .$id. ')';
        $this->title = 'Edit Produk';
        $this->message = 'Masukkan data terbaru untuk produk ini.';

        $batikEdit = $this->batik->find($id);
        $this->nama = $batikEdit->nama;
        $this->merk = $batikEdit->merk;
        $this->kategori_product_id = $batikEdit->kategori_product_id;
        $this->harga = $batikEdit->harga;
        $this->deskripsi = $batikEdit->deskripsi;
        $this->tipe_warna = $batikEdit->tipe_warna;
        $this->stok = $batikEdit->stok;
        $this->asal_kota = $batikEdit->asal_kota;
        $this->motif_batik = $batikEdit->motif_batik;
        $this->media = [$batikEdit->media];
    
        // $this->emitUp('editProduct', $id);
    }

    public function editProduct($id){
        $messages = [
            'required' => 'Input :attribute tidak boleh kosong.',
            'min' => 'Input :attribute harus lebih dari :min karakter',
            'email' => ':attribute tidak valid',
            'image' => 'gambar tidak valid',
        ];

        $rules = [
            'nama' => 'required',
            'merk' => 'required',
            'kategori_product_id' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required|min:5',
            'tipe_warna' => 'required',
            'stok' => 'required',
            'asal_kota' => 'required',
            'motif_batik' => 'required',
            'media' => 'nullable|max:2048',
        ];
        $payload = $this->validate($rules, $messages);
        
        $batik = ProductBatik::find($id);
        
        if(!$this->media){
            $payload['media'] = $this->media[0]->store('img/Product', ['disk' => 'public_uploads']);
        }

        $this->media = null;

        // foreach ($this->media as $media) {
        //     $payload = [
        //         'entitas_id' => $batik->id,
        //         'nama_entitas' => 'product_batik',
        //         'file' => $media = '/' . $media->store('img/Product', ['disk' => 'public_uploads']),
        //         'ekstensi' => substr($media, strrpos($media, '.')+1)
        //     ];
        //     Media::create($payload);
        // }

        $batik = $batik->update($payload);
        
        

        if(!$batik){
            return session()->flash('Error', 'Gagal update data product, coba lagi');
        }

        return session()->flash('success', 'Update data product berhasil');

    }

    public function delete($id)
    {
        $batik = $this->batik->find($id);
        File::delete(public_path($batik->media));
        $batik->delete();
        session()->flash('success', 'Data product berhasil dihapus');
        return 'deleted';
    }

    public function render()
    {
        return view('livewire.dashboard.' . $this->url);
    }
}
