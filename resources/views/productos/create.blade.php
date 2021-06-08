<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Crear Productos' }}
        </h2>
    </x-slot>
    <div class="container mx-auto p-2 w-4/5 mb-4">
        <form action="{{ route('producto.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-form-input name="nombre" label="Nombre" placeholder="Nombre..." />
            <x-form-textarea name="descripcion" label="Descripcion" placeholder="Descripcion..." />

            <div class="my-3">
                <label>Categoria </label>
                <select name="categoria_id" class="w-full">
                    @foreach ($categorias as $item)
                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <x-form-input type="number" name="precio" label="Precio" placeholder="Precio..." /><br>
            <input type="hidden" name="oferta" value="0">
            <x-form-checkbox name="oferta" label="Oferta"/>
            <x-form-input type="file" name="foto" />

            <x-form-submit>Enviar</x-form-submit>

        </form>
    </div>
</x-app-layout>
