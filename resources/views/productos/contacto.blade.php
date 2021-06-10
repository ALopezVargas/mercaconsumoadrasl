<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contacto') }}
        </h2>
    </x-slot>
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 h-screen">
            <div class="max-h-96 md:h-screen">
                <img class="w-screen h-screen object-cover object-top" src="/storage/img/a4.jpg" alt="">
              </div>
          <div class="flex bg-gray-100 p-10">
            <div class="mb-auto mt-auto max-w-lg">
                <div class="container">
                    <div class="row">
                        <div >
                            <div class="card">
                                <div class="card-header">
                                    Contáctanos
                                </div>
                                <div class="card-body">
                                     <form method="POST" action="{{route('contacto.submit')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Nombre</label>
                                            <input type="text" name="nombre" class="form-control" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">E-mail</label>
                                            <input type="email" name="email" class="form-control" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="telefono">Teléfono</label>
                                            <input type="text" name="telefono" class="form-control" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="mensaje">Mensaje</label>
                                            <textarea name="mensaje" class="form-control"></textarea>
                                        </div>
                                        <input type="submit" class="btn btn-primary float-right" value="Submit"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>


        </div>
      </div>

</x-app-layout>

