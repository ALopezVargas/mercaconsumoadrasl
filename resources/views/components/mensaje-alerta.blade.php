<!--Metemos la plantilla para usar una alerta-->
@if ($text=Session::get('mensaje'))<!--Si hay un mensaje mostramos el error, si no no.-->
<div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
    <p class="font-bold">Mensaje de Informacion</p>
    <p class="text-sm">{{$text}}.</p>
</div>
@endif

<!--Este sería el mensaje de error-->
@if ($text=Session::get('error'))<!--Si hay un mensaje mostramos el error, si no no.-->
<div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3" role="alert">
    <p class="font-bold">Mensaje de Error</p>
    <p class="text-sm">{{$text}}.</p>
</div>
@endif
