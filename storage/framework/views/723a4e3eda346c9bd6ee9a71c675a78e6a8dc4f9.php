<?php $__errorArgs = [$name, $bag];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <p <?php echo $attributes->merge(['class' => 'text-red-500 text-xs italic']); ?>>
        <?php echo e($message); ?>

    </p>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php /**PATH C:\srv\laravel\supermercado\vendor\protonemedia\laravel-form-components\src\Support/../../resources/views/tailwind/form-errors.blade.php ENDPATH**/ ?>