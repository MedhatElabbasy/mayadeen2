<?php

use App\Models\Visitor;

?>



<?php $__env->startSection('title', 'تسجيل الزوار'); ?>

<?php $__env->startSection('content'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split("volt-anonymous-fragment-eyJuYW1lIjoidm9sdC1hbm9ueW1vdXMtZnJhZ21lbnQtMzJjYWU1N2U1NTk0MTNjY2FiMjcxMjg0Y2I5MDhkY2EiLCJwYXRoIjoicmVzb3VyY2VzXFx2aWV3c1xccGFnZXNcXHZpc2l0b3JzXFxpbmRleC5ibGFkZS5waHAifQ==", Livewire\Volt\Precompilers\ExtractFragments::componentArguments([...get_defined_vars(), ...array (
)]));

$__html = app('livewire')->mount($__name, $__params, '5c6jSHr', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\mayadeen2\resources\views\pages\visitors\index.blade.php ENDPATH**/ ?>