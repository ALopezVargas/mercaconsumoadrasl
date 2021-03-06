<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/categoriesslider.css')); ?>">
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
                <a href="<?php echo e(route('producto.create')); ?>" class="p-4 mx-7 bg-green-300 font-bold rounded-full hover:bg-green-800">Nuevo Producto</a><!--Creamos un nuevo producto-->
            <?php endif; ?>
        </div>
        <div class="container">

            <section class="categories-slider-component">
                <h3 class="main-title">
                    Categor??as de nuestro supermercado</h3>
                <ul class="categories-list">
                    <li class="item">
                        <a href="" class="btn-category">
                                <span class="category-name">Platos Preparados</span>
                            </a>
                        </li>
                    <li class="item">
                            <a href="" class="btn-category">

                                <span class="category-name">Al D??a</span>
                            </a>
                        </li>
                    <li class="item">
                            <a href="" class="btn-category">

                                <span class="category-name">Despensa</span>
                            </a>
                        </li>
                    <li class="item">
                            <a href="" class="btn-category">

                                <span class="category-name">Mascotas</span>
                            </a>
                        </li>
                    <li class="item">
                            <a href="" class="btn-category">
                                <span class="category-name">Beb??</span>
                            </a>
                        </li>
                    <li class="item">
                            <a href="" class="btn-category">
                                <span class="category-name">Cuidado del Hogar</span>
                            </a>
                        </li>
                    <li class="item">
                            <a href="" class="btn-category">
                                <span class="category-name">Cuidado Personal</span>
                            </a>
                        </li>
                    <li class="item">
                            <a href="" class="btn-category">
                                <span class="category-name">Bebidas</span>
                            </a>
                        </li>
                    <li class="item">
                            <a href="" class="btn-category">
                                <span class="category-name">Bodega</span>
                            </a>
                        </li>
                    <li class="item">
                            <a href="" class="btn-category">
                                <span class="category-name">Congelados</span>
                            </a>
                        </li>
                    </ul>
            </section>

            <h2 class="main-title"> CAT??LOGO:</h2>

            <?php if(auth()->guard()->guest()): ?>
            <section class="container-products">
                <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="productCat" id="<?php echo e($item->id); ?>">
                    <img src="<?php echo e(asset($item->foto)); ?>" alt="" class="product__img">
                    <div class="product__description">
                        <h3 class="product__title"><?php echo e($item->nombre); ?></h3>
                        <h4 class="product__cat"><?php echo e($item->categoria->nombre); ?></h4>
                        <span class="product__price"><?php echo e($item->precio); ?>???</span>
                        <span class="product__price">Stock disponible:<?php echo e($item->stock); ?></span>
                    </div>
                    <button class="p-3 mx-4 bg-white-300 font-bold rounded-full hover:bg-green-100">Detalles <i class="product__icon fas fa-cart-plus"></i> </button>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </section>
            <?php endif; ?>
            <?php if(auth()->guard()->check()): ?>
            <?php if(Auth::user()->tipo!=1): ?>
            <section class="container-products">
                <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="productCat" id="<?php echo e($item->id); ?>">
                    <img src="<?php echo e(asset($item->foto)); ?>" alt="" class="product__img">
                    <div class="product__description">
                        <h3 class="product__title"><?php echo e($item->nombre); ?></h3>
                        <h4 class="product__cat"><?php echo e($item->categoria->nombre); ?></h4>
                        <span class="product__price"><?php echo e($item->precio); ?>???</span>
                        <span class="product__price">Stock disponible:<?php echo e($item->stock); ?></span>

                    </div>
                    <button class="p-3 mx-4 bg-blue-300 font-bold rounded-full hover:bg-blue-800">Detalles <i class="product__icon fas fa-cart-plus"></i></button>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </section>
            <?php endif; ?>
            <?php endif; ?>



            <?php if(Auth::user()!= null && Auth::user()->tipo==1): ?>
            <table class="mt-2">
                <thead>
                    <tr>
                        <th>Detalles</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Categoria</th>
                        <th>Precio</th>
                        <th>Oferta</th>
                        <?php if(Auth::user()!= null && Auth::user()->tipo==1): ?><th>Acciones</th><?php endif; ?>
                        <th>Foto</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="p-1"><a href="<?php echo e(route('producto.show',$item)); ?>"
                            class="p-3 mx-2 bg-blue-300 font-bold rounded-full hover:bg-blue-800">Detalles</a></td>

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
                        <td class="p-4">
                            <?php if(Auth::user()!= null && Auth::user()->tipo==1): ?>
                            <form action="<?php echo e(route('producto.destroy',$item)); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <div class="flex grid-cols-2">
                                    <a class="p-3 mx-1 bg-yellow-300 font-bold rounded hover:bg-yellow-800" href="<?php echo e(route('producto.edit',$item)); ?>">Editar</a>
                                <button type="submit" class="p-2 bg-red-300 font-bold rounded hover:bg-red-600">
                                    Eliminar
                                </button>
                                </div>
                            </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php endif; ?>
        <?php echo e($productos->links()); ?>

    </div>
    <script src="<?php echo e(asset('js/detalleProducto.js')); ?>"></script>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH C:\srv\laravel\supermercado\resources\views/productos/index.blade.php ENDPATH**/ ?>