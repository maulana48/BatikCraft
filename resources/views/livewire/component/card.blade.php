<div class="bg-white shadow rounded overflow-hidden group">
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="relative">
        @if ($batik['media'])
            <img src="{{ asset($batik['media']) }}" alt="product 1" class="w-full">
        @else
            <img src="{{ asset('ecommerce-template-tailwind-1-main/public') }}/assets/images/products/product1.jpg" alt="product 1" class="w-full">
        @endif
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                        justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
            <button wire:click="productDetail({{ $batik['id'] }})"
                class="text-white text-lg w-9 h-8 rounded-full bg-[#6B4226] flex items-center justify-center hover:bg-gray-800 transition"
                title="view product">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            <button
                class="text-white text-lg w-9 h-8 rounded-full bg-[#6B4226] flex items-center justify-center hover:bg-gray-800 transition"
                title="add to wishlist">
                <i class="fa-solid fa-heart"></i>
            </button>
        </div>
    </div>
    <div class="pt-4 pb-3 px-4">
        <a href="#">
            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-[#6B4226] transition">{{ $batik['nama'] }}
            </h4>
        </a>
        <div class="flex items-baseline mb-1 space-x-2">
            <p class="text-xl text-[#6B4226] font-semibold">Rp. {{ $batik['harga'] }}</p>
            {{-- <p class="text-sm text-gray-400 line-through">{{ $batik['']harga }}</p> --}}
        </div>
        <div class="flex items-center">
            <div class="flex gap-1 text-sm text-yellow-400">
                @for ($i = 0; $i < 5; $i++)
                    @if ($i < $batik['rating'])
                        <span><i class="fa-solid fa-star"></i></span>
                    @else
                        <span><i class="fa-solid fa-star text-gray-500"></i></span>
                    @endif
                @endfor
            </div>
            <div class="text-xs text-gray-500 ml-3">({{ $batik['jumlah_review'] }})</div>
        </div>
    </div>
    <button wire:click="productDetail({{ $batik['id'] }})"
        class="block w-full py-1 text-center text-white bg-[#6B4226] border border-[#6B4226] rounded-b hover:bg-transparent hover:text-[#6B4226] transition">Lihat Product</button>
</div>