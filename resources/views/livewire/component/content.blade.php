<div>
    <!-- content -->
    <div>
        @livewire(
            'layouts.' . $url,
            [
                'user' => $user,
                'productId' => $productId,
                'orderId' => $orderId,
            ],
            key(Str::uuid() . now())
        )
    </div>
    <!-- ./content -->
</div>
