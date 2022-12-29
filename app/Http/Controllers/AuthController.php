<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        if($request->method() == 'GET'){
            return view('livewire.landing', [
                'title' => 'Login',
                'icon' => 'batik(1).png',
                'url' => 'auth.login'
            ]);
        }
    }

    Public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }

    public function registration(Request $request){
        if($request->method() == 'GET'){
            return view('livewire.landing', [
                'title' => 'Registration',
                'icon' => 'batik(1).png',
                'url' => 'auth.registration'
            ]);
        }
    }
}
