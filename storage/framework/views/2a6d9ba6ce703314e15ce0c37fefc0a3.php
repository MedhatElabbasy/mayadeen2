<?php

use App\Models\Question;

?>


<div class="px-8 border-x-2 border-[#e34e34]">
    <div class="flex flex-col items-center justify-center my-8">
        <div class="z-10">
            <img src="<?php echo e(asset('website/images/navbar.svg')); ?>" class="w-full md:w-auto sm:w-6 mx-auto">

                <div class="grid sm:grid-cols-1 md:grid-cols-2 mx-auto justify-center mt-12 gap-4">

                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [
                        [
                            "title" => "تحد نفسك",
                            "link" => "/challenges"
                        ],
                        [
                            "title" => "إستبيان",
                            "link" => "/surveys"
                        ],
                        [
                            "title" => "الأقصوصة",
                            "link" => "/story"
                        ],
                        [
                            "title" => "أدب الرحلات",
                            "link" => "/adab-alrihlat"
                        ],
                        [
                            "title" => "أدباء عبر التاريخ",
                            "link" => "/writers"
                        ],
                        [
                            "title" => "شارك قصيدتك",
                            "link" => "/poems"
                        ],
                        [
                            "title" => "جدول القصائد النبطي",
                            "link" => "/poems/table/nabati"
                        ],
                        [
                            "title" => "جدول القصائد الفصحى",
                            "link" => "/poems/table/fosha"
                        ],
                        [
                            "title" => "تسجيل الزوار",
                            "link" => "/visitors"
                        ],
                        [
                            "title" => "تسجيل كبار الزوار",
                            "link" => "/visitors/vip"
                        ],
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="beep text-center relative hover:scale-95">
                        <img class="h-16 md:h-24 w-full" src="<?php echo e(asset('website/images/button.svg')); ?>">
                        <a wire:navigate href="<?php echo e(url($link['link'])); ?>" class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold"><?php echo e($link['title']); ?></a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\mayadeen-app\storage\framework\views/e266796e5c2d9df7cf76774b99a08a4e.blade.php ENDPATH**/ ?>