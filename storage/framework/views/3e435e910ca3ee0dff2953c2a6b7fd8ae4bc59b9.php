<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e('Gestion de Productos'); ?>

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
        <div class="my-2 p-2"><hr>
            <?php if(Auth::user()!= null && Auth::user()->tipo==1): ?>
                <a href="<?php echo e(route('productos.create')); ?>" class="p-4 mx-7 bg-green-300 font-bold rounded-full hover:bg-green-800">Nuevo Producto</a><!--Creamos un nuevo producto-->
            <?php endif; ?>
        </div>
        <table class="mt-2">
            <thead>
                <tr>
                    <th>Detalles</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Categoria</th>
                    <th>Precio</th>
                    <?php if(Auth::user()!= null && Auth::user()->tipo==1): ?><th>Acciones</th><?php endif; ?>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="p-4"><a href="<?php echo e(route('productos.show',$item)); ?>"
                        class="p-5 mx-5 bg-yellow-300 font-bold rounded-full hover:bg-yellow-800"><i class="fas fa-plus mr-2"></i>Detalles</a></td>

                    <td class="p-4"><?php echo e($item->nombre); ?></td>
                    <td class="p-4"><?php echo e($item->descripcion); ?></td>
                    <td class="p-4"><?php echo e($item->categoria->nombre); ?></td>
                    <td class="p-4"><?php echo e($item->precio); ?></td>
                    <td class="p-4"><img src="<?php echo e(asset($item->foto)); ?>" width="100" height="100"></td>
                    <td class="p-4">
                        <?php if(Auth::user()!= null && Auth::user()->tipo==1): ?>
                        <form action="<?php echo e(route('productos.destroy',$item)); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <a href="<?php echo e(route('productos.edit',$item)); ?>" class="p-2 left-padding:3 bg-yellow-300 font-bold rounded hover:bg-yellow-800">Editar</a>
                            <button type="submit" class="p-2 bg-red-300 font-bold rounded hover:bg-red-600">
                                Eliminar
                            </button>
                        </form>
                        <?php endif; ?>
                    </td>
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
<?php /**PATH C:\srv\laravel\supermercado\resources\views/productos/index2.blade.php ENDPATH**/ ?>