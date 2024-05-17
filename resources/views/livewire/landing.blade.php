<div x-data="{
    user: $wire.user
}">
    <div>
        @livewire('layouts.' . $url, [$user, $productId], key($url . now()))
    </div>
</div>
