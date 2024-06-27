<?php
include("../../app/config.php"); //para tener conexion a base de datos.
include("../../admin/layout/parte1.php");

// Verifica si el usuario tiene un rol permitido para acceder a esta página 
//siempre debajo de parte1.php porque la sesion esta inicia ahi 
$roles_permitidos = array(
    'ADMINISTRADOR',
    'Recepcionista',
    'Veterinario',
    'Cliente'
);

// Verifica si el rol del usuario está permitido
if (!isset($_SESSION['rol']) || !in_array($_SESSION['rol'], $roles_permitidos)) {
    // Si el rol del usuario no está permitido, cierra la sesión y redirige al login
    session_unset(); // Elimina todas las variables de sesión
    session_destroy(); // Destruye la sesión
    header('Location: ' . $URL . '/login'); // Redirige al login
    exit; // Detiene la ejecución del script
}
?>

<?php if ($_SESSION['rol'] == 'ADMINISTRADOR' || $_SESSION['rol'] == 'Recepcionista' || $_SESSION['rol'] == 'Veterinario') : ?>
    <?php include("../../app/controllers/mascotas_controllers/mascotas.php");   ?>
    <br>
    <div class="container-fluid">
        <h1>Lista de Mascotas</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Mascotas Registradas</b></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-striped table-bordered table-hover mb-4">
                            <thead>
                                <tr class="text-center">
                                    <th>Nro</th>
                                    <th>ID Mascota</th>
                                    <th>Nombre Mascota</th>
                                    <th>RUT Cliente</th>
                                    <th>Nombre Cliente</th>
                                    <th>Apellido Paterno</th>
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
                                    <tr class="text-start">
                                        <td><?php echo $contador; ?></td>
                                        <td><?php echo $item['id']; ?></td>
                                        <td><?php echo $item['nombre']; ?></td>
                                        <td><?php echo $item['rut_cliente']; ?></td>
                                        <td><?php echo $item['nombre_cliente']; ?></td>
                                        <td><?php echo $item['apellido_paterno_cliente']; ?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="showmascota.php?id=<?php echo $id; ?>" class="btn btn-info"><i class="bi bi-eye-fill"></i> Ver</a>
                                                <a href="update_mascota.php?id=<?php echo $id; ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i> Editar</a>
                                                <?php if ($_SESSION['rol'] == 'ADMINISTRADOR') : ?>
                                                    <a href="delete_mascota.php?id=<?php echo $id; ?>" type="button" class="btn btn-danger"><i class="bi bi-trash3-fill"></i> Eliminar</a>
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
    <?php include("../../app/controllers/mascotas_controllers/mascotaCliente.php"); ?>
    <?php if (count($mascotas) > 0) : ?>
        <br>
        <div class="container-fluid">
            <h1>Lista de mascotas</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b>Mascotas Registradas a su nombre.</b></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover mb-4">
                                <thead>
                                    <tr class="text-center">
                                        <th>ID Mascota</th>
                                        <th>Nombre Mascota</th>
                                        <th>tipo</th>
                                        <th>Rut cliente</th>
                                        <th>Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($mascotas as $mascota) {
                                        $contador++;
                                        $id = $mascota['id'];
                                        $nombre = $mascota['nombre_cliente']." ".$mascota['apellido_cliente']; 
                                    ?>
                                        <tr class="text-center">
                                            <td><?php echo $mascota['id']; ?></td>
                                            <td><?php echo $mascota['nombre']; ?></td>
                                            <td><?php echo $mascota['tipo']; ?></td>
                                            <td><?php echo $mascota['rut_cliente']; ?></td>
                                            <td><?php echo $nombre; ?></td>
                                            
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Mascotas",
                "infoEmpty": "Mostrando 0 a 0 de 0 productos",
                "infoFiltered": "(Filtrado de _MAX_ total mascotas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ mascotas",
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