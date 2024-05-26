<?php

namespace App\Livewire;

use Livewire\Component;
use Laravel\Sanctum\PersonalAccessToken as PAT;
use App\Models\{
    ProductCategory
};

class Landing extends Component
{
    public $user;
    public $title;
    public $icon;
    public $url;
    public $productId;

    // protected $listeners = ['home', 'shops' => 'shop', 'cart', 'logout', 'registration', 'login', 'detailProduct', 'checkOut' => '$refresh'];

    public function mount()
    {
        $token = session()->get('token' . '');
        if (!$token == '') {
            $token = PAT::findToken($token->plainTextToken);
            if ($token) {
                if ($token->tokenable->role == 2) {
                    $this->user = $token->tokenable;
                }
            }
        }
    }


    public function render()
    {
        if ($this->user) {
            $this->cartProducts = $this->user->cart->cartProducts->count();
        }
        $this->title = 'BatikCraft';
        $this->icon = 'batik(1).png';
        $this->url = ($this->url == '') ? 'home' : $this->url;

        return view('livewire.landing', [
            'user' => $this->user,
        ])
            ->layoutData([
                'title' => $this->title,
                'icon' => $this->icon,
            ]);
    }
}
