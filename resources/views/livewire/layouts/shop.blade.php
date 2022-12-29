<div>
    {{-- The Master doesn't talk, he acts. --}}
    <!-- breadcrumb -->
    <div class="container py-4 flex items-center gap-3">
        <a href="../index.html" class="text-[#6100c1] text-base">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Shop</p>
    </div>
    <!-- ./breadcrumb -->
    
    <!-- shop wrapper -->
    <div class="container grid grid-cols-4 gap-6 pt-4 pb-16 items-start">
        <!-- sidebar -->
        <div class="col-span-1 bg-white px-4 pb-6 shadow rounded overflow-hidden">
            <div class="divide-y divide-gray-200 space-y-5">
                <div>
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Categories</h3>
                    <div class="space-y-2">
                        @foreach ($kategori as $k)
                            <div class="flex items-center">
                                <input wire:click="filters" wire:model="filter.{{ $k->id }}" value="{{ $k->id }}" type="checkbox" name="cat-1" id="cat-{{ $k->id }}"
                                    class="text-[#6100c1] focus:ring-0 rounded-sm cursor-pointer">
                                <label for="cat-1" class="text-gray-600 ml-3 cusror-pointer">{{ $k->nama }}</label>
                                <div class="ml-auto text-gray-600 text-sm">({{ count($k->productbatik) }})</div>
                            </div>
                        @endforeach
                    </div>
                </div>
    
                <div class="pt-4">
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Brands</h3>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <input type="checkbox" name="brand-1" id="brand-1"
                                class="text-[#6100c1] focus:ring-0 rounded-sm cursor-pointer">
                            <label for="brand-1" class="text-gray-600 ml-3 cusror-pointer">Cooking Color</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                    </div>
                </div>
    
                <div class="pt-4">
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Price</h3>
                    <div class="mt-4 flex items-center">
                        <input type="text" name="min" id="min"
                            class="w-full border-gray-300 focus:border-[#6100c1] rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm"
                            placeholder="min">
                        <span class="mx-3 text-gray-500">-</span>
                        <input type="text" name="max" id="max"
                            class="w-full border-gray-300 focus:border-[#6100c1] rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm"
                            placeholder="max">
                    </div>
                </div>
    
                <div class="pt-4">
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">size</h3>
                    <div class="flex items-center gap-2">
                        <div class="size-selector">
                            <input type="radio" name="size" id="size-xs" class="hidden">
                            <label for="size-xs"
                                class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">XS</label>
                        </div>
                        <div class="size-selector">
                            <input type="radio" name="size" id="size-sm" class="hidden">
                            <label for="size-sm"
                                class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">S</label>
                        </div>
                        <div class="size-selector">
                            <input type="radio" name="size" id="size-m" class="hidden">
                            <label for="size-m"
                                class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">M</label>
                        </div>
                        <div class="size-selector">
                            <input type="radio" name="size" id="size-l" class="hidden">
                            <label for="size-l"
                                class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">L</label>
                        </div>
                        <div class="size-selector">
                            <input type="radio" name="size" id="size-xl" class="hidden">
                            <label for="size-xl"
                                class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">XL</label>
                        </div>
                    </div>
                </div>
    
                <div class="pt-4">
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Color</h3>
                    <div class="flex items-center gap-2">
                        <div class="color-selector">
                            <input type="radio" name="color" id="red" class="hidden">
                            <label for="red"
                                class="border border-gray-200 rounded-sm h-6 w-6  cursor-pointer shadow-sm block"
                                style="background-color: #fc3d57;"></label>
                        </div>
    
                    </div>
                </div>
    
            </div>
        </div>
        <!-- ./sidebar -->
    
        <!-- products -->
        <div class="col-span-3">
            <div class="flex items-center mb-4">
                <select wire:model="sort" name="sort" id="sort"
                    class="w-44 text-sm text-gray-600 py-3 px-4 border-gray-300 shadow-sm rounded focus:ring-[#6100c1] focus:border-[#6100c1]">
                    <option value="default">Default sorting</option>
                    <option value="price-low-to-high">Price low to high</option>
                    <option value="price-high-to-low">Price high to low</option>
                    <option value="latest">Latest product</option>
                </select>
    
                <div class="flex gap-2 ml-auto">
                    <div
                        class="border border-[#6100c1] w-10 h-9 flex items-center justify-center text-white bg-[#6100c1] rounded cursor-pointer">
                        <i class="fa-solid fa-grip-vertical"></i>
                    </div>
                    <div
                        class="border border-gray-300 w-10 h-9 flex items-center justify-center text-gray-600 rounded cursor-pointer">
                        <i class="fa-solid fa-list"></i>
                    </div>
                </div>
            </div>
    
            <div class="grid grid-cols-3 gap-6">
                @foreach ($batik as $t)
                @livewire('component.card', ['product' => $t], key($t->id))
                @endforeach
            </div>
        </div>
        <!-- ./products -->
    </div>
    <!-- ./shop wrapper -->
</div>
