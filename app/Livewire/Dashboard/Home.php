<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\{
    Product,
    Order,
    User,
    Payment,
    OrderProduct
};

class Home extends Component
{
    public $user;
    private $order_list;
    private $batik_list;
    private $payment_list;
    private $terpopuler;

    public function mount()
    {
        $this->user = User::query()->where('role', 2)->get();
        $this->order_list = Order::all()->count();
        $this->batik_list = Product::all();
        $this->terpopuler = Product::query()
            ->withCount('orderProducts as total_sell')
            ->with('main_media')
            ->orderBy('total_sell', 'desc')
            ->limit(3)
            ->get();
        $this->payment_list = Payment::all();
    }

    public function render()
    {
        return view('livewire.dashboard.home', [
            'order_list' => $this->order_list,
            'batik_list' => $this->batik_list,
            'payment_list' => $this->payment_list,
            'terpopuler' => $this->terpopuler
        ]);
    }
}
