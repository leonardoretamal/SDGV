<?php
include("../../app/config.php");
include("../../admin/layout/parte1.php");

// Verifica si el usuario tiene un rol permitido para acceder a esta página 
//siempre debajo de parte1.php porque la sesion esta inicia ahi 
$roles_permitidos = array(
    'ADMINISTRADOR',
    'Recepcionista',
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

include("../../app/controllers/usuarios/lista_de_usuarios.php");
?>
<br>

<div class="container-fluid">
    <h1>Lista de Usuarios</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Usuarios Registrados</b></h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered table-hover mb-4">
                        <thead>
                            <tr class="text-center">
                                <th>Nro</th>
                                <th>Rut</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contador = 0;
                            foreach ($usuarios as $usuario) {
                                $contador++;
                                $id_usuario = $usuario['id'];
                            ?>
                                <tr class="text-center">
                                    <td><?php echo $contador; ?></td>
                                    <td><?php echo $usuario['rut']; ?></td>
                                    <td><?php echo $usuario['nombre']; ?></td>
                                    <td><?php echo $usuario['apellido_paterno']; ?></td>
                                    <td><?php echo $usuario['email']; ?></td>
                                    <td><?php echo $usuario['rol']; ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <?php if ($_SESSION['rol'] == 'ADMINISTRADOR' || $_SESSION['rol'] == 'Recepcionista') : ?>
                                                <a href="show.php?id_usuario=<?php echo $id_usuario; ?>" class="btn btn-info"><i class="bi bi-eye-fill"></i> Ver</a>
                                                <a href="update.php?id_usuario=<?php echo $id_usuario; ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i> Editar</a>
                                            <?php endif; ?>
                                            <?php if ($_SESSION['rol'] == 'ADMINISTRADOR') : ?>
                                                <a href="delete.php?id_usuario=<?php echo $id_usuario; ?>" type="button" class="btn btn-danger"><i class="bi bi-trash3-fill"></i> Eliminar</a>
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
            </div>
        </div>
    </div>
</div>

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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
                "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                "infoFiltered": "(Filtrado de _MAX_ total Usuarios",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Usuarios",
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