<div>
    <!-- content -->
    <div>
        @livewire(
            'layouts.' . $url,
            [
                'user' => $user,
                'productId' => $productId,
            ],
            key(Str::uuid() . now())
        )
    </div>
    <!-- ./content -->
</div>
