<div class="bg-white shadow rounded overflow-hidden group">
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="relative">
        <img src="{{ asset('ecommerce-template-tailwind-1-main/public') }}/assets/images/products/product1.jpg"
            alt="product 1" class="w-full">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                        justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
            <a href="#"
                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                title="view product">
                <i class="fa-solid fa-magnifying-glass"></i>
            </a>
            <a href="#"
                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                title="add to wishlist">
                <i class="fa-solid fa-heart"></i>
            </a>
        </div>
    </div>
    <div class="pt-4 pb-3 px-4">
        <a href="#">
            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">{{ $t->nama }}
            </h4>
        </a>
        <div class="flex items-baseline mb-1 space-x-2">
            <p class="text-xl text-primary font-semibold">Rp. {{ $t->harga }}</p>
            {{-- <p class="text-sm text-gray-400 line-through">{{ $t->harga }}</p> --}}
        </div>
        <div class="flex items-center">
            <div class="flex gap-1 text-sm text-yellow-400">
                @for ($i = 0; $i < $t->rating; $i++)
                    <span><i class="fa-solid fa-star"></i></span>
                    @endfor
            </div>
            <div class="text-xs text-gray-500 ml-3">({{ $t->jumlah_review }})</div>
        </div>
    </div>
    <a href="#"
        class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
        to cart</a>
</div>