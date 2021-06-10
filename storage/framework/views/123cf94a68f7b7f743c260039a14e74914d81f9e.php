<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           <?php echo e('Productos de '.$nombreCategoria); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <div class="container mx-auto p-2 w-4/5 mb-4">
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.mensaje-alerta','data' => []]); ?>
<?php $component->withName('mensaje-alerta'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

        <div class="mt-5 p-2">
            <a href="<?php echo e(route('producto.index')); ?>" class="p-4 mx-7 bg-gray-300 font-bold rounded-full hover:bg-gray-800">Volver</a>
        </div>
        <table class="table-auto mt-2">
            <thead>
                <tr>
                    <th>Detalles</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Categoria</th>
                    <th>Precio</th>
                    <th>Oferta</th>
                    <th>Foto</th>
                    <th>Stock</th>

                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="p-4"><a href="<?php echo e(route('producto.show',$item)); ?>"
                        class="p-5 mx-5 bg-yellow-300 font-bold rounded-full hover:bg-yellow-800">Detalles</a></td>

                    <td class="p-4"><?php echo e($item->nombre); ?></td>
                    <td class="p-4"><?php echo e($item->descripcion); ?></td>
                    <td class="p-4"><?php echo e($item->categoria->nombre); ?></td>
                    <td class="p-4"><?php echo e($item->precio); ?></td>
                    <?php if($item->oferta == false): ?>
                        <td class="p-4">No</td>
                        <?php else: ?>
                        <td class="p-4"><span class="p-2 mx-2 bg-yellow-300">Si</span></td>
                        <?php endif; ?>
                    <td class="imagenIndex p-4"><img src="<?php echo e(asset($item->foto)); ?>"></td>
                    <td class="p-4"><?php echo e($item->stock); ?></td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo e($productos->links()); ?>

    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH C:\srv\laravel\supermercado\resources\views/productos/mostrarProducto.blade.php ENDPATH**/ ?>