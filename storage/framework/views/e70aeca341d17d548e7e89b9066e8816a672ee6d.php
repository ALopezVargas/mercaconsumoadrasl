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
            <div class="flex justify-center md:justify-end -mt-16">
                <img class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500" src="<?php echo e(asset($producto->categoria->imagen)); ?>">
                </div>
        <form action="<?php echo e(route("addToCart")); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="producto_id" value="<?php echo e($producto->id); ?>">
            <div class="px-4 py-2 mt-2 bg-white">
                <h2 class="font-bold text-2xl text-gray-800"><?php echo e($producto->nombre); ?></h2>
                <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">
                    <?php echo e($producto->descripcion); ?>

                <p class="bold text-gray-700 px-2 mr-1 my-3">
                    Categoría: <?php echo e($producto->categoria->nombre); ?><br>
                    Stock:<?php echo e($producto->stock); ?><br>
                    En oferta:<?php if($producto->oferta == false): ?>
                        <td class="p-4">No</td>
                        <?php else: ?>
                        <td class="p-4"><span>Si</span></td>
                        <?php endif; ?>
                </p>
                <div>
                    <input name="cantidad" type="number" class="p-3 mx-2" placeholder="Nº Productos"/>
                    <button type="submit" class="p-3 mx-2 bg-green-200 font-bold rounded hover:bg-green-300">
                        Añadir al cesto
                    </button>
                </div>
            </form>
                <div class="flex grid-cols-3">
                    <a href="<?php echo e(route('mostrarProductos',$producto->categoria_id)); ?>"
                    class="p-3 mx-1 bg-yellow-300 font-bold rounded hover:bg-yellow-800">
                    Total productos de <?php echo e($producto->categoria->nombre); ?></a>
                    <a href="<?php echo e(route('producto.index')); ?>" class="p-3 mx-1 bg-blue-300 font-bold rounded hover:bg-blue-800">
                    Volver</a>
                </div>
            </div>

        </div>
    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH C:\srv\laravel\supermercado\resources\views/productos/detalle.blade.php ENDPATH**/ ?>