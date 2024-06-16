<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Rules\{MediaCount, MediaSize};
use Illuminate\Support\Facades\{File, DB};
use App\Models\{
    Product as ProductModel,
    ProductCategory,
    Media
};

class Product extends Component
{
    use WithFileUploads;

    public $title;
    public $icon;
    public $url;
    public $formUrl;
    public $message;
    public $batik_list;
    public $category_list;
    public $listCat = false;
    //protected $listeners = ['delete' => 'mount'];

    public $name;
    public $merch;
    public $product_category_id;
    public $price;
    public $description;
    public $color_type;
    public $stock;
    public $city_origin;
    public $batik_motif;

    // #[Validate(['media.*' => 'image|max:1024'])] // 1MB Max
    public $media = [];

    public function save()
    {
        $this->validate([
            'media' => [new MediaCount(), new MediaSize()]
        ]);

        foreach ($this->media as $media) {
            $media->store('img/Product');
        }
    }

    public function mount()
    {
        $batik_list = ProductModel::
            select('products.*', 'product_categories.name as category_name', DB::raw('AVG(product_reviews.rating) as avg_rating'))
            ->leftJoin('product_categories', 'products.product_category_id', '=', 'product_categories.id')
            ->leftJoin('product_reviews', 'products.id', '=', 'product_reviews.product_id')
            ->groupBy('products.id')
            ->latest()
            ->get();

        $category_list = ProductCategory::all();

        $this->batik_list = $batik_list;
        $this->category_list = $category_list;
        $this->url = 'product';
        $this->urlForm = '';
        $this->title = 'List Product BatikCraft';
        $this->message = '';
    }


    // public function test(){
    //     dd($this->batikEdit);
    // }
    // public function product(){
    //     $this->url = 'product';
    //     $this->emitUp('transaksi');
    // }

    public function listProduct()
    {
        $this->listCat = false;
    }

    public function listCategory()
    {
        $this->listCat = true;
    }

    public function create()
    {
        $this->url = 'form';
        $this->urlForm = 'createProduct';
        $this->title = 'Tambah Produk Baru';
        $this->message = 'Masukkan data untuk produk ini.';
    }

    public function createProduct()
    {
        $messages = [
            'required' => 'Input :attribute tidak boleh kosong.',
            'min' => 'Input :attribute harus lebih dari :min karakter',
            'image' => 'gambar tidak valid'
        ];

        $rules = [
            'nama' => 'required',
            'merk' => 'required',
            'product_category_id' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required|min:5',
            'color_type' => 'required',
            'stok' => 'required',
            'asal_kota' => 'required',
            'motif_batik' => 'required',
            'media.*' => 'required|image|max:2048',  // 
        ];

        $payload = $this->validate($rules, $messages);
        $payload['media'] = $this->media[0]->store('uploads/Product');    // dalam proses testing
        $batik = ProductModel::create($payload);

        if (!$batik) {
            return session()->flash('Error', 'Gagal menambahkan data product, coba lagi');
        }

        if ($this->media) {
            foreach ($this->media as $media) {
                $media = '/storage/' . $media->store('img/Product');
                $data = [
                    'parent_id' => $batik->id,
                    'parent_type' => 'product_batik',
                    'file' => $media,
                    'ekstensi' => substr($media, strrpos($media, '.') + 1)
                ];
                Media::create($data);
            }
        }

        $this->media = null;

        return session()->flash('success', 'Data product berhasil ditambahkan');
    }

    public function edit($id)
    {
        $this->url = 'form';
        $this->urlForm = 'editProduct(' . $id . ')';
        $this->title = 'Edit Produk';
        $this->message = 'Masukkan data terbaru untuk produk ini.';

        $batikEdit = $this->batik_list->find($id);

        $this->name = $batikEdit->name;
        $this->merch = $batikEdit->merch;
        $this->product_category_id = $batikEdit->product_category_id;
        $this->price = $batikEdit->price;
        $this->description = $batikEdit->description;
        $this->color_type = $batikEdit->color_type;
        $this->stock = $batikEdit->stock;
        $this->city_origin = $batikEdit->city_origin;
        $this->batik_motif = $batikEdit->batik_motif;
        $this->media = $batikEdit->media()->get();

        // $this->emitUp('editProduct', $id);
    }

    public function editProduct($id)
    {
        $messages = [
            'required' => 'Input :attribute tidak boleh kosong.',
            'min' => 'Input :attribute harus lebih dari :min karakter',
            'email' => ':attribute tidak valid',
            'image' => 'gambar tidak valid',
        ];

        $rules = [
            'name' => 'required',
            'merch' => 'required',
            'product_category_id' => 'required',
            'price' => 'required',
            'description' => 'required|min:5',
            'color_type' => 'required',
            'stock' => 'required',
            'city_origin' => 'required',
            'batik_motif' => 'required',
            'media.*' => 'nullable|max:2048',
        ];
        $payload = $this->validate($rules, $messages);

        $batik = ProductModel::find($id);

        if ($this->media) {
            foreach ($this->media as $media) {
                $media = '/storage/' . $media->store('img/Product');
                $data = [
                    'parent_id' => $batik->id,
                    'parent_type' => 'product_batik',
                    'file' => $media,
                    'extension' => substr($media, strrpos($media, '.') + 1)
                ];
                Media::create($data);
                $payload['media'] = $data['file'];
            }
        }

        $this->media = null;

        $batik = $batik->update($payload);



        if (!$batik) {
            return session()->flash('Error', 'Gagal update data product, coba lagi');
        }

        return session()->flash('success', 'Update data product berhasil');

    }

    public function delete($id)
    {
        $batik = $this->batik_list->find($id);
        File::delete(public_path($batik->media));
        $batik->delete();

        session()->flash('success', 'Data product berhasil dihapus');
        return 'deleted';
    }

    public function createCat()
    {
        $this->url = 'cat-form';
        $this->urlForm = 'createCategory';
        $this->title = 'Tambah Kategori Produk';
        $this->message = 'Masukkan data untuk kategori ini.';
    }

    public function createCategory()
    {
        $messages = [
            'required' => 'Input :attribute tidak boleh kosong.',
            'min' => 'Input :attribute harus lebih dari :min karakter',
            'image' => 'gambar tidak valid',
        ];

        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|min:5',
            'media.*' => 'required',  // |image|max:2048
        ];

        $payload = $this->validate($rules, $messages);
        $payload['media'] = '/storage/' . $this->media[0]->store('img/Kategori');
        $category = ProductCategory::create($payload);

        if (!$category) {
            return session()->flash('Error', 'Gagal menambahkan data kategori, coba lagi');
        }

        if ($this->media) {
            foreach ($this->media as $media) {
                $media = '/storage/' . $media->store('img/Category');
                $payload = [
                    'parent_id' => $category->id,
                    'parent_type' => 'kategori_product',
                    'file' => $media,
                    'extension' => substr($media, strrpos($media, '.') + 1)
                ];
                Media::create($payload);
            }
        }
        $this->media = null;

        return session()->flash('success', 'Data kategori berhasil ditambahkan');
    }

    public function editCat($id)
    {
        $this->url = 'cat-form';
        $this->urlForm = 'editCategory(' . $id . ')';
        $this->title = 'Edit Data Kategori';
        $this->message = 'Masukkan data terbaru untuk kategori ini.';

        $catEdit = $this->category_list->find($id);
        $this->nama = $catEdit->nama;
        $this->deskripsi = $catEdit->deskripsi;

        // $this->emitUp('editProduct', $id);
    }

    public function editCategory($id)
    {
        $messages = [
            'required' => 'Input :attribute tidak boleh kosong.',
            'min' => 'Input :attribute harus lebih dari :min karakter',
            'image' => 'gambar tidak valid',
        ];

        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|min:5',
        ];
        $payload = $this->validate($rules, $messages);

        $cat = ProductCategory::find($id);

        if ($this->media) {
            $cat->medias()->each->delete();
            foreach ($this->media as $media) {
                $media = '/storage/' . $media->store('img/Category');
                $payload = [
                    'parent_id' => $cat->id,
                    'parent_type' => 'kategori_product',
                    'file' => $media,
                    'extension' => substr($media, strrpos($media, '.') + 1)
                ];
                Media::create($payload);
            }
        }

        $this->media = null;

        // foreach ($this->media as $media) {
        //     $media = '/storage/' . $media->store('img/Product');
        //     $payload = [
        //         'parent_id' => $batik->id,
        //         'parent_type' => 'product_batik',
        //         'file' => $media,
        //         'extension' => substr($media, strrpos($media, '.')+1)
        //     ];
        //     Media::create($payload);
        // }

        $cat = $cat->update($payload);



        if (!$cat) {
            return session()->flash('Error', 'Gagal update data kategori, coba lagi');
        }

        return session()->flash('success', 'Update data kategori berhasil');

    }

    public function deleteCat($id)
    {
        $cat = $this->category_list->find($id);
        foreach ($cat->medias() as $media) {
            File::delete(public_path($media->file));
            $media->delete();
        }
        $cat->delete();
        session()->flash('success', 'Data kategori berhasil dihapus');
        return 'deleted';
    }

    public function render()
    {
        return view('livewire.dashboard.' . $this->url);
    }
}
