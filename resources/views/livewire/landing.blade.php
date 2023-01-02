<div x-data="user = {{ $user }}">
    <header class="py-4 shadow-sm bg-white">
        <div class="container flex items-center justify-between">
            <a href="index.html">
                <img src="{{ asset('ecommerce-template-tailwind-1-main/public') }}/assets/images/logo.svg" alt="Logo"
                    class="w-32">
            </a>
    
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
                <button wire:click="transaksi" class="text-center text-gray-700 hover:text-[#6B4226] transition relative">
                    <div class="text-2xl">
                        <i class="fa-solid fa-rectangle-list"></i>
                    </div>
                    <div class="text-xs leading-3">Transaksi</div>
                    <template x-if="$wire.transaksi != null">
                        <div x-text="$wire.transaksi" class="absolute -right-3 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-[#6B4226] text-white text-xs"></div>
                    </template>
                </button>
                <button wire:click="cart" class="text-center text-gray-700 hover:text-[#6B4226] transition relative">
                    <div class="text-2xl">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>
                    <div class="text-xs leading-3">Keranjang</div>
                    <template x-if="$wire.cartProduct != null">
                        <div x-text="$wire.cartProduct" class="absolute -right-3 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-[#6B4226] text-white text-xs"></div>
                    </template>
                </button>
                <button wire:click="profile" class="text-center text-gray-700 hover:text-[#6B4226] transition relative">
                    <div class="text-2xl">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <div class="text-xs leading-3">Akun</div>
                </button>
            </div>
        </div>
    </header>
    <!-- ./header -->
    <!-- navbar -->
    <nav class="bg-gray-800">
        <div class="container flex">
            <div class="px-8 py-4 bg-[#6B4226] flex items-center cursor-pointer relative group">
                <span class="text-white">
                    <i class="fa-solid fa-bars"></i>
                </span>
                <span class="capitalize ml-2 text-white">All Categories</span>
    
                <!-- dropdown -->
                <div
                    class="absolute w-full left-0 top-full bg-white shadow-md py-3 divide-y divide-gray-300 divide-dashed opacity-0 group-hover:opacity-100 transition duration-300 invisible group-hover:visible">
                    @foreach ($kategori as $k)
                    <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <img src="{{ asset($k->media) }}" alt="sofa" class="w-5 h-5 object-contain">
                        <span class="ml-6 text-gray-600 text-sm">{{ $k->nama }}</span>
                    </a>
                    @endforeach
                </div>
            </div>
    
            <div class="flex items-center justify-between flex-grow pl-12">
                <div class="flex items-center space-x-6 capitalize">
                    <button x-on:click="$wire.home()" class="text-gray-200 hover:text-white transition">Home</button>
                    <button x-on:click="$wire.shop()" class="text-gray-200 hover:text-white transition">Toko</button>
                </div>
                @if(!$user)
                    <div class="flex items-center space-x-6 capitalize">
                        <button x-on:click="$wire.login" class=" text-gray-200 hover:text-white transition">Login</button>
                        <button x-on:click="$wire.registration" class=" text-gray-200 hover:text-white transition">Register</button>
                    </div>
                @else
                    <div class="flex items-center space-x-2 capitalize">
                        <img src="{{ asset($user->media) }}" alt="" class="rounded-full w-10 h-10 border border-gray-200 p-1 object-cover">
                        <button x-on:click="$wire.profile()" x-text="user.nama" class=" text-gray-200 hover:text-white transition"></a>
                    </div>
                @endif
            </div>
        </div>
    </nav>
    <!-- ./navbar -->
    <div>
        @livewire('layouts.' . $url, [$user, $productId], key($url . now()))
    </div>
</div>
