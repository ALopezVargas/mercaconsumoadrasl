<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/categoriesslider.css') }}">
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

            <h2 class="main-title"> CATÁLOGO:</h2>

            @guest
            <section class="container-products">
                @foreach($productos as $item)
                <div class="productCat" id="{{$item->id}}">
                    <img src="{{asset($item->foto)}}" alt="" class="product__img">
                    <div class="product__description">
                        <h3 class="product__title">{{$item->nombre}}</h3>
                        <h4 class="product__cat">{{$item->categoria->nombre}}</h4>
                        <span class="product__price">{{$item->precio}}€</span>
                    </div>
                    <button class="p-3 mx-4 bg-white-300 font-bold rounded-full hover:bg-green-100">Detalles <i class="product__icon fas fa-cart-plus"></i> </button>
                </div>
                @endforeach
            </section>
            @endguest

            @auth
            @if(Auth::user()->tipo!=1)
            <section class="container-products">
                @foreach($productos as $item)
                <div class="productCat" id="{{$item->id}}">
                    <img src="{{asset($item->foto)}}" alt="" class="product__img">
                    <div class="product__description">
                        <h3 class="product__title">{{$item->nombre}}</h3>
                        <h4 class="product__cat">{{$item->categoria->nombre}}</h4>
                        <span class="product__price">{{$item->precio}}€</span>
                    </div>
                    <button class="p-3 mx-4 bg-blue-300 font-bold rounded-full hover:bg-blue-800">>Comprar </button><i class="product__icon fas fa-cart-plus"></i>
                </div>
                @endforeach
            </section>
            @endif
            @endauth



            @if(Auth::user()!= null && Auth::user()->tipo==1)
            <table class="mt-2">
                <thead>
                    <tr>
                        <th>Detalles</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Categoria</th>
                        <th>Precio</th>
                        <th>Oferta</th>
                        @if(Auth::user()!= null && Auth::user()->tipo==1)<th>Acciones</th>@endif
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $item)
                    <tr>
                        <td class="p-1"><a href="{{route('producto.show',$item)}}"
                            class="p-3 mx-2 bg-blue-300 font-bold rounded-full hover:bg-blue-800">Detalles</a></td>

                        <td class="p-4">{{$item->nombre}}</td>
                        <td class="p-4">{{$item->descripcion}}</td>
                        <td class="p-4">{{$item->categoria->nombre}}</td>
                       <td class="p-4">{{$item->precio}}</td>
                        @if($item->oferta == false)
                        <td class="p-4">No</td>
                        @else
                        <td class="p-4"><span class="p-2 mx-2 bg-yellow-300">Si</span></td>
                        @endif
                        <td class="imagenIndex p-4"><img src="{{asset($item->foto)}}"></td>
                        <td class="p-4">
                            @if(Auth::user()!= null && Auth::user()->tipo==1)
                            <form action="{{route('producto.destroy',$item)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <div class="flex grid-cols-2">
                                    <a class="p-3 mx-1 bg-yellow-300 font-bold rounded hover:bg-yellow-800" href="{{route('producto.edit',$item)}}">Editar</a>
                                <button type="submit" class="p-2 bg-red-300 font-bold rounded hover:bg-red-600">
                                    Eliminar
                                </button>
                                </div>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @endif
        {{$productos->links()}}
    </div>
    <script src="{{asset('js/detalleProducto.js')}}"></script>
</x-app-layout>
