<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{'Productos de '.$nombreCategoria}}
        </h2>
    </x-slot>
    <div class="container mx-auto p-2 w-4/5 mb-4">
        <x-mensaje-alerta/>

        <div class="mt-5 p-2">
            <a href="{{route('producto.index')}}" class="p-4 mx-7 bg-gray-300 font-bold rounded-full hover:bg-gray-800">Volver</a>
        </div>
        <table class="table-auto mt-2">
            <thead>
                <tr>
                    <th>Detalles</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Categoria</th>
                    <th>Precio</th>
                    <th>Oferta</th>
                    <th>Foto</th>
                    <th>Stock</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $item)
                <tr>
                    <td class="p-4"><a href="{{route('producto.show',$item)}}"
                        class="p-5 mx-5 bg-yellow-300 font-bold rounded-full hover:bg-yellow-800">Detalles</a></td>

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
                    <td class="p-4">{{$item->stock}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
        {{$productos->links()}}
    </div>
</x-app-layout>
