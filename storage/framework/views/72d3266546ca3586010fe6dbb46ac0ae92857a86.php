<div class="bg-white shadow rounded overflow-hidden group">
    
    <div class="relative">
        <?php if($productCard->media): ?>
            <img src="<?php echo e(asset($productCard->media)); ?>" alt="product 1" class="w-full">
        <?php else: ?>
            <img src="<?php echo e(asset('ecommerce-template-tailwind-1-main/public')); ?>/assets/images/products/product1.jpg" alt="product 1" class="w-full">
        <?php endif; ?>
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                        justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
            <button wire:click="productDetail(<?php echo e($productCard->id); ?>)"
                class="text-white text-lg w-9 h-8 rounded-full bg-[#6100c1] flex items-center justify-center hover:bg-gray-800 transition"
                title="view product">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            <button wire:click=""
                class="text-white text-lg w-9 h-8 rounded-full bg-[#6100c1] flex items-center justify-center hover:bg-gray-800 transition"
                title="add to wishlist">
                <i class="fa-solid fa-heart"></i>
            </button>
        </div>
    </div>
    <div class="pt-4 pb-3 px-4">
        <a href="#">
            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-[#6100c1] transition"><?php echo e($productCard->nama); ?>

            </h4>
        </a>
        <div class="flex items-baseline mb-1 space-x-2">
            <p class="text-xl text-[#6100c1] font-semibold">Rp. <?php echo e($productCard->harga); ?></p>
            
        </div>
        <div class="flex items-center">
            <div class="flex gap-1 text-sm text-yellow-400">
                <?php for($i = 0; $i < 5; $i++): ?>
                    <?php if($i < $productCard->rating): ?>
                        <span><i class="fa-solid fa-star"></i></span>
                    <?php else: ?>
                        <span><i class="fa-solid fa-star text-gray-500"></i></span>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
            <div class="text-xs text-gray-500 ml-3">(<?php echo e($productCard->jumlah_review); ?>)</div>
        </div>
    </div>
    <a href="#"
        class="block w-full py-1 text-center text-white bg-[#6100c1] border border-[#6100c1] rounded-b hover:bg-transparent hover:text-[#6100c1] transition">Add
        to cart</a>
</div><?php /**PATH E:\New folder\Alkademi\Tugas-Akhir_Tall-Stack\Tugas-Akhir_Tall-Stack1\resources\views/livewire/component/card.blade.php ENDPATH**/ ?>