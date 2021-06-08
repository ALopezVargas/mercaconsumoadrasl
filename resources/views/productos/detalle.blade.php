<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Detalle de producto' }}
        </h2>
    </x-slot>
    <div class="m-auto px-4 py-8 max-w-xl">
        <div class="bg-white shadow-2xl">
            <div>
               <img src="{{asset($producto->foto)}}">
            </div>
            <div class="flex justify-center md:justify-end -mt-16">
                <img class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500" src="{{asset($producto->categoria->imagen)}}">
                </div>
            <div class="px-4 py-2 mt-2 bg-white">
                <h2 class="font-bold text-2xl text-gray-800">{{$producto->nombre}}</h2>
                <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">
                    {{$producto->descripcion}}
                <p class="bold text-gray-700 px-2 mr-1 my-3">
                    Categoría: {{$producto->categoria->nombre}}<br>
                    En oferta:@if($producto->oferta == false)
                    <td class="p-4">No</td>
                    @else
                    <td class="p-4"><span>Si</span></td>
                    @endif
                </p>
                <div class="flex grid-cols-3">
                    <a href="" class="p-3 mx-2 bg-green-200 font-bold rounded hover:bg-green-300">
                    Añadir al cesto
                    </a>
                    <a href="{{route('mostrarProductos',$producto->categoria_id)}}"
                    class="p-3 mx-1 bg-yellow-300 font-bold rounded hover:bg-yellow-800">
                    Total productos de {{$producto->categoria->nombre}}</a>
                    <a href="{{route('producto.index')}}" class="p-3 mx-1 bg-blue-300 font-bold rounded hover:bg-blue-800">
                    Volver</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
