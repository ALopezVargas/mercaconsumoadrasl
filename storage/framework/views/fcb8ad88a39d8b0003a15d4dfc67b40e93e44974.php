<!--Metemos la plantilla para usar una alerta-->
<?php if($text=Session::get('mensaje')): ?><!--Si hay un mensaje mostramos el error, si no no.-->
<div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
    <p class="font-bold">Mensaje de Informacion</p>
    <p class="text-sm"><?php echo e($text); ?>.</p>
</div>
<?php endif; ?>

<!--Este sería el mensaje de error-->
<?php if($text=Session::get('error')): ?><!--Si hay un mensaje mostramos el error, si no no.-->
<div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3" role="alert">
    <p class="font-bold">Mensaje de Error</p>
    <p class="text-sm"><?php echo e($text); ?>.</p>
</div>
<?php endif; ?>
<?php /**PATH C:\srv\laravel\supermercado\resources\views/components/mensaje-alerta.blade.php ENDPATH**/ ?>