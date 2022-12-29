<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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


class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
		$batik = DB::table('product_batiks')
            ->leftJoin('review_products', 'review_products.product_id', '=', 'product_batiks.id')
            ->leftJoin('kategori_products', 'kategori_products.id', '=', 'product_batiks.kategori_product_id')
            ->select('product_batiks.*', DB::raw('AVG(review_products.rating) as rating'), DB::raw('count(review_products.rating) as jumlah_review'), 'kategori_products.nama as nama_kategori')
            ->groupBy('product_batiks.id', 'review_products.product_id', 'kategori_products.nama')
            ->orderBy('product_batiks.created_at', 'desc')
            ->get();
        
        $kategori = KategoriProduct::all();
        $terbaru = $batik->take(4);
        return view('livewire.landing', [
            'title' => 'BatikCraft',
			'icon' => 'batik(1).png',
			'batik' => $batik,
			'terbaru' => $terbaru,
			'kategori' => $kategori,
            'url' => 'index'
        ]);
    }

    public function index()
    {
		$batik = ProductBatik::find(1);
        $kategori = KategoriProduct::where('id', $batik->kategori_products_id)->get();
        $warna = ProductBatik::where('tipe_warna', $batik->tipe_warna)->get();
        return view('livewire.landing', [
            'title' => 'BatikCraft',
			'icon' => 'batik(1).png',
			'batik' => $batik,
			'tipe_warna' => $warna,
			'kategoriBatik' => $kategori,
            'url' => 'product'
        ]);
    }

}
