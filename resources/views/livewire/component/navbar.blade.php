<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <!-- header -->
    <header class="py-4 shadow-sm bg-white">
        <div class="container flex items-center justify-between">
            <a href="index.html">
                <img src="{{ asset('ecommerce-template-tailwind-1-main/public') }}/assets/images/logo.svg" alt="Logo" class="w-32">
            </a>
    
            <div class="w-full max-w-xl relative flex">
                <span class="absolute left-4 top-3 text-lg text-gray-400">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input type="text" name="search" id="search"
                    class="w-full border border-[#6100c1] border-r-0 pl-12 py-3 pr-3 rounded-l-md focus:outline-none"
                    placeholder="search">
                <button
                    class="bg-[#6100c1] border border-[#6100c1] text-white px-8 rounded-r-md hover:bg-transparent hover:text-[#6100c1] transition">Search</button>
            </div>
    
            <div class="flex items-center space-x-4">
                <a href="#" class="text-center text-gray-700 hover:text-[#6100c1] transition relative">
                    <div class="text-2xl">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <div class="text-xs leading-3">Wishlist</div>
                    <div
                        class="absolute right-0 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-[#6100c1] text-white text-xs">
                        8</div>
                </a>
                <a href="#" class="text-center text-gray-700 hover:text-[#6100c1] transition relative">
                    <div class="text-2xl">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>
                    <div class="text-xs leading-3">Cart</div>
                    <div
                        class="absolute -right-3 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-[#6100c1] text-white text-xs">
                        2</div>
                </a>
                <a href="#" class="text-center text-gray-700 hover:text-[#6100c1] transition relative">
                    <div class="text-2xl">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <div class="text-xs leading-3">Account</div>
                </a>
            </div>
        </div>
    </header>
    <!-- ./header -->
    <!-- navbar -->
    <nav class="bg-gray-800">
        <div class="container flex">
            <div class="px-8 py-4 bg-[#6100c1] flex items-center cursor-pointer relative group">
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
                    <a href="../index.html" class="text-gray-200 hover:text-white transition">Home</a>
                    <a href="pages/shop.html" class="text-gray-200 hover:text-white transition">Shop</a>
                    <a href="#" class="text-gray-200 hover:text-white transition">About us</a>
                    <a href="#" class="text-gray-200 hover:text-white transition">Contact us</a>
                </div>
                <div class="flex items-center space-x-6 capitalize">
                    <button wire:click="loginNav" href="" class=" text-gray-200 hover:text-white transition">Login</a>
                        <button wire:click="registrationNav" href=""
                            class=" text-gray-200 hover:text-white transition">Register</button>
                </div>
            </div>
        </div>
    </nav>
    <!-- ./navbar -->
</div>
