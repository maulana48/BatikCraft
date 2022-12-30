<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class DetailTransaksi extends Component
{
    
    public function mount(){
	    $this->url = 'detail-transaksi';
    }

    public function render()
    {
        return view('livewire.dashboard.detail-transaksi');
    }
}
