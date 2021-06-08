<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Editar Categoria' }}
        </h2>
    </x-slot>
    <div class="container mx-auto p-2 w-4/5 mb-4">
        <form action="{{ route('categorias.update',$categoria) }}" method="post" enctype="multipart/form-data">
            @csrf
            @bind($categoria)<!--Esto completa automaticamente el formulario con los datos que tenía el sujeto a editar-->
            @method('PUT')

            <x-form-input name="nombre" label="Nombre" />

            <x-form-submit>Enviar</x-form-submit>

        </form>
    </div>
</x-app-layout>
