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

class Index extends Component
{
    public $order;
    public $user;
    public $batik;
    public $payment;
    public $terpopuler;

    public function mount()
    {
        $this->order = Order::all()->count();
        $this->user = User::query()->where('role', 2)->get();
        $this->batik = Product::all();
        $this->terpopuler = OrderProduct::query()
            ->with(['product'])
            ->select('product_id', DB::raw('SUM(amount) as total'))
            ->groupBy('product_id')
            ->distinct()
            ->orderBy('total', 'desc')
            ->limit(3)
            ->get();
        $this->payment = Payment::all();

        dd($this->terpopuler);
    }

    public function render()
    {
        return view('livewire.dashboard.index');
    }
}
