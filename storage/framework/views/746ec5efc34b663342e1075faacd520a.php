<?php

use App\Models\Writer;

?>


<div id="app">

    <div class="flex flex-col justify-center items-center p-8">
        <a href="<?php echo e(url('/')); ?>" wire:navigate>
            <img src="<?php echo e(asset('website/images/navbar-light.svg')); ?>" class="w-full md:w-auto sm:w-6 mx-auto">
        </a>

        <div class="bg-[#f2e7d1] mt-8 rounded-3xl p-8 text-center justify-center items-center w-12/12 md:w-8/12">
            <div class="flex flex-col justify-center items-center">
                <img
                src="<?php echo e(asset('storage/'.$this->writer->image)); ?>"
                class="rounded-3xl h-60 w-60"
                >
            </div>
            <h1 class="font-semibold mt-4"><?php echo e($this->writer->name); ?></h1>

            <p class="font-semibold mt-2">(<?php echo e($this->writer->birthday.' / '.$this->writer->deathday); ?>)</p>

            <h1 class="font-semibold mt-4">المقدمة</h1>
            <p class="mb-4"><?php echo $this->writer->about; ?></p>

            <div class="flex flex-col justify-center items-center">
                <img src="<?php echo e(asset('website/images/palm-horizontal.svg')); ?>" class="h-36 w-36">
            </div>

            <div class="flex flex-col justify-center items-center">

                <span class="calamansi"
                data-skin="dist/skins/in-text"
                data-source="<?php echo e(asset("storage/".$this->writer->podcast)); ?>">
                Play Song
                </span>

                <img src="<?php echo e(asset("storage/".$this->writer->qr)); ?>" class="h-24 w-24 rounded-lg">
            </div>

            <div class="flex justify-between mt-12">
                <div>
                    <a href="<?php echo e(url('/writers/'.$writer->id.'/quote')); ?>" wire:navigate class="flex gap-2 justify-center items-start">
                        <img src="<?php echo e(asset('website/images/arrow-right.png')); ?>" class="w-6">
                        <p class="font-semibold">الإقتباسات</p>
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
        $__scriptKey = '3243243375-0';
        ob_start();
    ?>
Calamansi.autoload();
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>
<?php /**PATH E:\xampp\htdocs\mayadeen2\storage\framework\views/c5dd3ddc2cd236f1d5a27ea7cc4d5f56.blade.php ENDPATH**/ ?>