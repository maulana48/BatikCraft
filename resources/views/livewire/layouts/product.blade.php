<div x-data="{
                jumlah: 1,
                increment(){this.jumlah == {{ $batik['stok'] }} ? this.jumlah : this.jumlah++ },
                decrement(){this.jumlah == 0 ? this.jumlah : this.jumlah-- },
                btnK: ''
            }">
    {{-- Because she competes with no one, no one can compete with her. --}}
    <!-- breadcrumb -->
    <div class="container py-4 flex items-center gap-3">
        <a href="../index.html" class="text-[#6B4226] text-base">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Detail Batik</p>
    </div>
    <!-- ./breadcrumb -->

    <!-- product-detail -->
    <div class="container grid grid-cols-2 gap-6">
        <div>
            @if ($batik['media'])
                <img src="{{ asset($batik['media']) }}" alt="product" class="w-full max-h-[550px]">
             @else
                <img src="{{ asset('ecommerce-template-tailwind-1-main/public') }}/../assets/images/products/product1.jpg" alt="product" class="w-full">
            @endif
            <div class="grid grid-cols-5 gap-4 mt-4">
                @foreach ($tipe_warna as $tw)
                    @if ($tw['media'])
                        <img src="{{ asset($tw['media']) }}" alt="product2" class="w-full cursor-pointer border">
                    @else
                        <img src="{{ asset('ecommerce-template-tailwind-1-main/public') }}../assets/images/products/product3.jpg"
                            alt="product2" class="w-full cursor-pointer border">
                    @endif
                @endforeach
            </div>
        </div>

        <div>
            <h2 class="text-3xl font-medium uppercase mb-2">{{ $batik['nama'] }}</h2>
            <div class="flex items-center mb-4">
                <div class="flex gap-1 text-sm text-yellow-400">
                    @for ($i = 0; $i < 5; $i++)
                        @if ($i < $rating)
                            <span><i class="fa-solid fa-star"></i></span>
                        @else
                            <span><i class="fa-solid fa-star text-gray-500"></i></span>
                        @endif
                    @endfor
                </div>
                <div class="text-xs text-gray-500 ml-3">({{ $batik['reviewproduct'] ? count($batik['reviewproduct']) : '0' }} Review)</div>
            </div>
            <div class="space-y-2">
                <p class="text-gray-800 font-semibold space-x-2">
                    <span>Stok barang : </span>
                    @if ($batik['stok'])
                        <span class="text-green-600">{{ $batik['stok'] . ' Tersedia' }}</span>
                    @else
                        <span class="text-red-600">{{ 'Habis' }}</span>
                    @endif
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Merk: </span>
                    <span class="text-gray-600">{{ $batik['merk'] }}</span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Kategori: </span>
                    <span class="text-gray-600">{{ $batik['kategoriproduct']['nama'] }}</span>
                </p>
            </div>
            <div class="flex items-baseline mb-1 space-x-2 font-roboto mt-4">
                <p class="text-xl text-[#6B4226] font-semibold">Rp.{{ (int)$batik['harga'] }}</p>
                {{-- <p class="text-base text-gray-400 line-through">$55.00</p> --}}
            </div>

            <div class="mt-4">
                <h3 class="text-sm text-gray-800 uppercase mb-1">Jumlah</h3>
                <div class="flex border border-gray-300 text-gray-600 divide-x divide-gray-300 w-max">
                    <button x-on:click="decrement()" class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">-</button>
                    <div x-text="jumlah" class="h-8 w-8 text-base flex items-center justify-center"></div>
                    <button x-on:click="increment()" class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">+</button>
                </div>
            </div>

            <div class="mt-6 flex gap-3 border-b border-gray-200 pb-5 pt-5">
                <button x-on:click="btnK = await $wire.addCart(jumlah)"
                    class="bg-[#6B4226] border border-[#6B4226] text-white px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:bg-transparent hover:text-[#6B4226] transition">
                    <i x-bind:class="btnK == '' ? 'fa-solid fa-bag-shopping' : 'fa-solid fa-circle-check'"></i><p x-text="(btnK == '') ? 'Tambah ke Keranjang' : btnK"></p>
                </button>
            </div>

        </div>
    </div>
    <!-- ./product-detail -->

    <!-- description -->
    <div class="container pb-16">
        <h3 class="border-b border-gray-200 font-roboto text-gray-800 pb-3 font-medium">Product details</h3>
        <div class="w-3/5 pt-6">
            <div class="text-gray-600">
                {{ $batik['deskripsi'] }}
            </div>

            <table class="table-auto border-collapse w-full text-left text-gray-600 text-sm mt-6">
                <tr>
                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Tipe Warna</th>
                    <th class="py-2 px-4 border border-gray-300 ">{{ $batik['tipe_warna'] }}</th>
                </tr>
                <tr>
                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Motif Batik</th>
                    <th class="py-2 px-4 border border-gray-300 ">{{ $batik['motif_batik'] }}</th>
                </tr>
                <tr>
                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Asal Kota</th>
                    <th class="py-2 px-4 border border-gray-300 ">{{ $batik['asal_kota'] }}</th>
                </tr>
            </table>
        </div>
    </div>
    <!-- ./description -->

    <!-- related product -->
    <div class="container pb-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Kategori Terkait</h2>
        <div class="grid grid-cols-4 gap-6">
            @foreach ($kategoriBatik as $k)
                @livewire('component.card', ['product' => $k], key($k['id']))
            @endforeach
        </div>
    </div>
    <!-- ./related product -->
</div>
