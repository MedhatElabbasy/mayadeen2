<?php

use function Laravel\Folio\{middleware};

use App\Models\Story;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\StoryPdfSendMail;
use Dompdf\Options;

?>


<?php $__env->startPush('head'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('website/css/poll-quesition.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('website/css/global-style.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('website/css/story-title.css')); ?>" />

    <!-- css files-->
    <link rel="stylesheet" href="<?php echo e(asset('website/story/css/story-title.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('website/story/css/write-story.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('website/story/css/global-style.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('website/story/css/writers.css')); ?>" />
    <!-- bootstrap link-->
    
<?php $__env->stopPush(); ?>

<?php $__env->startSection('title', 'الأقصوصة'); ?>

<?php $__env->startSection('content'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split("volt-anonymous-fragment-eyJuYW1lIjoidm9sdC1hbm9ueW1vdXMtZnJhZ21lbnQtZWIyODMzY2U2ZjhlMTY2Mjk2YTlmMzVkOWU5NzU2OGUiLCJwYXRoIjoicmVzb3VyY2VzXFx2aWV3c1xccGFnZXNcXHN0b3J5XFxpbmRleC5ibGFkZS5waHAifQ==", Livewire\Volt\Precompilers\ExtractFragments::componentArguments([...get_defined_vars(), ...array (
)]));

$__html = app('livewire')->mount($__name, $__params, '2zACS4d', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\mayadeen2\resources\views\pages\story\index.blade.php ENDPATH**/ ?>