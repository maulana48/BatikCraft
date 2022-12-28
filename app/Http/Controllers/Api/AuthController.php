<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        $user = User::query()
            ->where("email", $request->input("email"))
            ->first();

        if($user == null){
            return response()->json([
                'status' => false,
                'message' => "email tidak ditemukan",
                'data' => null
            ]);
        }

        if(!Hash::check($request->input('password'), $user->password)){
            return response()->json([
                'status' => false,
                'message' => "password anda salah",
                'data' => null
            ]);
        }
        $token = $user->createToken('auth_token');  // utk authorization
        return response()->json([
            'status' => true,
            'message' => "password anda salah",
            'data' => [
                'auth' => [
                    'token' => $token->plainTextToken,
                    'token_type' => 'Bearer'
                ],
                'user' => $user
            ]
        ]);
    }
    
    public function getUser(Request $request){
        $user = $request->user();   // mengambil data user berdasarkan token yang dikirim di request
        return response()->json([
            'status' => true,
            'message' => "Data user didapatkan",
            'data' => $user
        ]);
    }
}
