<?php
include("../../app/config.php"); //para tener conexion a base de datos.
include("../../admin/layout/parte1.php");

// Verifica si el usuario tiene un rol permitido para acceder a esta página 
//siempre debajo de parte1.php porque la sesion esta inicia ahi 
$roles_permitidos = array(
    'ADMINISTRADOR',
    'Recepcionista',
    'Cliente'
);

// Verifica si el rol del usuario está permitido
if (!isset($_SESSION['rol']) || !in_array($_SESSION['rol'], $roles_permitidos)) {
?>

    <div class="container-fluid">
        <div class="alert alert-danger mt-3" role="alert">
            <h4 class="alert-heading">Acceso denegado</h4>
            <p>No tienes permisos suficientes para acceder a esta página. Por favor, contacta al administrador.</p>
        </div>
    </div>

<?php
    // Si el rol del usuario no está permitido, cierra la sesión y redirige al login
    session_unset(); // Elimina todas las variables de sesión
    session_destroy(); // Destruye la sesión
    header('Location: ' . $URL . '/login'); // Redirige al login
    exit; // Detiene la ejecución del script
}
?>

<?php if ($_SESSION['rol'] == 'ADMINISTRADOR' || $_SESSION['rol'] == 'Recepcionista') : ?>
    <?php include("../../app/controllers/facturas_controllers/facturas.php"); ?>
    <br>
    <div class="container-fluid">
        <h1>Lista de Facturas</h1>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Facturas Registradas</b></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-striped table-bordered table-hover mb-4">
                            <thead>
                                <tr class="text-center">
                                    <th>ID Factura</th>
                                    <th>ID cliente</th>
                                    <th>Rut cliente</th>
                                    <th>Nombre cliente</th>
                                    <th>Apellido cliente</th>
                                    <th>Valor total</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 0;
                                foreach ($items as $item) {
                                    $contador++;
                                    $id = $item['id'];
                                ?>
                                    <tr class="text-center">
                                        <td><?php echo $item['id']; ?></td>
                                        <td><?php echo $item['cliente_id']; ?></td>
                                        <td><?php echo $item['cliente_rut']; ?></td>
                                        <td><?php echo $item['cliente_nombre']; ?></td>
                                        <td><?php echo $item['cliente_apellido']; ?></td>
                                        <td><?php echo $item['total']; ?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="ver_factura.php?id=<?php echo $id; ?>" class="btn btn-info"><i class="bi bi-eye-fill"></i> Ver</a>
                                                <?php if ($_SESSION['rol'] == 'ADMINISTRADOR') : ?>
                                                    <a href="delete_factura.php?id=<?php echo $id; ?>" type="button" class="btn btn-danger"><i class="bi bi-trash3-fill"></i> Eliminar</a>
                                                <?php endif; ?>
                                            </div>
                                        </td>

                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if ($_SESSION['rol'] == 'Cliente') : ?>
    <?php include("../../app/controllers/facturas_controllers/facturasCliente.php"); ?>
    <?php if (count($facturas_cliente) > 0) : ?>
        <br>
        <div class="container-fluid">
            <h1>Lista de Facturas</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b>Facturas Registradas a su nombre.</b></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover mb-4">
                                <thead>
                                    <tr class="text-center">
                                        <th>ID Factura</th>
                                        <th>Rut cliente</th>
                                        <th>Valor total</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($facturas_cliente as $factura_cliente) {
                                        $contador++;
                                        $id = $factura_cliente['factura_id'];
                                    ?>
                                        <tr class="text-center">
                                            <td><?php echo $factura_cliente['factura_id']; ?></td>
                                            <td><?php echo $factura_cliente['usuario_rut']; ?></td>
                                            <td><?php echo $factura_cliente['factura_total']; ?></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="ver_factura.php?id=<?php echo $id; ?>" class="btn btn-info"><i class="bi bi-eye-fill"></i> Ver</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="container-fluid">
            <div class="alert alert-warning mt-3" role="alert">
                <h4 class="alert-heading">No hay Facturas registradas</h4>
                <p>No se encontraron facturas registradas para tu cuenta,
                    porfavor pongase en contacto con soporte.
                </p>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>




<?php
include("../../admin/layout/parte2.php");
include("../../admin/layout/mensaje.php");
?>
<script>
    $(function() {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ productos",
                "infoEmpty": "Mostrando 0 a 0 de 0 productos",
                "infoFiltered": "(Filtrado de _MAX_ total productos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ productos",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": [{
                    extend: "collection",
                    text: "Reportes",
                    buttons: [{
                            extend: "copy",
                            text: "Copiar"
                        },
                        {
                            extend: "pdf",
                            text: "PDF"
                        },
                        {
                            extend: "csv",
                            text: "CSV"
                        },
                        {
                            extend: "excel",
                            text: "Excel"
                        },
                        {
                            extend: "print",
                            text: "Imprimir"
                        }
                    ]
                },
                {
                    extend: "colvis",
                    text: "Visor de columnas"
                }
            ]
        }).buttons().container().appendTo("#example1_wrapper .col-md-6:eq(0)");
    });
</script>