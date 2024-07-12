<!-- breadcrumb -->
<div class="container py-4 flex items-center gap-3">
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <a wire:click="home" class="text-[#6B4226] text-base cursor-pointer">
        <i class="fa-solid fa-house"></i>
    </a>

    @foreach ($breadcumb as $item)
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">{{ $item }}</p>
    @endforeach
</div>
<!-- ./breadcrumb -->
