<?php

namespace App\Livewire\Layouts;

use Livewire\Component;
use App\Livewire\Component\Content;
use Illuminate\Support\Facades\{Validator, DB};
use Livewire\WithFileUploads;
use App\Models\{
    Product,
    Order,
    Media,
    CartOrder,
    OrderProduct,
};

class Transaction extends Component
{
    use WithFileUploads;

    public $test = false;
    public $user;
    private $orderDetail;
    private $order;
    private $orderedProduct;

    public $media = [];
    public $reviewData = [];

    public function mount($user = null)
    {
        $this->user = $user;
        $this->order = CartOrder::query()
            ->where('cart_id', $this->user->cart->id)
            ->get();

        $this->order = Order::query()
            ->with(['payment', 'orderProduct'])
            ->whereIn('id', $this->order->map->only(['order_id']))
            ->get();
    }

    public function detailOrder($id)
    {
        $this->dispatch('detailOrder_open', orderId: $id)->to(Content::class);
        $this->test = true;
        // if ($this->user == null) {
        //     session()->flash('warning', 'Silahkan login terlebih dahulu');
        // }

        // $this->orderDetail = Order::query()
        //     ->with(['payment'])
        //     ->find($id);

        // $this->orderedProduct = OrderProduct::query()
        //     ->with(['product', 'productReview'])
        //     ->withCount([
        //         'productReview as review_count' => function ($query) {
        //             $query->where('user_id', '=', $this->user->id);
        //         }
        //     ])
        //     ->where('order_id', $this->orderDetail->id)
        //     ->get();
    }

    public function bayar()
    {
        $this->pemesanan[0]->status = 3;
        $this->pemesanan[0]->update();
        $this->pemesanan[0]->pembayaran->status = 2;
        $this->pemesanan[0]->pembayaran->update();
        return 'pembayaran berhasil';
    }

    public function review(Product $batik, $media, $reviewData)
    {
        $reviewData = [
            'user_id' => $this->user->id,
            'product_id' => $batik->id,
            'judul' => $reviewData[0],
            'komentar' => $reviewData[1],
            'rating' => $reviewData[2],
            'media' => $this->media
        ];

        $messages = [
            'required' => 'Input :attribute tidak boleh kosong.',
            'min' => 'Input :attribute harus lebih dari 5 karakter',
            'array' => 'Input :attribute tidak valid',
            'media.max' => 'File :attribute tidak boleh lebih dari 1 megabytes',
        ];

        $rules = [
            'user_id' => 'required',
            'product_id' => 'required',
            'judul' => 'required|min:5',
            'komentar' => 'required|min:5',
            'rating' => 'required|min:1|max:5',
            'media' => 'array',
            'media.*' => 'required|image|max:1024|mimes:jpg,png,jpeg,gif,svg'
        ];

        dd(Validator::validate($reviewData, $rules, $messages));
        dd('test', $reviewData);
        $reviewData = Validator::validate($reviewData, $rules, $messages);
        $review = $batik->reviewproduct()->create($reviewData);

        if ($this->media) {
            foreach ($this->media as $media) {
                $media = '/storage/' . $media->store('img/Review');
                $payload = [
                    'entitas_id' => $review->id,
                    'nama_entitas' => 'review_product',
                    'file' => $media,
                    'ekstensi' => substr($media, strrpos($media, '.') + 1)
                ];
                Media::create($payload);
                $reviewData['media'] = $media;
            }
        }
        $review->update($reviewData);
        return true;
    }

    public function render()
    {
        if ($this->test) {
            dd($this);
        }

        return view('livewire.layouts.transaction', [
            'order' => $this->order,
            'orderedProduct' => $this->orderedProduct,
            'user' => $this->user,
        ]);
    }
}
