<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Productbatik;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public function test(){
        dd($this->product);
    }
    public function edit($id){
    }

    public function render()
    {
        dd($this->product);
        return view('livewire.dashboard.form');
    }
}
