<div>
    <!-- content -->
    @if ($url != 'home')
        @livewire('component.breadcumb', [$breadcumb], key(Str::uuid() . now()))
    @endif

    @if (count($breadcumb) > 1)
        @dd($breadcumb)
    @endif
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
