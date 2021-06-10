         <x-app-layout>
             <link rel="stylesheet" href="{{ asset('css/slidercss.css') }}">
             <x-slot name="header">
                 <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                     {{ 'Gestion de Productos' }}
                 </h2>

             </x-slot>
             <div class="container mx-auto p-2 w-4/5 mb-4">
                 <x-mensaje-alerta />
                 <div class="my-2 p-2">
                     <hr>
                     @if (Auth::user() != null && Auth::user()->tipo == 1)
                         <a href="{{ route('producto.create') }}"
                             class="p-4 mx-7 bg-green-300 font-bold rounded-full hover:bg-green-800">Nuevo Producto</a>
                         <!--Creamos un nuevo producto-->
                     @endif
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
                 </div>
                 <script src="{{asset('js/detalleProducto.js')}}"></script>
         </x-app-layout>
