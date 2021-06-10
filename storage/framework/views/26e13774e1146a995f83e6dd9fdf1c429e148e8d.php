<!DOCTYPE html>
<?php echo $__env->make('cookieConsent::index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    

    <!--Estilos-->
    <link rel="stylesheet" href="<?php echo e(asset('css/carritocompra.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/estilos.css')); ?>">

    <!--Script-->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

</head>

<body>
    <?php if(Auth::user()!= null && Auth::user()->tipo==1): ?>
                <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <header class="main-header">
        <div class="container container--flex">
            <div class="main-header__container">
                <h1 class="main-header__title">SUPERMERCADO</h1>
                <span class="icon-menu" id="btn-menu"><i class="fas fa-bars"></i></span>
                <nav class="main-nav" id="main-nav">
                    <ul class="menu">
                        <li class="menu__item"><a href="<?php echo e(route('inicio')); ?>" class="menu__link">INICIO</a></li>
                        <li class="menu__item"><a href="<?php echo e(route('ofertas')); ?>" class="menu__link">OFERTAS</a></li>
                        <li class="menu__item"><a href="<?php echo e(route('producto.index')); ?>" class="menu__link">PRODUCTOS</a></li>
                        <li class="menu__item"><a href="<?php echo e(route('sobreNosotros')); ?>" class="menu__link">SOBRE NOSOTROS</a></li>
                        <li class="menu__item"><a href="<?php echo e(route('contacto')); ?>" class="menu__link">CONTACTO</a></li>
                    </ul>
                </nav>
            </div>
            <div class="main-header__container">
                <span class="main-header__txt">¿Necesitas ayuda?</span>
                <p class="main-header__txt"> <i class="fas fa-phone"></i> Llama 1234567890</p>
            </div>
            <div class="main-header__container">
                    <?php if(Route::has('login')): ?>
                        <div class="main-header__link" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            <?php if(auth()->guard()->check()): ?>
                                <a href="<?php echo e(url('/dashboard')); ?>"><?php echo e(Auth::user()->name); ?></a>
                                <form method="POST" action="<?php echo e(route('logout')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.dropdown-link','data' => ['href' => route('logout'),'onclick' => 'event.preventDefault();
                                                        this.closest(\'form\').submit();']]); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('logout')),'onclick' => 'event.preventDefault();
                                                        this.closest(\'form\').submit();']); ?>
                                        <?php echo e(__('Cerrar Sesión')); ?>

                                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                </form>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>">Iniciar Sesión <i class="fas fa-user"></i></a>
                                <?php if(Route::has('register')): ?>
                                    <a href="<?php echo e(route('register')); ?>">Registrarse</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                <a href="<?php echo e(route('carrito.index')); ?>" class="main-header__btn">Carrito <i class="fas fa-shopping-cart"></i></a>

                <div>
                    <div class="mx-auto">
                        <div class="">
                            <form action="<?php echo e(route('producto.index')); ?>" method="GET" role="search">
                                <div class="input-group">
                                    <span class="input-group-btn mr-11 mt-1">
                                        <button class="btn btn-info" type="submit" title="Buscar Productos">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </span>
                                    <span class="input-group-btn ml-11">
                                        <button class="btn btn-danger" type="button" title="Refrescar">
                                            <span class="fas fa-sync-alt"></span>
                                        </button>
                                    </span>
                                    <input type="text" class="main-header__input" name="term" placeholder="Buscar..." id="term">
                                    <a href="<?php echo e(route('producto.index')); ?>" class="main-header__input">

                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </header>
<main>
    <?php echo e($slot); ?>

</main>
<footer class="main-footer">
<div class="footer__section">
    <h2 class="footer_title">Sobre Nosotros</h2>
    <p class="footer_txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
         Consequuntur optio molestiae recusandae ut quis? Odit, et sed porro velit
         id cum officiis quidem quasi quis? Maiores doloribus molestiae dignissimos blanditiis!</p>
</div>
<div class="footer__section">
    <h2 class="footer__title">Localización</h2>
    <p class="footer__txt"> Calle XXXX , Nº 8 , 04xx0 , España , Almería</p>
    <h2 class="footer__title">Contacto</h2>
    <p class="footer__txt">Teléfono: +34123123123</p>
</div>
<div class="footer__section">
    <h2 class="footer__title">Enlaces Rápidos</h2>
    <a href="<?php echo e(route('inicio')); ?>" class="footer__link">Inicio</a>
    <a href="<?php echo e(route('ofertas')); ?>" class="footer__link">Ofertas</a>
    <a href="<?php echo e(route('producto.index')); ?>" class="footer__link">Productos</a>
    <a href="<?php echo e(route('sobreNosotros')); ?>" class="footer__link">Sobre Nosotros</a>
    <a href="<?php echo e(route('contacto')); ?>"  class="footer__link">Contacto</a>
</div>
<div class="footer__section">
   <h2 class="footer__title">Subscríbete a las ofertas</h2>
   <p class="footer__txt">Recibe las últimas novedades al subscribirte a nuestro boletín bisemanal.</p>

   <form method="POST" action="<?php echo e(route('contacto.submit')); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <input type="email" class="footer__input" placeholder="Introduce tu e-mail aquí.">
   </form>
</div>
<p class="copy">© 2021 Antonio López. Todos los derechos reservados. | Diseñado por Antonio López</p>
</footer>

    <script src="<?php echo e(asset('js/menu.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\srv\laravel\supermercado\resources\views/layouts/app.blade.php ENDPATH**/ ?>