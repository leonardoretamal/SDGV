<?php
include("../../app/config.php"); //para tener conexion a base de datos.
include("../../admin/layout/parte1.php");

// Verifica si el usuario tiene un rol permitido para acceder a esta página 
//siempre debajo de parte1.php porque la sesion esta inicia ahi 
$roles_permitidos = array(
    'ADMINISTRADOR',
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

$id = $_GET['id'];
include('../../app/controllers/fichamedica_controllers/datos_controller.php');
?>
<div class="container-fluid">
    <h1>Datos de la Ficha Medica <?php echo $id; ?></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <p class="h3 text-center"><b>¿Estas seguro de querer eliminar esta Ficha Medica?</b></p>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- se envia formulario a controlador -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">id Ficha Medica: </label>
                                <input type="number" value="<?php echo $id; ?>" name="id" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">id mascota: </label>
                                <input type="number" value="<?php echo $mascota_id; ?>" name="mascota_id" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Diagnostico: </label>
                                <input type="text" value="<?php echo $diagnostico; ?>" name="diagnostico" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">Tratamiento</label>
                                <input type="text" class="form-control" value="<?php echo $tratamiento; ?>" name="tratamiento" disabled>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">Especialista ID:</label>
                                <input type="number" class="form-control" value="<?php echo $especialista_id; ?>" name="especialista_id" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">Emitida</label>
                                <input type="text" class="form-control" value="<?php echo $fecha; ?>" name="fyf_creacion" disabled>
                            </div>
                        </div>
                    </div>

                    <hr class="border border-danger border-2 opacity-50">

                    <div class="col-md-12 row justify-content-center">
                        <div class="form-group"> <!-- propio de bootstrap -->
                            <form action="<?php echo $URL ?>/app/controllers/fichamedica_controllers/delete_fichamedica_controller.php" method="post">
                                <input type="text" value="<?php echo $id; ?>" name="id" hidden>
                                <a href="showfichamedica.php" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Borrar</button>
                            </form>
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