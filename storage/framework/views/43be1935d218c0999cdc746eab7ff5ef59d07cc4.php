<div class="flex flex-col">
    <label class="flex items-center">
        <input <?php echo $attributes->merge(['class' => 'form-checkbox']); ?>

            type="checkbox"
            value="<?php echo e($value); ?>"

            <?php if($isWired()): ?>
                wire:model<?php echo $wireModifier(); ?>="<?php echo e($name); ?>"
            <?php else: ?>
                name="<?php echo e($name); ?>"
            <?php endif; ?>

            <?php if($checked): ?>
                checked="checked"
            <?php endif; ?>
        />

        <span class="ml-2"><?php echo e($label); ?></span>
    </label>

    <?php if($hasErrorAndShow($name)): ?>
        <?php if (isset($component)) { $__componentOriginalcdcbbf1f95eb56fbb71a017e50568490be43a3e2 = $component; } ?>
<?php $component = $__env->getContainer()->make(ProtoneMedia\LaravelFormComponents\Components\FormErrors::class, ['name' => $name]); ?>
<?php $component->withName('form-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalcdcbbf1f95eb56fbb71a017e50568490be43a3e2)): ?>
<?php $component = $__componentOriginalcdcbbf1f95eb56fbb71a017e50568490be43a3e2; ?>
<?php unset($__componentOriginalcdcbbf1f95eb56fbb71a017e50568490be43a3e2); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    <?php endif; ?>
</div><?php /**PATH C:\srv\laravel\supermercado\vendor\protonemedia\laravel-form-components\src\Support/../../resources/views/tailwind/form-checkbox.blade.php ENDPATH**/ ?>