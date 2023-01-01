<div x-data="{
    batik: <?php echo e(json_encode($batik)); ?>,
    batik_keranjang: <?php echo e(json_encode($batik_keranjang)); ?>

}">
    
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
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('component.sidebar')->html();
} elseif ($_instance->childHasBeenRendered('l75288167-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l75288167-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l75288167-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l75288167-0');
} else {
    $response = \Livewire\Livewire::mount('component.sidebar');
    $html = $response->html();
    $_instance->logRenderedChild('l75288167-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

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
                                Stok : <span class="text-green-600">Tersedia</span>
                            </p>
                            <p x-show="(b.stok == 0)" class="text-gray-500 text-sm">
                                Stok : <span class="text-red-600">Maaf produk ini sudah habis</span>
                            </p>
                            <p class="text-gray-500 text-sm">
                                Jumlah : <span x-text="batik_keranjang[index].jumlah" class="text-gray-500"></span>
                            </p>
                        </div>
                        <div x-text="'Rp.'  + parseInt(b.harga)" class="text-[#6B4226] text-lg font-semibold"></div>
                        <button x-on:click="b.status = await $wire.checking(b.id)" x-text="(b.status == null) ? 'Pilih untuk Check-out' : b.status"
                            class="px-6 py-2 text-center text-sm text-white bg-[#6B4226] border border-[#120a1b] rounded hover:bg-transparent hover:text-[#6B4226] transition uppercase font-roboto font-medium"></button>
            
                        <div x-on:click="deleted = confirm('Pindahkan produk dari keranjang?') ? await $wire.delete(b.id) : 'test'; if(deleted) b = null;" class="text-gray-600 cursor-pointer hover:text-[#6B4226]">
                            <i class="fa-solid fa-trash"></i>
                        </div>
                    </div>
                </template>
            </template>
        </div>
        <!-- ./wishlist -->

    </div>
    <!-- ./wrapper -->
</div><?php /**PATH E:\New folder\Alkademi\Tugas-Akhir_Tall-Stack\Tugas-Akhir_Tall-Stack1\resources\views/livewire/layouts/cart.blade.php ENDPATH**/ ?>