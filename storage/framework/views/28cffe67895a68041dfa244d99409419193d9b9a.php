<div>
    
    <!-- banner -->
    <div class="bg-cover bg-no-repeat bg-center py-36"
        style="background-image: url('<?php echo e(asset('ecommerce-template-tailwind-1-main/public')); ?>/assets/images/banner-bg.jpg');">
        <div class="container">
            <h1 class="text-6xl text-gray-800 font-medium mb-4 capitalize">
                best collection for <br> home decoration
            </h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam <br>
                accusantium perspiciatis, sapiente
                magni eos dolorum ex quos dolores odio</p>
            <div class="mt-12">
                <button wire:click="shop" class="bg-[#6100c1] border border-[#6100c1] text-white px-8 py-3 font-medium 
                        rounded-md hover:bg-transparent hover:text-[#6100c1]">Shop Now</button>
            </div>
        </div>
    </div>
    <!-- ./banner -->
    
    <!-- features -->
    <div class="container py-16">
        <div class="w-10/12 grid grid-cols-3 gap-6 mx-auto justify-center">
            <div class="border border-[#6100c1] rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <img src="<?php echo e(asset('ecommerce-template-tailwind-1-main/public')); ?>/assets/images/icons/delivery-van.svg"
                    alt="Delivery" class="w-12 h-12 object-contain">
                <div>
                    <h4 class="font-medium capitalize text-lg">Free Shipping</h4>
                    <p class="text-gray-500 text-sm">Order over $200</p>
                </div>
            </div>
            <div class="border border-[#6100c1] rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <img src="<?php echo e(asset('ecommerce-template-tailwind-1-main/public')); ?>/assets/images/icons/money-back.svg"
                    alt="Delivery" class="w-12 h-12 object-contain">
                <div>
                    <h4 class="font-medium capitalize text-lg">Money Rturns</h4>
                    <p class="text-gray-500 text-sm">30 days money returs</p>
                </div>
            </div>
            <div class="border border-[#6100c1] rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <img src="<?php echo e(asset('ecommerce-template-tailwind-1-main/public')); ?>/assets/images/icons/service-hours.svg"
                    alt="Delivery" class="w-12 h-12 object-contain">
                <div>
                    <h4 class="font-medium capitalize text-lg">24/7 Support</h4>
                    <p class="text-gray-500 text-sm">Customer support</p>
                </div>
            </div>
        </div>
    </div>
    <!-- ./features -->
    
    <!-- categories -->
    <div class="container py-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">shop by category</h2>
        <div class="grid grid-cols-3 gap-3">
            <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="relative rounded-sm overflow-hidden group">
                <?php if($k->media): ?>
                    <img src="<?php echo e(asset($k->media)); ?>" alt="category 1" class="w-full">
                <?php else: ?>
                    <img src="<?php echo e(asset('ecommerce-template-tailwind-1-main/public')); ?>/assets/images/category/category-1.jpg" alt="category 1" class="w-full">
                <?php endif; ?>
                <a href="<?php echo e($k->id); ?>"
                    class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition"><?php echo e($k->nama); ?></a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <!-- ./categories -->
    
    <!-- new arrival -->
    <div class="container pb-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">top new arrival</h2>
        <div class="grid grid-cols-4 gap-6">
            <?php $__currentLoopData = $terbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('component.card', ['product' => $t])->html();
} elseif ($_instance->childHasBeenRendered($t->id)) {
    $componentId = $_instance->getRenderedChildComponentId($t->id);
    $componentTag = $_instance->getRenderedChildComponentTagName($t->id);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild($t->id);
} else {
    $response = \Livewire\Livewire::mount('component.card', ['product' => $t]);
    $html = $response->html();
    $_instance->logRenderedChild($t->id, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <!-- ./new arrival -->
    
    <!-- ads -->
    <div class="container pb-16">
        <a href="#">
            <img src="<?php echo e(asset('ecommerce-template-tailwind-1-main/public')); ?>/assets/images/offer.jpg" alt="ads"
                class="w-full">
        </a>
    </div>
    <!-- ./ads -->
    
    <!-- product -->
    <div class="container pb-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">recomended for you</h2>
        <div class="grid grid-cols-4 gap-6">
            <?php $__currentLoopData = $batik; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('component.card', ['product' => $b])->html();
} elseif ($_instance->childHasBeenRendered($b->id)) {
    $componentId = $_instance->getRenderedChildComponentId($b->id);
    $componentTag = $_instance->getRenderedChildComponentTagName($b->id);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild($b->id);
} else {
    $response = \Livewire\Livewire::mount('component.card', ['product' => $b]);
    $html = $response->html();
    $_instance->logRenderedChild($b->id, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <!-- ./product -->
</div>
<?php /**PATH E:\New folder\Alkademi\Tugas-Akhir_Tall-Stack\Tugas-Akhir_Tall-Stack1\resources\views/livewire/layouts/index.blade.php ENDPATH**/ ?>