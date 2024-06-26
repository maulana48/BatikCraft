<div>
    <!-- content -->
    <div>
        @livewire(
            'layouts.' . $url,
            [
                'pageName' => $pageName,
                'user' => $user,
                'productId' => $productId,
                'orderId' => $orderId,
                'filter' => $filter,
            ],
            key(Str::uuid() . now())
        )
    </div>
    <!-- ./content -->
</div>
