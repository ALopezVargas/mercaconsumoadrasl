<!DOCTYPE html>
@include('cookieConsent::index')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!--Estilos-->
    <link rel="stylesheet" href="{{ asset('css/carritocompra.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/estilos.css') }}">

    <!--Script-->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body>
    @if(Auth::user()!= null && Auth::user()->tipo==1)
                @include('layouts.navigation')
    @endif
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
                <span class="main-header__txt">??Necesitas ayuda?</span>
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
                                        {{ __('Cerrar Sesi??n') }}
                                    </x-dropdown-link>
                                </form>
                            @else
                                <a href="{{ route('login') }}">Iniciar Sesi??n <i class="fas fa-user"></i></a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Registrarse</a>
                                @endif
                            @endauth
                        </div>
                    @endif

                <a href="{{route('carrito.index')}}" class="main-header__btn">Carrito <i class="fas fa-shopping-cart"></i></a>

                <div>
                    <div class="mx-auto">
                        <div class="">
                            <form action="{{ route('producto.index') }}" method="GET" role="search">
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
                                    <a href="{{ route('producto.index') }}" class="main-header__input">

                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{--test--}}
            </div>
        </div>
    </header>
<main>
    {{ $slot }}
</main>
<footer class="main-footer">
<div class="footer__section">
    <h2 class="footer_title">Sobre Nosotros</h2>
    <p class="footer_txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
         Consequuntur optio molestiae recusandae ut quis? Odit, et sed porro velit
         id cum officiis quidem quasi quis? Maiores doloribus molestiae dignissimos blanditiis!</p>
</div>
<div class="footer__section">
    <h2 class="footer__title">Localizaci??n</h2>
    <p class="footer__txt"> Calle XXXX , N?? 8 , 04xx0 , Espa??a , Almer??a</p>
    <h2 class="footer__title">Contacto</h2>
    <p class="footer__txt">Tel??fono: +34123123123</p>
</div>
<div class="footer__section">
    <h2 class="footer__title">Enlaces R??pidos</h2>
    <a href="{{route('inicio')}}" class="footer__link">Inicio</a>
    <a href="{{route('ofertas')}}" class="footer__link">Ofertas</a>
    <a href="{{route('producto.index')}}" class="footer__link">Productos</a>
    <a href="{{route('sobreNosotros')}}" class="footer__link">Sobre Nosotros</a>
    <a href="{{route('contacto')}}"  class="footer__link">Contacto</a>
</div>
<div class="footer__section">
   <h2 class="footer__title">Subscr??bete a las ofertas</h2>
   <p class="footer__txt">Recibe las ??ltimas novedades al subscribirte a nuestro bolet??n bisemanal.</p>

   <form method="POST" action="{{route('contacto.submit')}}" enctype="multipart/form-data">
    @csrf
    <input type="email" class="footer__input" placeholder="Introduce tu e-mail aqu??.">
   </form>
</div>
<p class="copy">?? 2021 Antonio L??pez. Todos los derechos reservados. | Dise??ado por Antonio L??pez</p>
</footer>

    <script src="{{asset('js/menu.js')}}"></script>
</body>
</html>
