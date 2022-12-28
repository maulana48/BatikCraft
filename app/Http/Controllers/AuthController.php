<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login(Request $request){
        if($request->method() == 'GET'){
            return view('livewire.layouts.auth', [
                'title' => 'Login page',
                'icon' => 'batik(1).png',
            ]);
        }

        $username = $request->username;
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();

        if($user == null){
            return redirect()
            ->back()
            ->withErrors([
                'msg' => 'Email tidak ditemukan!',
            ]);
        }
        if($user->username != $username){
            return redirect()
            ->back()
            ->withErrors([
                'msg' => 'Username tidak ditemukan!',
            ]);
        }
        if(!Hash::check($password, $user->password)){
            return redirect()->back()->withErrors([
                'msg' => 'Password salah!',
            ]);
        }
        if(!session()->isStarted()) session()->start();
        session()->put('logged', true);
        session()->put('id_user', $user->id);
        return redirect()->route('ec.index');
    }

    function logout(Request $request){
        session()->flush();
        return redirect()->route('login');
    }
}
