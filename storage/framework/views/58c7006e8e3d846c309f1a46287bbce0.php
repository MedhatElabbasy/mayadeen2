<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@300;400;500;600;700;800&display=swap"rel="stylesheet" />

    <!-- css -->
    <style>
        /* Scrollbar */
        body::-webkit-scrollbar {
            width: 16px;
        }

        body::-webkit-scrollbar-track {
            border-radius: 8px;
            background-color: #e7e7e7;
            border: 1px solid #cacaca;
        }

        body::-webkit-scrollbar-thumb {
            border-radius: 8px;
            border: 3px solid transparent;
            background-clip: content-box;
            background-color: #e34e34;
        }

        /* End scrollbar */

        /* Font */
        body {
            font-family: "Noto Kufi Arabic", sans-serif !important;
        }

        /* End Font */

        /* Cursor */
        /*
        body {
            cursor: url("<?php echo e(asset('website/images/feather.png')); ?>"), auto;
        }

        a, label, button {
            cursor: url("<?php echo e(asset('website/images/feather.png')); ?>"), auto;
        }
        */
        /* End cursor */
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/@voerro/calamansi-js@1.0.0/dist/calamansi.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@voerro/calamansi-js@1.0.0/dist/calamansi.min.css" rel="stylesheet">

    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(setting('siteName')); ?></title>

    <link src="<?php echo e(asset('website/css/star-rating.min.css')); ?>" rel="stylesheet">

    <?php echo $__env->yieldPushContent('head'); ?>
</head>

<body dir="rtl" class="<?php echo $__env->yieldContent('bg', 'bg-[#f1e1c6]'); ?>">
    <?php echo $__env->yieldContent('content'); ?>

    <!-- Palms -->
    <div class="hidden md:block absolute bottom-8 left-8 -z-50">
        <img src="<?php echo e(asset('website/images/palm.svg')); ?>" class="w-full md:w-auto sm:w-6">
    </div>

    <div class="hidden md:block absolute top-8 right-8 -z-50">
        <img src="<?php echo e(asset('website/images/palm.svg')); ?>" class="w-full md:w-auto sm:w-6">
    </div>
    <!-- End Palms -->

    <script src="<?php echo e(asset('website/js/star-rating.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/party-js@latest/bundle/party.min.js"></script>

    <?php echo $__env->yieldPushContent('body'); ?>

    <!-- Sound Effect -->
    <?php $__currentLoopData = ['beep', 'correctAnswer', 'wrongAnswer']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <audio id="<?php echo e($item . 'Player'); ?>" src="<?php echo e(asset("website/audio/{$item}.mp3")); ?>" preload="auto">
            Your browser does not support the <code>audio</code> element.
        </audio>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <script>
        function podcast() {
            let playe = document.getElementById('podcastPlayer');
            playe.pause();
            playe.currentTime = 0;
            playe.play();
        }
    </script>

    <script>
        function soundEffectPlay(player, background = false) {
            if (!background) {
                const audioElements = document.querySelectorAll('audio');
                audioElements.forEach(audio => audio.pause());
            }

            let beepOne = document.getElementById(player);
            beepOne.pause();
            beepOne.currentTime = 0;
            beepOne.play();
        }

        document.addEventListener("DOMContentLoaded", function() {
            let beepElements = document.querySelectorAll(".beep");

            beepElements.forEach(function(beepElement) {
                beepElement.addEventListener("mouseenter", function() {
                    soundEffectPlay("beepPlayer", true)
                });
            });
        });
    </script>
    <!-- // Sound Effect -->

    <!-- Livewire back -->
    <script>
        window.addEventListener("popstate", function (event) { window.location.reload(); });
    </script>
    <!-- // Livewire back -->
</body>

</html>
<?php /**PATH C:\laragon\www\mayadeen-app\resources\views/layouts/app.blade.php ENDPATH**/ ?>