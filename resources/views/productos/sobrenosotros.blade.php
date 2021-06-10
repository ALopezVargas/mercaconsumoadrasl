<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sobre Nosotros') }}
        </h2>
    </x-slot>
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 h-screen">

          <div class="flex bg-gray-100 p-10">
            <div class="mb-auto mt-auto max-w-lg">
              <h1 class="text-3xl uppercase">Supermercado</h1>
              <p class="font-semibold mb-5">Tu tienda de barrio</p>
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.
                  Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p><br>
              <a href="{{route('contacto')}}" class="bg-black rounded-md py-3 px-7 mt-6 text-white">Contáctanos</a>
            </div>
          </div>

          <div class="max-h-96 md:h-screen">
            <img class="w-screen h-screen object-cover object-top" src="/storage/img/a1.jpg" alt="">
          </div>
        </div>
      </div>

</x-app-layout>

