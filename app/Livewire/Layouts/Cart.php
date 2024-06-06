<?php

namespace App\Livewire\Layouts;

use Livewire\Component;
use Illuminate\Support\Facades\{DB};
use App\Models\{
    Product,
    Order,
    Payment,
    OrderProduct,
    CartOrder,
};

class Cart extends Component
{
    public $user;
    public $batik;
    public $cartProducts;
    public $checked;
    public $title;
    public $icon;
    public $url;

    public function mount($user = null)
    {
        if ($user == null) {
            $this->url = 'auth.login';
            session()->flash('warning', 'Silahkan login terlebih dahulu');
            $this->emitUp('login');
            return;
        }
        $this->url = 'cart';
        $this->user = $user;
        $this->cartProducts = $user->cart->cartProducts;
        $batik = $this->cartProducts->map->only(['product_id']);
        $batik = Product::query()->whereIn('id', $batik)->orderBy('updated_at')->get();

        $this->batik = $batik;
    }

    public function checking($id)
    {
        $checked = $this->cartProducts->firstWhere('product_id', $id);
        if ($checked->status == 1) {
            $checked->update(['status' => 2]);
        } else {
            $checked->update(['status' => 1]);
            return 'Pilih untuk Check-out';
        }

        return 'Checked';
    }

    public function delete($id)
    {
        $deleted = $this->cartProducts->firstWhere('product_id', $id);
        $deleted = $deleted->delete();
        return 'deleted';
    }

    public function checkOut($konfirmasi = false)
    {
        $this->url = 'check-out';
        $this->checked = $this->cartProducts->where('status', 2)->sortBy('product_id');
        $this->batik = Product::query()
            ->whereIn('id', $this->checked->map->only(['product_id']))
            ->orderBy('id')
            ->orderBy('updated_at')->get();
        // $this->emitUp('checkOut');

        if ($konfirmasi) {
            $total = 0;
            foreach ($this->checked as $keys => $check) {
                $total += $check->jumlah * $this->batik->find($check->product_id)->harga;
            }

            $payload = [
                'total_amount' => $total,
                'shipping_address' => $this->user->alamat,
                'shipping_method' => 'J&T mungkin?',
                'estimated_delivery_timestamp' => now()->addDays(7),
                'status' => 1,
            ];

            $pemesanan = Order::create($payload);

            foreach ($this->checked as $keys => $check) {
                $payload = [
                    'product_id' => $check->product_id,
                    'amount' => $check->jumlah,
                    'order_id' => $pemesanan->id
                ];

                OrderProduct::create($payload);
                $check->delete();
            }

            $CartOrder = CartOrder::create([
                'cart_id' => $this->user->keranjang->id,
                'order_id' => $pemesanan->id
            ]);

            $pembayaran = Payment::create([
                'order_id' => $pemesanan->id,
                'payment_code' => $this->user->id . (int) (time() / (60 * 60 * 24)),
                'total_amount' => $pemesanan->total_harga,
                'paided_amount' => $pemesanan->total_harga,
                'payment_method' => 'COD',
                'status' => 1
            ]);

            session()->flash('success', 'Pemesanan berhasil!');
        }

        return '';
    }

    public function render()
    {
        return view('livewire.layouts.' . $this->url, [
            'batik' => $this->batik,
        ]);
    }
}
