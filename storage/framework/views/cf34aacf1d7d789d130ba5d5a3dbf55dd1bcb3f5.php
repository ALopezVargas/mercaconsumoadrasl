         <?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
             <link rel="stylesheet" href="<?php echo e(asset('css/slidercss.css')); ?>">
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
                 <div class="my-2 p-2">
                     <hr>
                     <?php if(Auth::user() != null && Auth::user()->tipo == 1): ?>
                         <a href="<?php echo e(route('producto.create')); ?>"
                             class="p-4 mx-7 bg-green-300 font-bold rounded-full hover:bg-green-800">Nuevo Producto</a>
                         <!--Creamos un nuevo producto-->
                     <?php endif; ?>
                 </div>
                 <div class="container">

                     <h2 class="main-title"> OFERTAS DEL DÍA:</h2>
                     <section class="container-products">
                        <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="productCat" id="<?php echo e($item->id); ?>">
                            <img src="<?php echo e(asset($item->foto)); ?>" alt="" class="product__img">
                            <div class="product__description">
                                <h3 class="product__title"><?php echo e($item->nombre); ?></h3>
                                <h4 class="product__cat"><?php echo e($item->categoria->nombre); ?></h4>
                                <span class="product__price"><?php echo e($item->precio); ?>€</span>
                                <span class="product__price">Stock disponible:<?php echo e($item->stock); ?></span>
                            </div>
                            <button class="p-3 mx-4 bg-white-300 font-bold rounded-full hover:bg-green-100">Detalles <i class="product__icon fas fa-cart-plus"></i> </button>
                        </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </section>

                     <?php echo e($productos->links()); ?>

                 </div>
                 <script src="<?php echo e(asset('js/detalleProducto.js')); ?>"></script>
          <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH C:\srv\laravel\supermercado\resources\views/productos/ofertas.blade.php ENDPATH**/ ?>