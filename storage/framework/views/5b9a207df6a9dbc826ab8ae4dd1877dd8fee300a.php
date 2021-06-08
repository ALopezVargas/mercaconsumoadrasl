<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e('Detalle de producto'); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <div class="m-auto px-4 py-8 max-w-xl">
        <div class="bg-white shadow-2xl">
            <div>
               <img src="<?php echo e(asset($producto->foto)); ?>">
            </div>
            <div class="px-4 py-2 mt-2 bg-white">
                <h2 class="font-bold text-2xl text-gray-800"><?php echo e($producto->nombre); ?></h2>
                <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">
                    <?php echo e($producto->descripcion); ?>

                <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">
                    Categoría: <?php echo e($producto->categoria->nombre); ?>

                </p>
                <p class="sm:text-sm text-xs font-bold text-black-900 px-2 my-9">
                    <a href="<?php echo e(route('mostrarProductos',$producto->categoria_id)); ?>"
                        class="p-2 bg-yellow-300 font-bold rounded hover:bg-yellow-800">
                        Total productos de <?php echo e($producto->categoria->nombre); ?></a>
                </p>
                <p></p>
                <a href="<?php echo e(route('producto.index')); ?>" class="p-2 bg-blue-500 font-bold rounded hover:bg-yellow-300">Volver</a>
            </div>
        </div>
    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH C:\srv\laravel\supermercado\resources\views/producto/detalle.blade.php ENDPATH**/ ?>