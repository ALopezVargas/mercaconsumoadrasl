<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Admin zone')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12" style="background: url(<?php echo e(asset('storage/fondologo1.png')); ?>) fixed">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.alert-message2','data' => []]); ?>
<?php $component->withName('alert-message2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
                    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
                    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

                    <style>
                        table a{
                            color: black;
                        }

                        table a:last-child{
                            color: #FF1731;
                        }
                    </style>

                    <div class="container" style="overflow-x:scroll">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Foto</th>
                                    <th>Precio</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                        </table>

                    </div>
                    <script>

                        $(document).ready(function() {
                            $('#example').DataTable({
                                "serverSide":true,
                                "ajax":"<?php echo e(url('api/products')); ?>",
                                "columns":[
                                    {data:'id'},
                                    {data:'nombre'},
                                    {data:'foto'},
                                    {data:'precio'},
                                    {data:'btn'},
                                ],
                                "language":{
                                    "info": "_TOTAL_ productos",
                                    "search":"Buscar",
                                    "paginate":{
                                        "next": "Siguiente",
                                        "previous": "Anterior"
                                    },
                                    "lengthMenu": 'Mostrar <select>'+
                                        '<option>10</option>'+
                                        '<option value="25" selected>25</option>'+
                                        '<option value="50">50</option>'+
                                        '<option value="100">100</option>'+
                                        '<option value="200">200</option>'+
                                        '<option value="-1">Todos</option>'+
                                        '</select> productos',
                                    "loadingRecords": "Cargando...",
                                    "procesing": "Procesando...",
                                    "emptyTable":"No hay datos",
                                    "infoEmpty":"",
                                    "infoFiltered":"",
                                    "zeroRecords":"No hay coincidencias con esas características"
                                }

                            });
                        } );
                    </script>
                </div>
            </div>
        </div>
    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH C:\srv\laravel\supermercado\resources\views/usuarios/administradores/dt-productos.blade.php ENDPATH**/ ?>