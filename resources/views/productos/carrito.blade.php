<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Gestion de Productos' }}
        </h2>
    </x-slot>
    <div class="container mx-auto p-2 w-4/5 mb-4">
        <x-mensaje-alerta/>
<!--Items del carrito-->
<div class="small-container cart-page">
    <form action="{{route('carrito.update')}}" method="POST" >
        @csrf
    <table>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Sub-Total</th>
        </tr>
        @foreach ($carrito as $item)
        <tr>

            <td>
                <div class="cart-info">
                    <img src="{{asset($item->producto->foto)}}" alt="">
                    <div>{{$item->producto->nombre}} | </div> {{--nombre del item--}}
                    <small class="precio"> {{$item->producto->precio}} -  </small><br>

                </div>
            </td>
            <input type="hidden" value={{$item->id}} name="carrito{{$item->id}}[id]">
            <input type="hidden" value="{{$item->producto->id}}" name="carrito{{$item->id}}[producto]">
            <td><input type="number" class="cantidad" value="{{$item->cantidad}}" name="carrito{{$item->id}}[cantidad]"></td>

            <td>{{$item->producto->precio * $item->cantidad}}</td>
        </tr>
        @endforeach
    </table>
    <button type="submit" class="carrito-btn">Actualizar Carrito</button>
    </form>
    <form method="POST" action="{{route('carrito.borrarUno')}}" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn__fin">Borrar Carrito</button>
    </form>

    <div class="precio-total">
        <table>
            <tr>
                <td>Subtotal (IVA Inc)</td>
                <td>{{$precioTotal}}</td>
            </tr>
            </tr>
        </table>
    </div>
    <form id="finDeCompra" method="POST" action="{{route('carrito.destroy')}}" enctype="multipart/form-data">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn__final" id="btnFinalizar">Finalizar Compra</button>
    </form>
</div>
<script src="{{asset('js/finalizarCompra.js')}}"></script>
</x-app-layout>
