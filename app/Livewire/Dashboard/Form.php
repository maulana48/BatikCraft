<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Productbatik;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public function edit($id)
    {
    }

    public function render()
    {
        return view('livewire.dashboard.form');
    }
}
