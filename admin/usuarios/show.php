<?php
include("../../app/config.php"); //para tener conexion a base de datos.
include("../../admin/layout/parte1.php");

// Verificar si el usuario tiene un rol permitido para acceder a esta página
$roles_permitidos = array(
    'ADMINISTRADOR',
    'Recepcionista'
);

// Verifica si el rol del usuario está permitido
if (!isset($_SESSION['rol']) || !in_array($_SESSION['rol'], $roles_permitidos)) {
    // Si el rol del usuario no está permitido, cierra la sesión y redirige al login
    session_unset(); // Elimina todas las variables de sesión
    session_destroy(); // Destruye la sesión
    header('Location: ' . $URL . '/login'); // Redirige al login
    exit; // Detiene la ejecución del script
}

$id_usuario = $_GET['id_usuario'];
include('../../app/controllers/usuarios/datos_del_usuario.php');

?>
<div class="container-fluid">
    <h1>Datos del usuario id: <?php echo $id_usuario; ?></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <p class="h3 text-center"><b>Datos registrados </b></p>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- se envia formulario a controlador -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">Rut </label>
                                <input type="text" value="<?php echo $rut; ?>" name="rut" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nombre </label>
                                <input type="text" value="<?php echo $nombre; ?>" name="nombre" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">Apellido Paterno </label>
                                <input type="text" class="form-control" value="<?php echo $apellido_paterno; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">Apellido Materno </label>
                                <input type="text" class="form-control" value="<?php echo $apellido_materno; ?>" disabled>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">Direccion</label>
                                <input type="text" class="form-control" value="<?php echo $direccion; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Celular</label>
                                <input type="text" class="form-control" value="<?php echo $telefono; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">Correo Electronico</label>
                                <input type="text" class="form-control" value="<?php echo $email; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">Rol</label>
                                <input type="text" class="form-control" value="<?php echo $rol; ?>" disabled>
                            </div>
                        </div>

                    </div>
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