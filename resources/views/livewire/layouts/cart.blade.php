<div x-data="{
    batik: {{ json_encode($batik) }}
}">
    {{-- Because she competes with no one, no one can compete with her. --}}
    <!-- breadcrumb -->
    <div class="container py-4 flex items-center gap-3">
        <a href="../index.html" class="text-[#6100c1] text-base">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Profile</p>
    </div>
    <!-- ./breadcrumb -->

    <!-- wrapper -->
    <div class="container grid grid-cols-12 items-start gap-6 pt-4 pb-16">
        @livewire('component.sidebar')

        <!-- wishlist -->
        <div class="col-span-9 space-y-4">
            <div class="flex justify-end">
                <button wire:click="checkOut" class="py-[10px] px-[20px] rounded-lg bg-blue-600 text-white">Check out</button>
            </div>
            <template x-for="(b, index) in batik">
                <template x-if="b">
                    <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                        <div class="w-28">
                            <img x-bind:src="b.media" src="" alt="product 6" class="w-full">
                        </div>
                        <div class="w-1/3">
                            <h2 x-text="b.nama" class="text-gray-800 text-xl font-medium uppercase"></h2>
                            <p x-show="(b.stok != 0)" class="text-gray-500 text-sm">
                                Stok: <span class="text-green-600">Tersedia</span>
                            </p>
                            <p x-show="(b.stok == 0)" class="text-gray-500 text-sm">
                                Stok: <span class="text-red-600">Produk habis</span>
                            </p>
                        </div>
                        <div x-text="'Rp.'  + b.harga" class="text-[#6100c1] text-lg font-semibold"></div>
                        <button x-on:click="b.status = await $wire.checked(b.id)" x-text="(b.status == null) ? 'Pilih untuk Check-out' : b.status"
                            class="px-6 py-2 text-center text-sm text-white bg-[#6100c1] border border-[#120a1b] rounded hover:bg-transparent hover:text-[#6100c1] transition uppercase font-roboto font-medium"></button>
            
                        <div x-on:click="deleted = confirm('Pindahkan produk dari keranjang?') ? await $wire.delete(b.id) : 'test'; b = null;" class="text-gray-600 cursor-pointer hover:text-[#6100c1]">
                            <i class="fa-solid fa-trash"></i>
                        </div>
                    </div>
                </template>
            </template>
        </div>
        <!-- ./wishlist -->

    </div>
    <!-- ./wrapper -->
</div>