<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ Hotel, User };

class HotelController extends Controller
{
    //
    public function index(){
		$hotels = User::all()->load(['booking', 'review']);
        return $hotels;
        return view('landing.index', [
            'title' => 'All hotels ',
			'icon' => 'hotels',
			'hotels' => $hotels
			
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
