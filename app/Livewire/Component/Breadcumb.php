<?php

namespace App\Livewire\Component;

use Livewire\Component;
use Livewire\Attributes\On;

class Breadcumb extends Component
{
    public $breadcumb = [];

    public function boot($breadcumb = [])
    {
        $this->breadcumb = $breadcumb;
    }

    public function mount($breadcumb = [])
    {
        $this->breadcumb = $breadcumb;
    }

    #[On('breadcumb_update')]
    public function updateBreadcumb($pageName = "", $action = "")
    {
        $this->pageName = $pageName;
        if ($action == "replace") {
            $this->breadcumb = [$pageName];
        } else if ($action == "add") {
            array_push($this->breadcumb, $pageName);
        }
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
