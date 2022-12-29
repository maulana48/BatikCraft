<?php

namespace App\Http\Livewire\Layouts\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\{ Hash, Validator};

class Login extends Component
{
    public $email;
    public $password;

    public function login(){
        $messages = [
        'required' => 'Input :attribute tidak boleh kosong.',
        'min' => 'Input :attribute harus lebih dari 3 karakter',
        'email' => ':attribute tidak valid',
        ];

        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $payload = $this->validate($rules, $messages);
        
        $user = User::query()->where('email', $payload['email'])->first();
        if(!$user){
            return session()->flash('loginError', 'Email atau Password salah');
        }

        if(!Hash::check($payload['password'], $user->password)){
            return session()->flash('loginError', 'Email atau Password salah');
        }
        
        $token = $user->createToken('auth_token');
        session()->put('token', $token);
        session()->put('user', $user);
        return redirect('/');
    }

    public function render()
    {
        return view('livewire.layouts.auth.login');
    }
}
