<?php

use App\Models\Poem;

?>



<?php $__env->startSection('title', 'شارك قصيدتك'); ?>

<?php $__env->startSection('content'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split("volt-anonymous-fragment-eyJuYW1lIjoidm9sdC1hbm9ueW1vdXMtZnJhZ21lbnQtOWZjMmNmODgyMjc0OTk2NWExNmQ4NWRkZTEyNmQ5ZWIiLCJwYXRoIjoicmVzb3VyY2VzXFx2aWV3c1xccGFnZXNcXHBvZW1zXFxpbmRleC5ibGFkZS5waHAifQ==", Livewire\Volt\Precompilers\ExtractFragments::componentArguments([...get_defined_vars(), ...array (
)]));

$__html = app('livewire')->mount($__name, $__params, 'veByAaW', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\mayadeen2\resources\views\pages\poems\index.blade.php ENDPATH**/ ?>