<div class="container overflow-auto">
    @livewire(
        'component.header',
        [
            'user' => $user,
        ],
        key($url . now())
    )
    @livewire(
        'component.navbar',
        [
            'user' => $user,
        ],
        key($url . now())
    )

    @livewire(
        'component.content',
        [
            'user' => $user,
            'url' => $url,
        ],
        key($url . now())
    )
    @livewire('component.footer')
</div>
