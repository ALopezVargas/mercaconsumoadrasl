<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Crear Categoria' }}
        </h2>
    </x-slot>
    <div class="container mx-auto p-2 w-4/5 mb-4">
        <form action="{{ route('categorias.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-form-input name="nombre" label="Nombre" placeholder="Nombre..." />


            <x-form-submit>Enviar</x-form-submit>

        </form>
    </div>
</x-app-layout>
