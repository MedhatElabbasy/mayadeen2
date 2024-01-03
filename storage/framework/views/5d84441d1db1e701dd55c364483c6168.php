<?php

use App\Models\VipVisitor;

?>



<?php $__env->startSection('title', 'تسجيل كبار الزوار'); ?>

<?php $__env->startSection('content'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split("volt-anonymous-fragment-eyJuYW1lIjoidm9sdC1hbm9ueW1vdXMtZnJhZ21lbnQtYWFhMmU4YmRmMjRlNjI4MDIxODI1ZjZhZGFmMGZkYTEiLCJwYXRoIjoicmVzb3VyY2VzXFx2aWV3c1xccGFnZXNcXHZpc2l0b3JzXFx2aXBcXGluZGV4LmJsYWRlLnBocCJ9", Livewire\Volt\Precompilers\ExtractFragments::componentArguments([...get_defined_vars(), ...array (
)]));

$__html = app('livewire')->mount($__name, $__params, 'PTYerNW', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\mayadeen2\resources\views\pages\visitors\vip\index.blade.php ENDPATH**/ ?>