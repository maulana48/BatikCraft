<!-- header -->
<header class="py-4 shadow-sm bg-white" x-data="{
    transaction: {{ $transaction }},
    cartProducts: {{ $cartProducts }},
}">
    <div class="container flex items-center justify-between px-4">
        <a href="index.html">
            <img src="/img/logo3.png" alt="Logo" class="w-24">
        </a>

        <div class="w-full max-w-xl relative flex">
            <span class="absolute left-4 top-3 text-lg text-gray-400">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>
            <input type="text" name="search" id="search"
                class="w-full border border-[#6B4226] border-r-0 pl-12 py-3 pr-3 rounded-l-md focus:outline-none"
                placeholder="search">
            <button
                class="bg-[#6B4226] border border-[#6B4226] text-white px-8 rounded-r-md hover:bg-transparent hover:text-[#6B4226] transition">Search</button>
        </div>

        <div class="flex items-center space-x-4">
            {{-- <a href="#" class="text-center text-gray-700 hover:text-[#6B4226] transition relative">
                    <div class="text-2xl">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <div class="text-xs leading-3">Wishlist</div>
                    <div
                        class="absolute right-0 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-[#6B4226] text-white text-xs">
                        8</div>
                </a> --}}
            <button wire:click="open_transaction"
                class="text-center text-gray-700 hover:text-[#6B4226] transition relative">
                <div class="text-2xl">
                    <i class="fa-solid fa-rectangle-list"></i>
                </div>
                <div class="text-xs leading-3">Transaksi</div>
                <template x-if="transaction">
                    <div x-text="transaction"
                        class="absolute -right-3 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-[#6B4226] text-white text-xs">
                    </div>
                </template>
            </button>
            <button wire:click="open_cart" class="text-center text-gray-700 hover:text-[#6B4226] transition relative">
                <div class="text-2xl">
                    <i class="fa-solid fa-bag-shopping"></i>
                </div>
                <div class="text-xs leading-3">Keranjang</div>
                <template x-if="cartProducts">
                    <div x-text="cartProducts"
                        class="absolute -right-3 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-[#6B4226] text-white text-xs">
                    </div>
                </template>
            </button>
            <button wire:click="open_profile"
                class="text-center text-gray-700 hover:text-[#6B4226] transition relative">
                <div class="text-2xl">
                    <i class="fa-regular fa-user"></i>
                </div>
                <div class="text-xs leading-3">Akun</div>
            </button>
        </div>
    </div>
</header>
<!-- ./header -->
