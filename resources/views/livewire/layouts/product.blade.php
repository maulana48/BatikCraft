<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <!-- breadcrumb -->
    <div class="container py-4 flex items-center gap-3">
        <a href="../index.html" class="text-[#6100c1] text-base">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Product</p>
    </div>
    <!-- ./breadcrumb -->

    <!-- product-detail -->
    <div class="container grid grid-cols-2 gap-6">
        <div>
            @if ($batik->media)
                <img src="{{ asset($batik->media) }}" alt="product" class="w-full">
             @else
                <img src="{{ asset('ecommerce-template-tailwind-1-main/public') }}/../assets/images/products/product1.jpg" alt="product" class="w-full">
            @endif
            <div class="grid grid-cols-5 gap-4 mt-4">
                @foreach ($tipe_warna as $tw)
                    @if ($tw->media)
                        <img src="{{ asset($tw->media) }}" alt="product2" class="w-full cursor-pointer border">
                    @else
                        <img src="{{ asset('ecommerce-template-tailwind-1-main/public') }}../assets/images/products/product3.jpg"
                            alt="product2" class="w-full cursor-pointer border">
                    @endif
                @endforeach
            </div>
        </div>

        <div>
            <h2 class="text-3xl font-medium uppercase mb-2">{{ $batik->nama }}</h2>
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
                <div class="text-xs text-gray-500 ml-3">({{ $batik->reviewproduct ? count($batik->reviewproduct) : '0' }} Reviews)</div>
            </div>
            <div class="space-y-2">
                <p class="text-gray-800 font-semibold space-x-2">
                    <span>Stok barang : </span>
                    @if ($batik->stok)
                        <span class="text-green-600">{{ $batik->stok . ' Tersedia' }}</span>
                    @else
                        <span class="text-red-600">{{ 'Habis' }}</span>
                    @endif
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Merk: </span>
                    <span class="text-gray-600">{{ 'test' }}</span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Kategori: </span>
                    <span class="text-gray-600">{{ $batik->kategoriproduct->nama }}</span>
                </p>
            </div>
            <div class="flex items-baseline mb-1 space-x-2 font-roboto mt-4">
                <p class="text-xl text-[#6100c1] font-semibold">{{ $batik->harga }}</p>
                {{-- <p class="text-base text-gray-400 line-through">$55.00</p> --}}
            </div>

            <p class="mt-4 text-gray-600">{{ $batik->deskripsi }}</p>

            <div class="pt-4">
                <h3 class="text-sm text-gray-800 uppercase mb-1">Ukuran</h3>
                <div class="flex items-center gap-2">
                    <div class="size-selector">
                        <input type="radio" name="size" id="size-xs" class="hidden">
                        <label for="size-xs"
                            class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">XS</label>
                    </div>
                </div>
            </div>

            <div class="pt-4">
                <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Warna</h3>
                <div class="flex items-center gap-2">
                    <div class="color-selector">
                        <input type="radio" name="color" id="red" class="hidden">
                        <label for="red"
                            class="border border-gray-200 rounded-sm h-6 w-6  cursor-pointer shadow-sm block"
                            style="background-color: #fc3d57;"></label>
                    </div>

                </div>
            </div>

            <div class="mt-4">
                <h3 class="text-sm text-gray-800 uppercase mb-1">Jumlah</h3>
                <div class="flex border border-gray-300 text-gray-600 divide-x divide-gray-300 w-max">
                    <div class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">-</div>
                    <div class="h-8 w-8 text-base flex items-center justify-center">4</div>
                    <div class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">+</div>
                </div>
            </div>

            <div class="mt-6 flex gap-3 border-b border-gray-200 pb-5 pt-5">
                <a href="#"
                    class="bg-[#6100c1] border border-[#6100c1] text-white px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:bg-transparent hover:text-[#6100c1] transition">
                    <i class="fa-solid fa-bag-shopping"></i> Add to cart
                </a>
            </div>

        </div>
    </div>
    <!-- ./product-detail -->

    <!-- description -->
    <div class="container pb-16">
        <h3 class="border-b border-gray-200 font-roboto text-gray-800 pb-3 font-medium">Product details</h3>
        <div class="w-3/5 pt-6">
            <div class="text-gray-600">
                {{ $batik->deskripsi }}
            </div>

            <table class="table-auto border-collapse w-full text-left text-gray-600 text-sm mt-6">
                <tr>
                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Tipe Warna</th>
                    <th class="py-2 px-4 border border-gray-300 ">{{ $batik->tipe_warna }}</th>
                </tr>
                <tr>
                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Motif Batik</th>
                    <th class="py-2 px-4 border border-gray-300 ">{{ $batik->motif_batik }}</th>
                </tr>
                <tr>
                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Asal Kota</th>
                    <th class="py-2 px-4 border border-gray-300 ">{{ $batik->asal_kota }}</th>
                </tr>
            </table>
        </div>
    </div>
    <!-- ./description -->

    <!-- related product -->
    <div class="container pb-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Related products</h2>
        <div class="grid grid-cols-4 gap-6">
            @foreach ($kategoriBatik as $k)
                @livewire('component.card', ['product' => $k], key($k->id))
            @endforeach
        </div>
    </div>
    <!-- ./related product -->
</div>
