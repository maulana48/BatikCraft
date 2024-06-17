<div>
    {{-- The Master doesn't talk, he acts. --}}
    <!-- breadcrumb -->
    <div class="container py-4 flex items-center gap-3">
        <a href="../index.html" class="text-[#6B4226] text-base">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Shop</p>
    </div>
    <!-- ./breadcrumb -->

    <!-- shop wrapper -->
    <div class="container grid grid-cols-4 gap-6 pt-4 pb-16 items-start" x-data="category_list = [];
    merch = [];
    colorF = [];
    min = null;
    max = null;">
        <!-- sidebar -->
        <div class="col-span-1 bg-white px-4 pb-6 shadow rounded overflow-hidden">
            <div class="divide-y divide-gray-200 space-y-5">
                <div>
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Kategori</h3>
                    <div class="space-y-2">
                        @if (isset($category_list))
                            @if (count($category_list) == 0)
                                <div class="flex items-center">
                                    <p for="cat-1" class="text-gray-600 ml-3 cusror-pointer">Kategori kosong</p>
                                </div>
                            @endif
                            @foreach ($category_list as $item)
                                <div class="flex items-center">
                                    <input
                                        @click="const index = category_list.indexOf({{ $item->id }}); category_list.includes({{ $item->id }}) ? category_list.splice(index, 1) : category_list.push({{ $item->id }}) ; $wire.filtering(category_list, merch, min, max, colorF)"
                                        type="checkbox" name="cat-{{ $item->id }}" id="cat-{{ $item->id }}"
                                        class="text-[#6B4226] focus:ring-0 rounded-sm cursor-pointer">
                                    <label for="cat-{{ $item->id }}"
                                        class="text-gray-600 ml-3 cusror-pointer">{{ $item->name }}</label>
                                    <div class="ml-auto text-gray-600 text-sm">({{ count($item->products) }})</div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="pt-4">
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Merk</h3>
                    <div class="space-y-2">
                        @if (isset($merch_list))
                            @if (count($merch_list) == 0)
                                <div class="flex items-center">
                                    <p for="cat-1" class="text-gray-600 ml-3 cusror-pointer">Merk kosong</p>
                                </div>
                            @endif
                            @foreach ($merch_list as $keys => $item)
                                <div class="flex items-center">
                                    <input
                                        @click="const index1 = merch.indexOf('{{ $keys }}') ; merch.includes('{{ $keys }}') ? merch.splice(index1, 1) : merch.push('{{ $keys }}') ;   $wire.filtering(category_list, merch, min, max, colorF)"
                                        type="checkbox" name="brand-{{ $keys }}"
                                        id="brand-{{ $keys }}"
                                        class="text-[#6B4226] focus:ring-0 rounded-sm cursor-pointer">
                                    <label for="brand-{{ $keys }}"
                                        class="text-gray-600 ml-3 cusror-pointer">{{ $item->merch }}</label>
                                    <div class="ml-auto text-gray-600 text-sm">({{ $item->total }})</div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="pt-4">
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Harga</h3>
                    <div class="mt-4 flex items-center">
                        <input x-model="min" x-on:keyUp="$wire.filtering(category_list, merch, min, max, colorF)"
                            type="text" name="min" id="min"
                            class="w-full border-gray-300 focus:border-[#6B4226] rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm"
                            placeholder="min">
                        <span class="mx-3 text-gray-500">-</span>
                        <input x-model="max" x-on:keyUp="$wire.filtering(category_list, merch, min, max, colorF)"
                            type="text" name="max" id="max"
                            class="w-full border-gray-300 focus:border-[#6B4226] rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm"
                            placeholder="max">
                    </div>
                </div>

                <div class="pt-4" x-data="{
                    color: {{ $color }}
                }">
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Warna</h3>
                    <template x-for="(w, index) in color">
                        <div class="flex items-center">
                            <input
                                x-on:click="const index2 = colorF.indexOf(index) ; colorF.includes(index) ? colorF.splice(index2, 1) : colorF.push(index) ;   $wire.filtering(category_list, merch, min, max, colorF)"
                                type="checkbox" :name="'brand-' + index" :id="'brand-' + index"
                                class="text-[#6B4226] focus:ring-0 rounded-sm cursor-pointer">
                            <label x-text="w.color_type" :for="'brand-' + index"
                                class="text-gray-600 ml-3 cusror-pointer"></label>
                            <div x-text="'(' + w.total + ')'" class="ml-auto text-gray-600 text-sm"></div>
                        </div>
                    </template>
                </div>

            </div>
        </div>
        <!-- ./sidebar -->

        <!-- products -->
        <div class="col-span-3">
            <div class="flex items-center mb-4">
                <select wire:model="sort" name="sort" id="sort"
                    class="w-44 text-sm text-gray-600 py-3 px-4 border-gray-300 shadow-sm rounded focus:ring-[#6B4226] focus:border-[#6B4226]">
                    <option value="default">Urutan default</option>
                    <option value="price-low-to-high">Dari harga terendah</option>
                    <option value="price-high-to-low">Dari harga tertinggi</option>
                    <option value="latest">Terbaru</option>
                </select>

                <div class="flex gap-2 ml-auto">
                    <div
                        class="border border-[#6B4226] w-10 h-9 flex items-center justify-center text-white bg-[#6B4226] rounded cursor-pointer">
                        <i class="fa-solid fa-grip-vertical"></i>
                    </div>
                    <div
                        class="border border-gray-300 w-10 h-9 flex items-center justify-center text-gray-600 rounded cursor-pointer">
                        <i class="fa-solid fa-list"></i>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-6">
                @if (count($batik_list) == 0)
                    <div class="flex items-center">
                        <p for="cat-1" class="text-gray-600 ml-3 cusror-pointer">Tidak ada produk yang tersedia</p>
                    </div>
                @endif
                @foreach ($batik_list as $t)
                    @livewire('component.card', ['product' => $t], key($t->id))
                @endforeach
                {{-- <template x-for="(b, index) in batik">
                    <livewire:component.card :product="b">
                </template> --}}
            </div>
            <div class=" mt-6 flex justify-end gap-4">
                {{ $batik_list->links() }}
            </div>
        </div>
        <!-- ./products -->
    </div>
    <!-- ./shop wrapper -->
</div>
