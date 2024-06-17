<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Custom\Rule\{MediaCount, MediaSize};
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
    public $original_media = [];

    // #[Validate(['media' => [new MediaCount(), new MediaSize()]])] // 1MB Max
    #[Validate(['uploaded_media.*' => [new MediaCount, new MediaSize]])]
    public $uploaded_media = [];

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
        $this->formUrl = '';
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
        $this->formUrl = 'createProduct';
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
            'name' => 'required',
            'merch' => 'required',
            'product_category_id' => 'required',
            'price' => 'required',
            'description' => 'required|min:5',
            'color_type' => 'required',
            'stock' => 'required',
            'city_origin' => 'required',
            'batik_motif' => 'required',
            'uploaded_media.*' => 'required|image|max:2048',  // 
        ];

        $payload = $this->validate($rules, $messages);
        $payload['uploaded_media'] = $this->uploaded_media[0]->store('uploads/Product');    // dalam proses testing
        $batik = ProductModel::create($payload);

        if (!$batik) {
            return session()->flash('Error', 'Gagal menambahkan data product, coba lagi');
        }

        if ($this->uploaded_media) {
            foreach ($this->uploaded_media as $media) {
                $media = '/storage/' . $media->store('img/Product');
                $data = [
                    'parent_id' => $batik->id,
                    'parent_type' => 'product_batik',
                    'file' => $media,
                    'extension' => substr($media, strrpos($media, '.') + 1)
                ];
                Media::create($data);
            }
        }

        $this->uploaded_media = [];

        return session()->flash('success', 'Data product berhasil ditambahkan');
    }

    public function edit($id)
    {
        $this->url = 'form';
        $this->formUrl = 'editProduct(' . $id . ')';
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

        $media_list = $batikEdit->media()->get();
        for ($i = 0; $i < count($media_list); $i++) {
            $file = $media_list[$i]->file . '.' . $media_list[$i]->extension;
            array_push($this->original_media, $file);
        }
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
            'uploaded_media.*' => 'nullable|max:2048',
        ];
        $payload = $this->validate($rules, $messages);

        $batik = ProductModel::find($id);

        if ($this->uploaded_media) {
            foreach ($this->uploaded_media as $media) {
                $media = '/storage/' . $media->store('img/Product');
                $data = [
                    'parent_id' => $batik->id,
                    'parent_type' => 'product_batik',
                    'file' => $media,
                    'extension' => substr($media, strrpos($media, '.') + 1)
                ];
                Media::create($data);
                $payload['uploaded_media'] = $data['file'];
            }
        }

        $this->uploaded_media = [];

        $batik = $batik->update($payload);



        if (!$batik) {
            return session()->flash('Error', 'Gagal update data product, coba lagi');
        }

        return session()->flash('success', 'Berhasil mengupdate product');

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
        $this->formUrl = 'createCategory';
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
            'uploaded_media.*' => 'required',  // |image|max:2048
        ];

        $payload = $this->validate($rules, $messages);
        $payload['uploaded_media'] = '/storage/' . $this->uploaded_media[0]->store('img/Kategori');
        $category = ProductCategory::create($payload);

        if (!$category) {
            return session()->flash('Error', 'Gagal menambahkan data kategori, coba lagi');
        }

        if ($this->uploaded_media) {
            foreach ($this->uploaded_media as $media) {
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
        $this->uploaded_media = [];

        return session()->flash('success', 'Data kategori berhasil ditambahkan');
    }

    public function editCat($id)
    {
        $this->url = 'cat-form';
        $this->formUrl = 'editCategory(' . $id . ')';
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

        if ($this->uploaded_media) {
            $cat->medias()->each->delete();
            foreach ($this->uploaded_media as $media) {
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

        $this->uploaded_media = [];

        // foreach ($this->uploaded_media as $media) {
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
