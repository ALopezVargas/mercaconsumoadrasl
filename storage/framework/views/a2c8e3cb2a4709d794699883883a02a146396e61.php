<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e('Detalle de categorias'); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <div class="m-auto px-4 py-8 max-w-xl">
        <div class="p-8 bg-white shadow-2xl">

            <div class="px-4 py-2 mt-2 bg-white">

                <h2 class="p-4 content-center font-bold text-2xl text-gray-800">Tipo de Categoría: <?php echo e($categoria->nombre); ?></h2>
                <img src="<?php echo e(asset($categoria->imagen)); ?>"/>
                <a href="<?php echo e(route('categorias.index')); ?>" class="mt-5 p-2 bg-blue-500 font-bold rounded hover:bg-yellow-300">Volver</a>
            </div>
        </div>
    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH C:\srv\laravel\supermercado\resources\views/categoria/detalle.blade.php ENDPATH**/ ?>