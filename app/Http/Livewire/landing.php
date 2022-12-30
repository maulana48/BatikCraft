<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Laravel\Sanctum\PersonalAccessToken as PAT;
use App\Models\{ 
    KategoriProduct
};

class Landing extends Component
{
    public $user;
    public $title;
    public $icon;
    public $url;
    public $productId;
    public $kategori;

    public $listeners = ['shop', 'logout'];

    public function boot(){
    }
    public function mount(){
        $this->url = 'index';
        $this->kategori = KategoriProduct::all();

        $token = session()->get('token'. '');
        if(!$token == ''){
            $token = PAT::findToken($token->plainTextToken);
            $this->user = $token->tokenable;
        }

        // if($token != ''){
        //     $headers['authorization'] = "Bearer $token";
        // }
    }
    
    public function home(){
        $this->url = 'index';
    }

    public function shop(){
        $this->url = 'shop';
    }

    public function profile(){
        if($this->user == null){
            $this->url = 'auth.login';
            session()->flash('success', 'Silahkan login terlebih dahulu');
        }
        else{
            $this->url = 'profile';
        }
    }
    
    public function login(){
        if($this->user){
            return;
        }
        $this->url = 'auth.login';
        $this->title = 'Login Page';
        $this->icon = 'batik(1).png';
        return $this->url;
        $this->render();
    }

    public function logout(){
        $this->url = 'auth.login';
        session()->invalidate();
        session()->regenerateToken();
    }

    public function registration(){
        $this->url = 'auth.registration';
    }

    
    public function render()
    {
        $this->title = 'BatikCraft';
        $this->icon = 'batik(1).png';

        return view('livewire.landing')->layout('layouts.app', [
            'title' => $this->title,
            'icon' => $this->icon,
        ]);
    }
}
