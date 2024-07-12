<div
    class="w-full h-[550px] max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-between pb-6">
    <div class="group px-5 relative w-full h-[70%] overflow-hidden">
        <div class="absolute top-0 right-0 w-full h-full p-6">
            @if ($batik['main_media'])
                <img class="object-contain mx-auto h-full rounded-lg"
                    src="{{ asset($batik['main_media']['file'] . '.' . $batik['main_media']['extension']) }}"
                    alt="product image" />
            @else
                <img class="object-contain mx-auto h-full rounded-lg" src="{{ asset('/img/no_image.png') }}"
                    alt="product image" />
            @endif
        </div>

        <div
            class="absolute bottom-0 right-0 bg-black bg-opacity-40 flex items-center w-full h-full 
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
    <div class="px-5">
        <a href="#">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-gray-600">{{ $batik['name'] }}</h5>
        </a>
        <div class="flex items-center mt-2.5 mb-5">
            <div class="flex items-center space-x-1 rtl:space-x-reverse">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $batik['rating'])
                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                    @else
                        <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                    @endif
                @endfor
            </div>
            <span
                class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">({{ $batik['jumlah_review'] ? $batik['jumlah_review'] : 0 }})
                Review</span>
        </div>
        <div class="flex items-center justify-between">
            <span class="text-3xl font-bold text-gray-900 dark:text-gray-600">Rp.{{ (int) $batik['price'] }}</span>
            <button wire:click="productDetail({{ $batik['id'] }})"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Lihat
                Product</button>
        </div>
    </div>
</div>
