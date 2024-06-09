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
    public $batik_list;
    public $cartProducts;
    public $checked;
    public $title;
    public $icon;
    public $url;

    public function mount($user = null)
    {
        $this->url = 'cart';
        $this->user = $user;
        $this->cartProducts = $user->cart->cartProducts;

        $batik_list = $this->cartProducts->map->only(['product_id']);

        // get the product list from the cart with their status from cart_products
        $media_query = DB::raw('(SELECT file FROM media WHERE parent_id = products.id AND parent_type = "products" LIMIT 1) as main_media');
        $batik_list = DB::table('products')
            ->join('cart_products', function ($join) {
                $join->on('products.id', '=', 'cart_products.product_id')
                    ->where('cart_products.cart_id', $this->user->cart->id);
            })
            ->whereIn('products.id', $batik_list)
            ->select(
                'products.*',
                'cart_products.status',
                'cart_products.amount',
                $media_query
            )
            ->get();

        $this->batik_list = $batik_list;
    }

    public function checking($index)
    {
        $checkedItem = $this->batik_list[$index];
        $status = 0;

        if ($checkedItem->status == 1) {
            $status = 2;
        } else {
            $status = 1;
        }

        $this->batik_list[$index]->status = $status;
        DB::table('cart_products')
            ->where('product_id', $checkedItem->id)
            ->update(['status' => $status]);

        return $status;
    }

    public function delete($index)
    {
        $checkedItem = $this->batik_list[$index];
        $this->batik_list->forget($index);

        $deleted = $this->cartProducts->firstWhere('product_id', $checkedItem->id);
        $deleted = $deleted->delete();
        return 'deleted';
    }

    public function checkOut($konfirmasi = false)
    {
        $this->url = 'check-out';
        $this->checked = $this->cartProducts->where('status', 2)->sortBy('product_id');
        $this->batik_list = Product::query()
            ->whereIn('id', $this->checked->map->only(['product_id']))
            ->orderBy('id')
            ->orderBy('updated_at')->get();
        // $this->emitUp('checkOut');

        if ($konfirmasi) {
            $total = 0;
            foreach ($this->checked as $keys => $check) {
                $total += $check->amount * $this->batik_list->find($check->product_id)->harga;
            }

            $payload = [
                'total_amount' => $total,
                'shipping_address' => $this->user->address,
                'shipping_method' => 'J&T mungkin?',
                'order_timestamp' => now(),
                'estimated_delivery_timestamp' => now()->addDays(7),
                'status' => 1,
            ];

            $pemesanan = Order::create($payload);

            foreach ($this->checked as $keys => $check) {
                $payload = [
                    'product_id' => $check->product_id,
                    'amount' => $check->amount,
                    'order_id' => $pemesanan->id
                ];

                OrderProduct::create($payload);
                $check->delete();
            }

            CartOrder::create([
                'cart_id' => $this->user->cart->id,
                'order_id' => $pemesanan->id
            ]);

            Payment::create([
                'order_id' => $pemesanan->id,
                'payment_code' => $this->user->id . (int) (time() / (60 * 60 * 24)),
                'total_amount' => $pemesanan->total_amount,
                'paided_amount' => $pemesanan->total_amount,
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
            'batik_list' => $this->batik_list,
        ]);
    }
}
