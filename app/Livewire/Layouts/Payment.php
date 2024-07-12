<?php

namespace App\Livewire\Layouts;

use App\Models\Order;
use Livewire\Component;

class Payment extends Component
{
    private $order;
    private $orderProduct;

    public function mount($orderId)
    {
        $this->order = Order::query()
            ->with(['payment', 'orderProduct'])
            ->find($orderId);

        $this->orderProduct = $this->order->orderProduct;
    }

    public function render()
    {
        return view('livewire.layouts.payment', [
            'order' => $this->order,
            'orderProduct' => $this->orderProduct,
        ]);
    }
}
