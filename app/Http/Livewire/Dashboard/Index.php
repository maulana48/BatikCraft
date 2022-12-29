<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Index extends Component
{
    public function render($url = 'index')
    {
        return view('livewire.dashboard.index');
    }
}
