<?php

namespace App\Http\Livewire\Dashboard\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\{ Hash, Validator};

class Login extends Component
{
    public $url;
    public $email;
    public $password;

    public function mount(){
        $this->url = 'auth.login';
    }
    
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
        
        $user = User::query()->where([
            ['email', '=', $payload['email']],
            ['role', '=', '1'],
        ])->first();
        
        if(!$user){
            return session()->flash('loginError', 'Email atau Password salah');
        }

        if(!Hash::check($payload['password'], $user->password)){
            return session()->flash('loginError', 'Email atau Password salah');
        }
        
        $token = $user->createToken('auth_token');
        session()->put('token', $token);
        session()->put('admin', $user);
        return redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.dashboard.' . $this->url);
    }
}
