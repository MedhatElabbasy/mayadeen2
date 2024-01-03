<?php

use App\Models\Writer;

?>


<div id="app">

    <div class="flex flex-col justify-center items-center p-8">
        <a href="<?php echo e(url('/')); ?>" wire:navigate>
            <img src="<?php echo e(asset('website/images/navbar-light.svg')); ?>" class="w-full md:w-auto sm:w-6 mx-auto">
        </a>

        <div class="bg-[#f2e7d1] mt-8 rounded-3xl p-8 text-center justify-center items-center w-12/12 md:w-8/12">

            
            <!--
                justify-center text-center items-center
            -->
            <div class="flex flex-col md:flex-row md:justify-between" x-data="{ audio: true }">
                <img x-show="audio" x-on:click="podcast" src="<?php echo e(asset('website/images/sound-play.svg')); ?>" class="w-14 cursor-pointer">

                <img
                src="<?php echo e(asset('storage/'.$this->writer->image)); ?>"
                class="rounded-3xl h-60 w-60"
                >

                <img src="<?php echo e(asset('website/images/banner.svg')); ?>" class="w-20 md:w-64">
            </div>
            <h1 class="font-semibold mt-4"><?php echo e($this->writer->name); ?></h1>

            <p class="font-semibold mt-2">(<?php echo e($this->writer->birthday.' / '.$this->writer->deathday); ?>)</p>

            <h1 class="font-semibold mt-4">المقدمة</h1>
            <p class="mb-4"><?php echo $this->writer->about; ?></p>

            <div class="flex flex-col justify-center items-center">
                <img src="<?php echo e(asset('website/images/palm-horizontal.svg')); ?>" class="h-36 w-36">
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

    <audio id="podcastPlayer" src="<?php echo e(asset("storage/".$this->writer->podcast)); ?>" preload="auto">
        Your browser does not support the <code>audio</code> element.
    </audio>

</div>

        <?php
        $__scriptKey = '178244020-0';
        ob_start();
    ?>
        <script>
        function podcast() {
            if (!background) {
                const audioElements = document.querySelectorAll('audio');
                audioElements.forEach(audio => audio.pause());
            }

            let playe = document.getElementById('player');
            playe.pause();
            playe.currentTime = 0;
            playe.play();
        }
        </script>
        <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>

<?php /**PATH E:\xampp\htdocs\mayadeen2\storage\framework\views/820fc8eb27955148d82d4d137ed215b2.blade.php ENDPATH**/ ?>