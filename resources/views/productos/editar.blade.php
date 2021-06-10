<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Editar Producto' }}
        </h2>
    </x-slot>
    <x-mensaje-alerta/>
    <div class="container mx-auto p-2 w-4/5 mb-4">
        <form action="{{ route('producto.update',$producto) }}" method="post" enctype="multipart/form-data">
            @csrf
            @bind($producto)<!--Esto completa automaticamente el formulario con los datos que tenía el sujeto a editar-->
            @method('PUT')

            <x-form-input name="nombre" label="Nombre" />
            <x-form-textarea name="descripcion" label="Descripcion" />

            <div class="my-3">
                <label>Categoria </label>
                <select name="categoria_id" class="w-full">
                @foreach ($categorias as $item)<!--Para una única categoría de cada categoria...-->
                    @if ($item->id == $producto->categoria_id)<!--Si el id del item es igual al id del producto-->
                        <option value="{{ $item->id }}" selected>{{ $item->nombre }}</option>
                        <!--Seleccionamos el valor el id de ese item con el nombre previamente seleccionado del mismo item.-->
                    @else<!-- si no...-->
                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                        <!--No realiza ninguna selección, se queda en blanco (no hay selected)-->
                    @endif
                @endforeach
                </select>
            </div>

            <x-form-input type="number" step=".01" name="precio" label="Precio" />
            <x-form-input type="number" name="stock" label="Stock"/>
            <input type="hidden" name="oferta" value="0">
            <x-form-checkbox name="oferta" label="Oferta"/>
            <x-form-input type="file" name="foto" />

            <div class="m-5 rounded-full">
                <img src="{{asset($producto->foto)}}">
            </div>

            <x-form-submit>Enviar</x-form-submit>

        </form>
    </div>
</x-app-layout>
