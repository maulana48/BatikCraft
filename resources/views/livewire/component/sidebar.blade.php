<div class="col-span-3">
    {{-- Care about people's approval and you will be their prisoner. --}}
    <!-- sidebar -->
        <div class="px-4 py-3 shadow flex items-center gap-4">
            <div class="flex-shrink-0">
                <img x-bind:src="'/' + '{{ $user->media }}'" src="" alt="profile"
                    class="rounded-full w-14 h-14 border border-gray-200 p-1 object-cover">
            </div>
            <div class="flex-grow">
                <p class="text-gray-600">Selamat datang,</p>
                <h4 x-text="'{{ $user->nama }}'" class="text-gray-800 font-medium"></h4>
            </div>
        </div>
    
        <div class="mt-6 bg-white shadow rounded p-4 divide-y divide-gray-200 space-y-4 text-gray-600">
            <div class="space-y-1 pl-8">
                <a x-on:click="$wire.profile()" style="cursor: pointer;" class="relative hover:text-[#6B4226] block font-medium capitalize transition">
                    <span class="absolute -left-8 top-0 text-base">
                        <i class="fa-solid fa-user"></i>
                    </span>
                    Management Akun
                </a>
            </div>
    
            <div class="space-y-1 pl-8 pt-4">
                <a href="#" class="relative hover:text-[#6B4226] block font-medium capitalize transition">
                    <span class="absolute -left-8 top-0 text-base">
                        <i class="fa-solid fa-box-archive"></i>
                    </span>
                    Riwayat Pemesanan
                </a>
                <a x-on:click="$wire.pembayaran({{ $user->id }})" style="cursor: pointer;" class="relative hover:text-[#6B4226] block capitalize transition">
                    Pembayaran
                </a>
                <a href="#" class="relative hover:text-[#6B4226] block capitalize transition">
                    Review ku
                </a>
            </div>
    
            <div class="space-y-1 pl-8 pt-4">
                <a href="#" class="relative text-[#6B4226] block font-medium capitalize transition">
                    <span class="absolute -left-8 top-0 text-base">
                        <i class="fa-regular fa-heart"></i>
                    </span>
                    My wishlist
                </a>
            </div>
    
            <div class="space-y-1 pl-8 pt-4">
                <button wire:click="logout" class="relative hover:text-[#6B4226] block font-medium capitalize transition">
                    <span class="absolute -left-8 top-0 text-base">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </span>
                    Logout
                </button>
            </div>
    
        </div>
</div>
<!-- ./sidebar -->
