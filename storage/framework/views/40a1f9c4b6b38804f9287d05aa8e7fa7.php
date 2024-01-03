<?php

use App\Models\Question;
use App\Models\Challenge;

?>



<?php $__env->startSection('title', 'تحدي نفسك'); ?>

<?php $__env->startSection('content'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split("volt-anonymous-fragment-eyJuYW1lIjoidm9sdC1hbm9ueW1vdXMtZnJhZ21lbnQtY2NmOGU1ZDlkZTA0MTgzMmMxYTViMmU1OTZlN2U5M2QiLCJwYXRoIjoicmVzb3VyY2VzXFx2aWV3c1xccGFnZXNcXGNoYWxsZW5nZXNcXGluZGV4LmJsYWRlLnBocCJ9", Livewire\Volt\Precompilers\ExtractFragments::componentArguments([...get_defined_vars(), ...array (
)]));

$__html = app('livewire')->mount($__name, $__params, 'dI6jqhU', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\mayadeen2\resources\views\pages\challenges\index.blade.php ENDPATH**/ ?>