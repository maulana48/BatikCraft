<!-- navbar -->
<nav class="bg-gray-800" x-data="{ open: false }">
    <div class="container flex">
        <div class="px-8 py-4 bg-[#6B4226] flex items-center cursor-pointer relative group">
            <span class="text-white">
                <i class="fa-solid fa-bars"></i>
            </span>
            <span class="capitalize ml-2 text-white">All Categories</span>

            <!-- dropdown -->
            <div
                class="absolute w-full left-0 top-full bg-white shadow-md py-3 divide-y divide-gray-300 divide-dashed opacity-0 group-hover:opacity-100 transition duration-300 invisible group-hover:visible">
                @foreach ($category_list as $k)
                    <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <img src="{{ asset($k->name) }}" alt="sofa" class="w-5 h-5 object-contain">
                        <span class="ml-6 text-gray-600 text-sm">{{ $k->name }}</span>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="flex items-center justify-between flex-grow pl-12">
            <div class="flex items-center space-x-6 capitalize">
                <button x-on:click="$wire.home()" class="text-gray-200 hover:text-white transition">Home</button>
                <button x-on:click="$wire.shop()" class="text-gray-200 hover:text-white transition">Toko</button>
            </div>
            @if (!$user)
                <div class="flex items-center space-x-6 capitalize">
                    <button x-on:click="$wire.login" class=" text-gray-200 hover:text-white transition">Login</button>
                    <button x-on:click="$wire.registration"
                        class=" text-gray-200 hover:text-white transition">Register</button>
                </div>
            @else
                <div class="flex items-center space-x-2 capitalize">
                    <img src="{{ asset($user->profile_picture) }}" alt=""
                        class="rounded-full w-10 h-10 border border-gray-200 p-1 object-cover">
                    <button x-on:click="$wire.profile()" x-text="'{{ $user->nama }}'"
                        class=" text-gray-200 hover:text-white transition"></a>
                </div>
            @endif
        </div>
    </div>
</nav>
<!-- ./navbar -->
