<div
    <?php echo e($attributes
            ->merge([
                'id' => $getId(),
            ], escape: false)
            ->merge($getExtraAttributes(), escape: false)); ?>

>
    <?php echo e($getChildComponentContainer()); ?>

</div>
<?php /**PATH E:\xampp\htdocs\mayadeen2\vendor\filament\infolists\src\/../resources/views/components/grid.blade.php ENDPATH**/ ?>