<div x-data="{
    product_pesanan: {{ json_encode($product_pesanan) }},
    total: 0,
    bayared: false,
    count(harga, jumlah) {
        this.total += harga * jumlah;
    },
}">
    {{-- Success is as dangerous as failure. --}}
    <!-- breadcrumb -->
    <div class="container py-4 flex items-center gap-3">
        <a href="../index.html" class="text-[#6B4226] text-base">
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
        @livewire('component.sidebar', [$user])
        <!-- info -->
        <div class="col-span-9 shadow rounded px-6 pt-5 pb-7">
            <div class="col-span-4 border border-gray-200 p-4 rounded">
                <h4 class="text-gray-800 text-lg mb-4 font-medium uppercase">Rincian Pemesanan</h4>
                <div class="space-y-2 mb-4">
                    <template x-for="(p, index) in product_pesanan">
                        <div class="flex justify-between">
                            <div>
                                <h5 x-text="p.productbatik.nama" class="text-gray-800 font-medium"></h5>
                                <p x-text="'Merk : ' + p.productbatik.merk" class="text-sm text-gray-600"></p>
                            </div>
                            <p x-text="'x' + p.jumlah" class="text-gray-600"></p>
                            <p x-text="parseInt(p.productbatik.harga)" class="text-gray-800 font-medium"></p>
                            <span x-init="count(p.productbatik.harga, p.jumlah)" class="hidden"></span>
                        </div>
                    </template>
                </div>


                <div class="flex justify-between border-b border-gray-200 mt-1 text-gray-800 font-medium py-3 uppercas">
                    <p>total harga</p>
                    <p x-text="'Rp. ' + total"></p>
                </div>

                <div class="flex justify-between border-b border-gray-200 mt-1 text-gray-800 font-medium py-3 uppercas">
                    <p>biaya pengiriman</p>
                    <p>gratis</p>
                </div>

                <div class="flex justify-between text-gray-800 font-medium py-3 uppercas">
                    <p class="font-semibold">Total</p>
                    <p x-text="'Rp. ' + total"></p>
                </div>

                {{-- <div class="flex items-center mb-4 mt-2">
                <input type="checkbox" name="aggrement" id="aggrement"
                    class="text-[#6B4226] focus:ring-0 rounded-sm cursor-pointer w-3 h-3">
                <label for="aggrement" class="text-gray-600 ml-3 cursor-pointer text-sm">test<a href="#"
                        class="text-[#6B4226]">test</a></label>
            </div> --}}

            </div>

            <div class="mt-4">
                <button x-on:click="bayared = await $wire.bayar(true)"
                    class="w-full py-3 px-4 text-center text-white bg-[#6B4226] border border-[#6B4226] rounded-md hover:bg-transparent hover:text-[#6B4226] transition font-medium flex justify-center items-baseline gap-3">
                    <i x-bind:class="bayared ? 'fa-solid fa-circle-check' : ''"></i>
                    <p x-text="bayared ? bayared : 'Lakukan Pembayaran'"></p>
                </button>
            </div>
        </div>
        <!-- ./info -->

    </div>
    <!-- ./wrapper -->
</div>
