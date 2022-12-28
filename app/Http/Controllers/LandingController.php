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
    public function index()
    {
		$batik = DB::table('product_batiks')
            ->leftJoin('review_products', 'review_products.product_id', '=', 'product_batiks.id')
            ->leftJoin('kategori_products', 'kategori_products.id', '=', 'product_batiks.kategori_product_id')
            ->select('product_batiks.*', DB::raw('sum(review_products.rating) / count(review_products.rating) as rating'), DB::raw('count(review_products.rating) as jumlah_review'), 'kategori_products.nama as nama_kategori')
            ->groupBy('product_batiks.id', 'review_products.product_id', 'kategori_products.nama')
            ->orderBy('product_batiks.created_at', 'desc')
            ->get();
        
        $kategori = KategoriProduct::all();
        $terbaru = $batik->take(4);
        return view('landing.index', [
            'title' => 'All batik ',
			'icon' => 'batik(1).png',
			'batik' => $batik,
			'terbaru' => $terbaru,
			'kategori' => $kategori
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
