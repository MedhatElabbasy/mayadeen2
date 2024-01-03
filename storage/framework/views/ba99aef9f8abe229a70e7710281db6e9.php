<?php

use App\Models\Writer;

?>


<div id="app" class="mb-4">
    <div class="px-8 border-x-2 border-[#e34e34]">
        <div class="flex flex-col items-center justify-center my-8">
            <div class="z-10">
                <img src="<?php echo e(asset('website/images/navbar.svg')); ?>" class="w-full md:w-auto sm:w-6 mx-auto">
                <h1 class="text-center text-2xl md:text-4xl font-bold my-8 text-[#e34e34]">أدباء عبر التاريخ!</h1>
                    <div class="grid sm:grid-cols-1 md:grid-cols-2 mx-auto items-center justify-center mt-12 gap-4">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $writers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $writer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <a wire:navigate href="<?php echo e(url('/writers/'.$writer->id)); ?>" class="mt-2 items-center justify-center text-white text-1xl md:text-2xl font-semibold">
                            <div class="beep text-center rounded-lg hover:scale-95 px-4 py-5 bg-[#e34e34]">
                            <?php echo e($writer->name); ?>

                            </div>
                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                    </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\mayadeen2\storage\framework\views/76ff89d6e27e0f4b67bfb9248a1bea2e.blade.php ENDPATH**/ ?>