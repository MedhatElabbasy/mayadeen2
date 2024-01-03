<?php

use App\Models\DatesOfPoem;

?>


        <div id="app" class="mb-4">
            <div class="px-0 md:px-8 lg:px-8">
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

                <div x-data="{ currentDate: 0 }">
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div x-data="{
                            showContent: false,
                            countDownDate: new Date('<?php echo e(\Carbon\Carbon::now()->format("Y-m-d")); ?>T<?php echo e($item->start_time); ?>').getTime(),
                            pad: function(num) {
                            return num < 10 ? '0' + num : num;
                            },
                            intervalId: null,
                            initCountdown: function() {
                            this.intervalId = setInterval(() => {
                                const now = new Date().getTime();
                                const distance = this.countDownDate - now;
                                this.showContent = true;

                                if (distance >= 0) {
                                const hours = this.pad(Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)));
                                const minutes = this.pad(Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)));
                                const seconds = this.pad(Math.floor((distance % (1000 * 60)) / 1000));
                                this.formatCountdown = `${hours}:${minutes}:${seconds}`;
                                } else {
                                this.formatCountdown = 'بدأت';
                                this.currentDate++;
                                this.showContent = false;
                                clearInterval(this.intervalId);
                                }
                            }, 1000);
                            },
                            formatCountdown: '00h 00m 00s',
                        }" x-init="initCountdown" x-show="showContent && currentDate==<?php echo e($loop->index); ?>" class="mt-24 text-4xl font-bold flex flex-col justify-center items-center">
                            <h1>
                                <?php echo e(!$item->is_break ? $item->owner : 'استراحة'); ?>

                            </h1>
                            <p x-text="formatCountdown" class="m-12 rounded-lg p-4 text-4xl bg-[#ec6646] text-white font-bold"></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                    </div>

                <div class="flex flex-col justify-center items-center px-4">
                    <!--[if BLOCK]><![endif]--><?php if(asset('website/images/qr.png')): ?>
                        <img class="py-8 rounded-lg" src="<?php echo e(asset('website/images/qr.png')); ?>">
                    <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                    <span class="text-3xl md:text-4xl text-center font-bold py-8">شاركنا قصيدتك بالنبطي !</span>
                    <img class="py-8" src="<?php echo e(asset('website/images/palm-horizontal.svg')); ?>">
                </div>
            </div>
        </div>
    <?php /**PATH E:\xampp\htdocs\mayadeen2\storage\framework\views/d62ab5f8daa3889c5c24f0649ba7999b.blade.php ENDPATH**/ ?>