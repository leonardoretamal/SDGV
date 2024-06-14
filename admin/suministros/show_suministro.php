<?php
include("../../app/config.php"); //para tener conexión a la base de datos.
include("../../admin/layout/parte1.php");
// Verificar si el usuario tiene un rol permitido para acceder a esta página
$roles_permitidos = array(
    'ADMINISTRADOR',
    'Recepcionista',
    'Veterinario'
);

// Verifica si el rol del usuario está permitido
if (!isset($_SESSION['rol']) || !in_array($_SESSION['rol'], $roles_permitidos)) {
    // Si el rol del usuario no está permitido, cierra la sesión y redirige al login
    session_unset(); // Elimina todas las variables de sesión
    session_destroy(); // Destruye la sesión
    header('Location: ' . $URL . '/login'); // Redirige al login
    exit; // Detiene la ejecución del script
}

include("../../app/controllers/suministros_controllers/suministros.php");
?>
<br>
<div class="container-fluid">
    <h1>Lista de stock</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Productos Registrados</b></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered table-hover mb-4">
                        <thead>
                            <tr class="text-center">
                                <th>Nro</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Stock</th>
                                <?php if ($_SESSION['rol'] == 'ADMINISTRADOR') : ?>
                                    <th>Acciones</th>
                                <?php endif; ?>
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
                                    <td><?php echo $contador; ?></td>
                                    <td><?php echo $item['nombre']; ?></td>
                                    <td><?php echo $item['descripcion']; ?></td>
                                    <td><?php echo $item['stock']; ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <?php if ($_SESSION['rol'] == 'ADMINISTRADOR') : ?>
                                                <a href="mostrar_suministro.php?id=<?php echo $id; ?>" class="btn btn-info"><i class="bi bi-eye-fill"></i>Ver</a>
                                                <a href="update_suministro.php?id=<?php echo $id; ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i>Editar</a>
                                                <a href="delete_suministro.php?id=<?php echo $id; ?>" class="btn btn-danger"><i class="bi bi-trash3-fill"></i>Eliminar</a>
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

<?php
include("../../admin/layout/parte2.php");
include("../../admin/layout/mensaje.php");
?>
<script>
    $(document).ready(function() {
        $('#example1').DataTable({
            "pageLength": 5,
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
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
        });
    });
</script>