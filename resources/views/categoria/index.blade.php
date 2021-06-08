<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Gestion de categorias' }}
        </h2>
    </x-slot>
    <div class="container mx-auto p-2 w-4/5 mb-4">
        <x-mensaje-alerta/>

        <div class="my-2">
            <a href="{{route('categorias.create')}}" class="p-2 mx-2 bg-green-800 text-white font-bold rounded-full hover:bg-green-200">Nueva categoria</a>
        </div>

        <table class="table-auto mt-2">
            <thead>
                <tr>
                    <th>Detalles</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $item)
                    <tr>
                        <td class="p-4">
                            <a href="{{route('categorias.show', $item)}}" class="p-2 bg-yellow-300 font-bold rounded hover:bg-yellow-800">
                            <i class="fas fa-info"></i> Detalles</a>
                        </td>
                        <td class="p-4">{{$item->nombre}}</td>
                        <td class="p-4">
                            <form action="{{route('categorias.destroy', $item)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('categorias.edit', $item)}}" class="p-2 bg-blue-300 font-bold rounded hover:bg-blue-800">Editar</a>
                                <button type="submit" class="p-2 bg-red-800 text-white font-bold rounded hover:bg-red-600">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$categorias->links()}}
    </div>
</x-app-layout>
