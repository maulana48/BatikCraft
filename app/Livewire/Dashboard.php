<?php

namespace App\Livewire;

use Livewire\Component;
use Laravel\Sanctum\PersonalAccessToken as PAT;

class Dashboard extends Component
{
    public $title;
    public $icon;
    public $url;
    public $urlT;
    public $admin;
    public Location $location;
    // public $listeners = ['home' => 'mount'];

    public function mount()
    {
        // $this->url = 'auth.login';
        // session()->invalidate();
        // session()->regenerateToken();
        $token = session()->get('token' . '');

        if ($token == '' || !session()->has('admin')) {
            $this->url = 'auth.login';
            $this->login();
            session()->flash('warning', 'Silahkan login terlebih dahulu');
        } else {
            $token = PAT::findToken($token->plainTextToken);
            $this->admin = $token->tokenable;
            $this->url = 'index';
            // $this->location->refresh();
        }
    }

    public function render()
    {
        $this->title = 'BatikCraft';
        $this->icon = 'batik(1).png';

        return view('livewire.dashboard')->layout('layouts.dashboard', [
            'title' => $this->title,
            'icon' => $this->icon,
            'admin' => $this->admin
        ]);
    }
}