<?php
include("../../app/config.php"); //para tener conexion a base de datos.
include("../../admin/layout/parte1.php");

// Verificar si el usuario tiene un rol permitido para acceder a esta página
$roles_permitidos = array(
    'ADMINISTRADOR',
);

// Verifica si el rol del usuario está permitido
if (!isset($_SESSION['rol']) || !in_array($_SESSION['rol'], $roles_permitidos)) {
    // Si el rol del usuario no está permitido, cierra la sesión y redirige al login
    session_unset(); // Elimina todas las variables de sesión
    session_destroy(); // Destruye la sesión
    header('Location: ' . $URL . '/login'); // Redirige al login
    exit; // Detiene la ejecución del script
}

$id = $_GET['id'];
include('../../app/controllers/suministros_controllers/datos_suministro_controller.php');

?>
<div class="container-fluid">
    <h1>Datos del suministro ID: <?php echo $id; ?></h1>
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
                        <div class="col-md-6">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">Nombre </label>
                                <input type="text" value="<?php echo $nombre; ?>" name="nombre" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Stock </label>
                                <input type="number" value="<?php echo $stock; ?>" name="stock" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">Descripcion </label>
                                <input type="text" class="form-control" name="descripcion" value="<?php echo $descripcion; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">Codigo </label>
                                <input type="text" class="form-control" name="codigo" value="<?php echo $codigo; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Fecha y hora de creacion</label>
                                <input type="text" class="form-control" name="fyh_creacion" value="<?php echo $fyh_creacion; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">Fecha y hora de actualizacion</label>
                                <input type="text" class="form-control" name="fyh_actualizacion" value="<?php echo $fyh_actualizacion; ?>" disabled>
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