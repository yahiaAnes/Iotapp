<input
    <?php echo e($attributes
            ->merge([
                'id' => $getId(),
                'type' => 'hidden',
                $applyStateBindingModifiers('wire:model') => $getStatePath(),
            ], escape: false)
            ->merge($getExtraAttributes(), escape: false)
            ->class(['fi-fo-hidden'])); ?>

/>
<?php /**PATH C:\Users\DELL\Desktop\developpment\Iotapp-feature-new-feature\vendor\filament\forms\src\/../resources/views/components/hidden.blade.php ENDPATH**/ ?>