<!DOCTYPE html>
@include('cookieConsent::index')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tienda Supermercado</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">


    <link rel="stylesheet" href="{{ asset('css/carritocompra.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/estilos.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{asset('storage/img/logoP.jpg')}}">

</head>

<body>


    <header class="main-header">
        <div class="container container--flex">
            <div class="main-header__container">
                <h1 class="main-header__title">SUPERMERCADO</h1>
                <span class="icon-menu" id="btn-menu"><i class="fas fa-bars"></i></span>
                <nav class="main-nav" id="main-nav">
                    <ul class="menu">
                        <li class="menu__item"><a href="{{route('inicio')}}" class="menu__link">INICIO</a></li>
                        <li class="menu__item"><a href="{{route('ofertas')}}" class="menu__link">OFERTAS</a></li>
                        <li class="menu__item"><a href="{{route('producto.index')}}" class="menu__link">PRODUCTOS</a></li>
                        <li class="menu__item"><a href="{{route('sobreNosotros')}}" class="menu__link">SOBRE NOSOTROS</a></li>
                        <li class="menu__item"><a href="{{route('contacto')}}" class="menu__link">CONTACTO</a></li>
                    </ul>
                </nav>
            </div>
            <div class="main-header__container">
                <span class="main-header__txt">¿Necesitas ayuda?</span>
                <p class="main-header__txt"> <i class="fas fa-phone"></i> Llama 1234567890</p>
            </div>
            <div class="main-header__container">
                @if (Route::has('login'))
                    <div class="main-header__link" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/dashboard') }}">{{Auth::user()->name}}</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Cerrar Sesión') }}
                                </x-dropdown-link>
                            </form>
                            @else
                                <a href="{{ route('login') }}" class="main-header__link">Iniciar Sesión <i class="fas fa-user"></i></a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="main-header__link">Registrarse</a>
                                @endif
                            @endauth
                            <a href="{{route('carrito.index')}}" class="main-header__btn">Carrito <i class="fas fa-shopping-cart"></i></a>

                        </div>
                    @endif
                <div>
                    <div class="mx-auto">
                        <div class="">
                            <form action="{{ route('producto.index') }}" method="GET" role="search">
                                <div class="input-group">
                                    <span class="input-group-btn mr-10 mt-1">
                                        <button class="btn btn-info" type="submit" title="Buscar Productos">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </span>
                                    <span class="input-group-btn ml-10">
                                        <button class="btn btn-danger" type="button" title="Refrescar">
                                            <span class="fas fa-sync-alt"></span>
                                        </button>
                                    </span>
                                    <input type="text" class="main-header__input" name="term" placeholder="Buscar..." id="term">
                                    <a href="{{ route('producto.index') }}" class="main-header__input">

                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <x-mensaje-alerta></x-mensaje-alerta>
    <div class="container-slider">
        <div class="slider" id="slider">
            <div class="slider__section">
                <img src="{{asset('storage/img/a1.jpg')}}" alt="" class="slider__img">
                <div class="slider__content">
                    <h2 class="slider__title">Texto 1</h2>
                    <p class="slider__txt">Parrafo 1</p>
                    <a href="" class="btn-shop">PRODUCTOS</a>
                </div>
            </div>
            <div class="slider__section">
                <img src="{{asset('storage/img/a2.jpg')}}" alt="" class="slider__img">
                <div class="slider__content">
                    <h2 class="slider__title">Texto 2</h2>
                    <p class="slider__txt">Parrafo 2</p>
                    <a href="" class="btn-shop">COMPRAR</a>
                </div>
            </div>
            <div class="slider__section">
                <img src="{{asset('storage/img/a3.jpg')}}" alt="" class="slider__img">
                <div class="slider__content">
                    <h2 class="slider__title">Texto 3</h2>
                    <p class="slider__txt">Parrafo 3</p>
                    <a href="" class="btn-shop">COMPRAR</a>
                </div>
            </div>
            <div class="slider__section">
                <img src="{{asset('storage/img/a4.jpg')}}" alt="" class="slider__img">
                <div class="slider__content">
                    <h2 class="slider__title">Texto 4</h2>
                    <p class="slider__txt">Parrafo 4</p>
                    <a href="" class="btn-shop">COMPRAR</a>
                </div>
            </div>
        </div>
        <div class="container">
        <div class="slider__btn slider__btn--right" id="btn-right">&#62;</div>
        <div class="slider__btn slider__btn--left" id="btn-left">&#60;</div>
        </div>
    </div>
    <div class="container">
        <h2 class="main-title"> OFERTAS DEL DÍA:</h2>
        <section class="container-products">
            @foreach($productos as $item)
            <div class="productCat" id="{{$item->id}}">
                <img src="{{asset($item->foto)}}" alt="" class="product__img">
                <div class="product__description">
                    <h3 class="product__title">{{$item->nombre}}</h3>
                    <h4 class="product__cat">{{$item->categoria->nombre}}</h4>
                    <span class="product__price">{{$item->precio}}€</span>
                    <span class="product__price">Stock disponible:{{$item->stock}}</span>
                </div>
                <button class="p-3 mx-4 bg-white-300 font-bold rounded-full hover:bg-green-100">Detalles <i class="product__icon fas fa-cart-plus"></i> </button>
            </div>
            @endforeach
        </section>
        {{ $productos->links() }}
    <main class="main">

        <section class="container__testimonials">
            <h2 class="section__title">Comentarios Destacados</h2>
            <h3 class="testimonial__title">EjemploComentario</h3>
            <p class="testimonial__txt">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Obcaecati dolor atque libero officiis a corporis quae earum adipisci voluptatem dolorum
                exercitationem consequuntur nihil labore, enim porro, sunt esse ullam explicabo!
            </p>
        </section>

        <div class="container-editor">
            <div class="editor__item">
                <img src="{{asset('storage/img/novedades.png')}}" alt="" class="editor__img">
                <p class="editor__circle">Lo más reciente</p>
            </div>
            <div class="editor__item">
                <img src="{{asset('storage/img/sobrenosotros.jpg')}}" alt="" class="editor__img">
                <p class="editor__circle">¡Conócenos!</p>
            </div>
        </div>
        <section class="container-tips">
            <div class="tip">
                <i class="fas fa-hand-paper"></i>
                <h2 class="tip__title">Recógelo en la tienda</h2>
                <p class="tip__txt">Podrás recoger todos los productos y pagar en el establecimiento.</p>
                <a href="{{route('producto.index')}}" class="btn-shop">CATÁLOGO</a>
            </div>
            <div class="tip">
                <i class="fas fa-rocket"></i>
                <h2 class="tip__title">Rápido y eficaz</h2>
                <p class="tip__txt">Tan solo a unos clics de distancia de tu compra, también enviamos a domicilio.</p>
                <a href="{{route('producto.index')}}" class="btn-shop">CATÁLOGO</a>
            </div>
            <div class="tip">
                <i class="fas fa-cog"></i>
                <h2 class="tip__title">Sencillo e intuitivo</h2>
                <p class="tip__txt">Interfaz simple para que cualquier persona de cualquier edad pueda realizar su compra.</p>
                <a href="{{route('producto.index')}}" class="btn-shop">CATÁLOGO</a>
            </div>
        </section>
    </div>
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
    <a href="{{route('inicio')}}" class="footer__link">Inicio</a>
    <a href="{{route('ofertas')}}" class="footer__link">Ofertas</a>
    <a href="{{route('producto.index')}}" class="footer__link">Productos</a>
    <a href="{{route('sobreNosotros')}}" class="footer__link">Sobre Nosotros</a>
    <a href="{{route('contacto')}}"  class="footer__link">Contacto</a>
</div>
<div class="footer__section">
   <h2 class="footer__title">Subscríbete a las ofertas</h2>
   <p class="footer__txt">Recibe las últimas novedades al subscribirte a nuestro boletín bisemanal.</p>
   <form method="POST" action="{{route('contacto.submit')}}" enctype="multipart/form-data">
    @csrf
    <input type="email" class="footer__input" placeholder="Introduce tu e-mail aquí.">
   </form></div>
<p class="copy">© 2021 Antonio López. Todos los derechos reservados. | Diseñado por Antonio López</p>
</footer>

    <script src="{{asset('js/detalleProducto.js')}}"></script>
    <script src="{{asset('js/galeria.js')}}"></script>
    <script src="{{asset('js/menu.js')}}"></script>

</body>
</html>
