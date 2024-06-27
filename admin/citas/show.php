<?php
include("../../app/config.php");
include("../../admin/layout/parte1.php");

// Verifica si el reserva tiene un rol permitido para acceder a esta página 
//siempre debajo de parte1.php porque la sesion esta inicia ahi 
$roles_permitidos = array(
    'ADMINISTRADOR',
    'Recepcionista',
    'Veterinario',
    'Cliente'

);

// Verifica si el rol del reserva está permitido
if (!isset($_SESSION['rol']) || !in_array($_SESSION['rol'], $roles_permitidos)) {
    // Si el rol del reserva no está permitido, cierra la sesión y redirige al login
    session_unset(); // Elimina todas las variables de sesión
    session_destroy(); // Destruye la sesión
    header('Location: ' . $URL . '/login'); // Redirige al login
    exit; // Detiene la ejecución del script
}
?>

<?php if ($_SESSION['rol'] == 'ADMINISTRADOR' || $_SESSION['rol'] == 'Recepcionista' || $_SESSION['rol'] == 'Veterinario') : ?>
    <?php include("../../app/controllers/reservas/listado_de_reservas.php"); ?>
    <br>

    <div class="container-fluid">
        <h1>Lista de Reservas</h1>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Reservas Registradas</b></h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-striped table-bordered table-hover mb-4">
                            <thead>
                                <tr class="text-center">
                                    <th>Nro</th>
                                    <th>id reserva</th>
                                    <th>id usuario</th>
                                    <th>id mascota</th>
                                    <th>servicio</th>
                                    <th>fecha</th>
                                    <th>hora</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 0;
                                foreach ($citas as $cita) {
                                    $contador++;
                                ?>
                                    <tr class="text-center">
                                        <td><?php echo $contador; ?></td>
                                        <td><?php echo $cita['id']; ?></td>
                                        <td><?php echo $cita['id_usuario']; ?></td>
                                        <td><?php echo $cita['mascota_id']; ?></td>
                                        <td><?php echo $cita['tipo_servicio']; ?></td>
                                        <td><?php echo $cita['fecha_cita']; ?></td>
                                        <td><?php echo $cita['hora_cita']; ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


<?php if ($_SESSION['rol'] == 'Cliente') : ?>
    <?php include("../../app/controllers/reservas/reservaCliente.php"); ?>
    <?php if (count($citas) > 0) : ?>
        <br>
        <div class="container-fluid">
            <h1>Lista de citas</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b>Citas Registradas a su nombre.</b></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover mb-4">
                                <thead>
                                    <tr class="text-center">
                                        <th>Nro</th>
                                        <th>id reserva</th>
                                        <th>id mascota</th>
                                        <th>Nombre mascota</th>
                                        <th>Tipo</th>
                                        <th>Nombre cliente</th>
                                        <th>servicio</th>
                                        <th>fecha</th>
                                        <th>hora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($citas as $cita) {
                                        $contador++;
                                        $id = $cita['id_cita'];
                                        $nombre = $cita['nombre_cliente'] . " " . $cita['apellido_cliente'];
                                    ?>
                                        <tr class="text-center">
                                            <td><?php echo $contador; ?></td>
                                            <td><?php echo $cita['id_cita']; ?></td>
                                            <td><?php echo $cita['mascota_id']; ?></td>
                                            <td><?php echo $cita['nombre_mascota']; ?></td>
                                            <td><?php echo $cita['tipo_mascota']; ?></td>
                                            <td><?php echo $nombre; ?></td>
                                            <td><?php echo $cita['tipo_servicio']; ?></td>
                                            <td><?php echo $cita['fecha_cita']; ?></td>
                                            <td><?php echo $cita['hora_cita']; ?></td>
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
                <h4 class="alert-heading">No hay mascotas registradas</h4>
                <p>No se encontraron mascotas registradas para tu cuenta,
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ reservas",
                "infoEmpty": "Mostrando 0 a 0 de 0 reservas",
                "infoFiltered": "(Filtrado de _MAX_ total reservas",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ reservas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            buttons: [{
                extend: "collection",
                text: "Reportes",
                orientation: "landscape",
                buttons: [{
                        text: "Copiar",
                        extend: "copy"
                    },
                    {
                        extend: "pdf"
                    },
                    {
                        extend: "csv"
                    },
                    {
                        extend: "excel"
                    },
                    {
                        text: "Imprimir",
                        extend: "print"
                    }
                ]
            }, {
                extend: "colvis",
                text: "Visor de columnas",
            }],
        }).buttons().container().appendTo("#example1_wrapper .col-md-6:eq(0)");
    });
</script>