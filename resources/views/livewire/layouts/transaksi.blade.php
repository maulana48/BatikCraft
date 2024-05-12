<div x-data="{
    pemesanan: {{ json_encode($pemesanan) }}   
}">
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <!-- breadcrumb -->
    <div class="container py-4 flex items-center gap-3">
        <a href="../index.html" class="text-[#6B4226] text-base">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Transaksi</p>
    </div>
    <!-- ./breadcrumb -->

    <!-- wrapper -->
    <div class="container grid grid-cols-12 items-start gap-6 pt-4 pb-16">
        @livewire('component.sidebar', [$user])

        <!-- wishlist -->
        <div class="col-span-9 space-y-4">
            <template x-for="(p, index) in pemesanan">
                <template x-if="p">
                    <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                        <div class="w-28">
                            <p x-text="'Pemesanan ' + (index + 1)"></p>
                        </div>
                        <div class="w-1/3">
                            <h2 x-text="new Date(p.created_at).toLocaleString()" class="text-gray-800 text-xl font-medium uppercase"></h2>
                            <p class="text-gray-500 text-sm">
                                Total Produk : <span x-text="p.productpesanan.length" class="text-gray-500"></span>
                            </p>
                            <p x-show="(p.status == 3)" class="text-gray-500 text-sm">
                                Status : <span class="text-green-600">Selesai</span>
                            </p>
                            <p x-show="(p.status != 3)" class="text-gray-500 text-sm">
                                Status : <span class="text-red-600">Menunggu pembayaran</span>
                            </p>
                        </div>
                        <div x-text="'Rp.'  + parseInt(p.total_harga)" class="text-[#6B4226] text-lg font-semibold"></div>
                        <button x-on:click="$wire.detailP(p.id)"
                            class="px-6 py-2 text-center text-sm text-white bg-[#6B4226] border border-[#120a1b] rounded hover:bg-transparent hover:text-[#6B4226] transition uppercase font-roboto font-medium">Lihat detail</button>
                        </div>
                    </div>
                </template>
            </template>
        </div>
        <!-- ./wishlist -->

    </div>
    <!-- ./wrapper -->
</div>