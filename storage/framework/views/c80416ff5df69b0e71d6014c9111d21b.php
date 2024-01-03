<?php

use App\Models\DatesOfPoem;

?>


        <div id="app">
            <div class="px-0 md:px-48">
                <div class="py-20 md:py-40 px-2 md:px-8 bg-[#ec6646]">
                    <img src="<?php echo e(asset('website/images/navbar-light.svg')); ?>" class="w-full md:w-auto sm:w-6 mx-auto">
            
                    <p class="text-center text-2xl md:text-4xl p-4 font-semibold text-black" style="line-height:normal">
                        استعدوا لتجربة شعرية استثنائية،
                        في هذه المساحة
                        سيقوم الشاعر بإلقاء قصائد الشعر النبطي
                        بصوت جهور مصحوب بإيقاعات موسيقية.
                    </p>

                    <div class="mb-4 text-2xl font-bold flex flex-col justify-center items-center text-center">
                        <!--[if BLOCK]><![endif]--><?php if($this->currentDay): ?>
                        <select wire:model.change="currentDay" name="day" class="text-[#ec6646] bg-white py-1 px-2 cursor-pointer rounded-lg">
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($day); ?>"><?php echo e(\Carbon\Carbon::createFromDate($day)->translatedFormat('j F')); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                        </select>
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                    </div>

                    <div class="relative overflow-x-auto shadow-md">
                        <!--[if BLOCK]><![endif]--><?php if($this->currentDay): ?>
                        <table class="w-full text-sm text-right text-black border-2 border-black">
                            <thead class="text-sm md:text-2xl text-black bg-[#f1e1c6] text-center">
                                <tr>
                                    <th class="border-2 border-black px-4 py-6">صاحب القصيده</th>
                                    <th class="border-2 border-black px-4 py-6">الوقت (التاريخ: <?php echo e(\Carbon\Carbon::createFromDate($this->currentDay)->translatedFormat('j F')); ?>)</th>
                                    <th class="border-2 border-black px-4 py-6">التفاصيل</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="text-sm md:text-lg text-black bg-[#f1e1c6] text-center">
                                        <td <?php if($item->is_break): ?> class="border-2 border-black px-2 py-4 bg-[#f4ceb0]" <?php else: ?> class="border-2 border-black px-2 py-4" <?php endif; ?>>
                                            <?php echo e(!$item->is_break ? $item->owner : 'استراحة'); ?>

                                        </td>
                                        <td <?php if($item->is_break): ?> class="border-2 border-black px-2 py-4 bg-[#f4ceb0]" <?php else: ?> class="border-2 border-black px-2 py-4" <?php endif; ?>>
                                            <?php echo e($item->start_time.' - '.$item->end_time); ?>

                                        </td>
                                        <td <?php if($item->is_break): ?> class="border-2 border-black px-2 py-4 bg-[#f4ceb0]" <?php else: ?> class="border-2 border-black px-2 py-4" <?php endif; ?>>
                                            <?php echo e(!$item->is_break ? $item->details : 'استراحة'); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                            </tbody>
                        </table>
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                    </div>

                </div>

                <!--
                    <div class="mt-24 text-4xl font-bold flex flex-col justify-center items-center">
                        <h1>اسم القصيدة</h1>
                        <span class="m-12 p-4 text-4xl bg-[#ec6646] text-white font-bold">1.30.1</span>
                    </div>
                -->

                <div class="flex flex-col justify-center items-center px-4">
                    <!--
                    <img class="py-8" src="<?php echo e(asset('website/images/qr.png')); ?>">
                    -->

                    <span class="text-3xl md:text-4xl text-center font-bold py-8">شاركنا قصيدتك بالنبطي !</span>
                    <img class="py-8" src="<?php echo e(asset('website/images/palm-horizontal.svg')); ?>">
                </div>

            </div>
        </div>
    <?php /**PATH E:\xampp\htdocs\mayadeen2\storage\framework\views/bc31a5dd960d9d4fd0203c6e0727f106.blade.php ENDPATH**/ ?>