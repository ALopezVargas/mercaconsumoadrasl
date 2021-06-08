<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administradores</title>
</head>
<body>
    <main>
        <a href="<?php echo e(route('administradores')); ?>"><button><span>Usuarios</span></button></a>
        <a href="<?php echo e(route('administradores', ['prod=1'])); ?>"><button>Productos</button></a>
        <a href="<?php echo e(route('administradores')); ?>"><button>Volver</button></a>
    </main>

</body>
</html>
<?php /**PATH C:\srv\laravel\supermercado\resources\views/usuarios/administradores/menu-admin.blade.php ENDPATH**/ ?>