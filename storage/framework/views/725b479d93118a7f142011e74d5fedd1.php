<?php

use App\Models\Question;

?>



<?php $__env->startSection('title', 'مرحبا'); ?>

<?php $__env->startSection('content'); ?>
<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split("volt-anonymous-fragment-eyJuYW1lIjoidm9sdC1hbm9ueW1vdXMtZnJhZ21lbnQtNTJjNDlmOTU5MzI2MWVjYzkxODAxODRjMDA5MWY0MmMiLCJwYXRoIjoicmVzb3VyY2VzXFx2aWV3c1xccGFnZXNcXGluZGV4LmJsYWRlLnBocCJ9", Livewire\Volt\Precompilers\ExtractFragments::componentArguments([...get_defined_vars(), ...array (
)]));

$__html = app('livewire')->mount($__name, $__params, 'mEvnSkl', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mayadeen-app\resources\views\pages\index.blade.php ENDPATH**/ ?>