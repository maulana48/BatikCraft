<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

class TestController extends Controller
{
    //
    public function index(){
		$batik = Keranjang::all()->load(['productkeranjang', 'pemesanankeranjang']);
		$batik = Pembayaran::all()->load(['pemesanan']);
        return $batik;
        $batik = $batik->first();
        return $batik->pemesanankeranjang->pemesanan;
        return view('landing.index', [
            'title' => 'All batik ',
			'icon' => 'batik',
			'batik' => $batik
			
        ]);
			
		
		
        
    }
    public function show($slug){
       
        $hotel = Hotel::where('slug', $slug)->get();
        
        if(!$hotel){
            return response()->json([
                'status' => true,
                'message' => 'Data hotel tidak ditemukan',
                'data' => null
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Data hotel didapatkan',
            'data' => $hotel
        ]);
        
    }
    
}

