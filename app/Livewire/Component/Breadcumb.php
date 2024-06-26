<?php

namespace App\Livewire\Component;

use Livewire\Component;

class Breadcumb extends Component
{
    public $pageName;

    public function mount($pageName = null)
    {
        $this->pageName = $pageName;
    }

    public function home()
    {
        $this->dispatch('home');
    }

    public function render()
    {
        return view('livewire.component.breadcumb');
    }
}
