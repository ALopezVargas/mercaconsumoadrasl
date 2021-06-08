         <x-app-layout>
            <link rel="stylesheet" href="{{ asset('css/slidercss.css') }}">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ 'Gestion de Productos' }}
                </h2>
            </x-slot>
            <div class="container mx-auto p-2 w-4/5 mb-4">
                <x-mensaje-alerta/>
                <div class="my-2 p-2"><hr>
                    @if(Auth::user()!= null && Auth::user()->tipo==1)
                        <a href="{{route('producto.create')}}" class="p-4 mx-7 bg-green-300 font-bold rounded-full hover:bg-green-800">Nuevo Producto</a><!--Creamos un nuevo producto-->
                    @endif
                </div>
                <div class="container">

                    <section class="categories-slider-component">
                        <h3 class="main-title">
                            Categorías de nuestro supermercado</h3>
                        <ul class="categories-list">
                            <li class="item">
                                    <a href="" class="btn-category">
                                        <span class="iconoCat platos-preparados"></span>
                                        <span class="category-name">Platos Preparados</span>
                                    </a>
                                </li>
                            <li class="item">
                                    <a href="" class="btn-category">
                                        <span class="iconoCat al-dia"></span>
                                        <span class="category-name">Al Día</span>
                                    </a>
                                </li>
                            <li class="item">
                                    <a href="" class="btn-category">
                                        <span class="iconoCat despensa"></span>
                                        <span class="category-name">Despensa</span>
                                    </a>
                                </li>
                            <li class="item">
                                    <a href="" class="btn-category">
                                        <span class="iconoCat mascotas"></span>
                                        <span class="category-name">Mascotas</span>
                                    </a>
                                </li>
                            <li class="item">
                                    <a href="" class="btn-category">
                                        <span class="iconoCat bebe"></span>
                                        <span class="category-name">Bebé</span>
                                    </a>
                                </li>
                            <li class="item">
                                    <a href="" class="btn-category">
                                        <span class="iconoCat cuidado-del-hogar"></span>
                                        <span class="category-name">Cuidado del Hogar</span>
                                    </a>
                                </li>
                            <li class="item">
                                    <a href="" class="btn-category">
                                        <span class="iconoCat cuidado-personal"></span>
                                        <span class="category-name">Cuidado Personal</span>
                                    </a>
                                </li>
                            <li class="item">
                                    <a href="" class="btn-category">
                                        <span class="iconoCat bebidas"></span>
                                        <span class="category-name">Bebidas</span>
                                    </a>
                                </li>
                            <li class="item">
                                    <a href="" class="btn-category">
                                        <span class="iconoCat bodega"></span>
                                        <span class="category-name">Bodega</span>
                                    </a>
                                </li>
                            <li class="item">
                                    <a href="" class="btn-category">
                                        <span class="iconoCat congelados"></span>
                                        <span class="category-name">Congelados</span>
                                    </a>
                                </li>
                            </ul>
                    </section>

                    <h2 class="main-title"> OFERTAS DEL DÍA:</h2>
        <section class="container-products">
            @foreach ($productos as $item )
            <div class="product">
                <img src="{{asset($item->foto)}}" alt="" class="product__img">
                    <div class="product__description">
                        <h3 class="product__title">{{$item->nombre}}</h3>
                        <h4 class="product__cat">{{$item->categoria->nombre}}</h4>
                        <span class="product__price">{{$item->precio}}€</span>
                </div>
                <i class="product__icon fas fa-cart-plus"></i>
            </div>
            @endforeach
        </section>
                {{$productos->links()}}
            </div>
        </x-app-layout>
