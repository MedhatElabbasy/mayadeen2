<?php

use App\Models\Writer;

?>


<div id="app" class="mb-4">
    <div class="flex flex-col justify-center items-center p-8">
        <a href="<?php echo e(url('/writers')); ?>" wire:navigate>
            <img src="<?php echo e(asset('website/images/navbar-light.svg')); ?>">
        </a>

        <div class="bg-[#f2e7d1] mt-8 rounded-3xl p-8 text-center justify-center items-center w-12/12 md:w-8/12">
            <h1 class="font-semibold mt-4 mb-8 text-4xl">الأعمال</h1>

            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $writer->works; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="w-full mb-4 mt-8 items-center">
                <div class="block md:flex gap-4">
                    <img src="<?php echo e(asset('storage/'.$work->image)); ?>" class="w-48 h-72 rounded-lg">
                    <div class="text-right mt-2">
                        <h1 class="font-semibold" style="line-height:normal"><?php echo e($work->title); ?></h1>
                        <p class="m-2" style="line-height:normal"><?php echo $work->description; ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->

            <div class="flex flex-col justify-center items-center">
                <img src="<?php echo e(asset('website/images/palm-horizontal.svg')); ?>" class="h-36 w-36">
            </div>

            <div class="flex justify-between mt-2">
                <div>
                    <a href="<?php echo e(url('/writers/'.$writer->id)); ?>" wire:navigate class="flex gap-2 justify-center items-start">
                        <img src="<?php echo e(asset('website/images/arrow-right.png')); ?>" class="w-6">
                        <p class="font-semibold">الأديب</p>
                    </a>
                </div>

                <div>
                    <a href="<?php echo e(url('/writers/'.$writer->id.'/quote')); ?>" wire:navigate class="flex gap-2 justify-center items-start">
                        <p class="font-semibold">الأعمال</p>
                        <img src="<?php echo e(asset('website/images/arrow-left.svg')); ?>" class="w-6">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\mayadeen2\storage\framework\views/77b80b5ac36fc4dcae68468bcdca8673.blade.php ENDPATH**/ ?>