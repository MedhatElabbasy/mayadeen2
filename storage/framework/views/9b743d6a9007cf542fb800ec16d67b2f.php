<?php

use App\Models\Writer;

?>


<div id="app" class="mb-4">

    <div class="flex flex-col justify-center items-center p-8">
        <a href="<?php echo e(url('/writers')); ?>" wire:navigate>
            <img src="<?php echo e(asset('website/images/navbar-light.svg')); ?>">
        </a>

        <div class="bg-[#f2e7d1] mt-8 rounded-3xl p-8 text-center justify-center items-center w-12/12 md:w-8/12">
            <div class="flex flex-col justify-center items-center">
                <img
                src="<?php echo e(asset('storage/'.$this->writer->image)); ?>"
                class="rounded-3xl h-60 w-60 mt-4"
                >
            </div>
            <h1 class="font-semibold mt-4"><?php echo e($this->writer->name); ?></h1>

            <p class="font-semibold mt-2">
                (
                <span><?php echo e(Carbon\Carbon::parse($this->writer->birthday)->translatedFormat('d F Y')); ?></span>
                /
                <span><?php echo e(($this->writer->deathday > $this->writer->birthday) ? 'الآن' : Carbon\Carbon::parse($this->writer->deathday)->translatedFormat('d F Y')); ?></span>
                )
            </p>

            <h1 class="font-semibold mt-4">المقدمة</h1>
            <p class="mb-4"><?php echo $this->writer->about; ?></p>

            <div class="flex flex-col justify-center items-center">
                <img src="<?php echo e(asset('website/images/palm-horizontal.svg')); ?>" class="h-36 w-36">
            </div>

            <div class="flex flex-col justify-center items-center">
                <!--[if BLOCK]><![endif]--><?php if($this->writer->podcast): ?>
                <audio controls class="mb-4 bg-gray-200 shadow-sm px-4 py-2 rounded-full">
                    <source src="<?php echo e(asset("storage/".$this->writer->podcast)); ?>">
                    تعذر بدأ مشغل الصوت.
                </audio>
                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                <!--[if BLOCK]><![endif]--><?php if($this->writer->qr): ?>
                <img src="<?php echo e(asset("storage/".$this->writer->qr)); ?>" class="h-24 w-24 rounded-lg">
                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
            </div>

            <div class="flex justify-between mt-12">
                <div>
                    <a href="<?php echo e(url('/writers')); ?>" wire:navigate class="flex gap-2 justify-center items-start">
                        <img src="<?php echo e(asset('website/images/arrow-right.png')); ?>" class="w-6">
                        <p class="font-semibold">الأدباء</p>
                    </a>
                </div>

                <div>
                    <a href="<?php echo e(url('/writers/'.$writer->id.'/works')); ?>" wire:navigate class="flex gap-2 justify-center items-start">
                        <p class="font-semibold">الأعمال</p>
                        <img src="<?php echo e(asset('website/images/arrow-left.svg')); ?>" class="w-6">
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
    <?php
        $__scriptKey = '1746864397-0';
        ob_start();
    ?>
<script>
Calamansi.autoload();
</script>
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>
<?php /**PATH E:\xampp\htdocs\mayadeen2\storage\framework\views/3a35650182bc5a32d45ddf0ef3a55c28.blade.php ENDPATH**/ ?>