<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Detalle de categorias' }}
        </h2>
    </x-slot>
    <div class="m-auto px-4 py-8 max-w-xl">
        <div class="p-8 bg-white shadow-2xl">

            <div class="px-4 py-2 mt-2 bg-white">

                <h2 class="p-4 content-center font-bold text-2xl text-gray-800">Tipo de Categoría: {{$categoria->nombre}}</h2>
                <img src="{{asset($categoria->imagen)}}"/>
                <a href="{{route('categorias.index')}}" class="mt-5 p-2 bg-blue-500 font-bold rounded hover:bg-yellow-300">Volver</a>
            </div>
        </div>
    </div>
</x-app-layout>
