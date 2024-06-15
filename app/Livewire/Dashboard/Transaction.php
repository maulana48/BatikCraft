<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\{
    Product,
    Order
};

class Transaction extends Component
{
    public $title;
    public $icon;
    public $url;
    public $transaction_list;
    public $transaction;
    public $productDetail;
    public $orderedUser;

    public function mount()
    {
        $transaction_list = Order::with(['payment', 'cartOrder'])
            ->latest()
            ->get();

        $this->transaction_list = $transaction_list;
        $this->url = 'transaction';
    }
    public function transaction_list()
    {
        $this->url = 'transaction';
    }
    public function detail($id)
    {
        $this->url = 'transaction-detail';
        $transaction = $this->transaction_list->find($id);
        $orderedUser = $transaction->cartOrder->cart->user;
        $productDetail = $transaction->orderProduct;

        $this->$productDetail = $productDetail->load('product');
        $this->transaction = $transaction;
        $this->orderedUser = $orderedUser;
    }
    public function render()
    {
        return view('livewire.dashboard.' . $this->url);
    }
}
