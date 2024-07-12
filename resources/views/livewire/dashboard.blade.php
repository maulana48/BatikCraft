<div x-data="">
    @livewire(
        'dashboard.component.navbar',
        [
            'url' => $url,
            'admin' => $admin,
        ],
        key($url . now())
    )

    @livewire(
        'dashboard.component.content',
        [
            'url' => $url,
            'admin' => $admin,
        ],
        key($url . now())
    )

    @livewire('dashboard.layouts.footer')
</div>
