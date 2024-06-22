<?php
include("../../app/config.php"); //para tener conexion a base de datos.
include("../../admin/layout/parte1.php");

$roles_permitidos = array(
    'ADMINISTRADOR'
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
include('../../app/controllers/mascotas_controllers/datos_mascota_controller.php');
?>
<div class="container-fluid">
    <h1>Datos de la mascota: <?php echo ucfirst(strtolower($mascota_nombre)); ?></h1>
    <h1>ID: <?php echo $mascota_id; ?></h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <p class="h3 text-center"><b>¿Estas seguro de querer eliminar esta Mascota?</b></p>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- se envia formulario a controlador -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nombre: </label>
                                <input type="text" value="<?php echo $mascota_nombre; ?>" name="mascota_nombre" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">Tipo</label>
                                <input type="text" class="form-control" value="<?php echo $mascota_tipo; ?>"  name="mascota_tipo" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">raza</label>
                                <input type="text" class="form-control" value="<?php echo $mascota_raza; ?>" name="mascota_raza" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">edad</label>
                                <input type="number" class="form-control" value="<?php echo $mascota_edad; ?>" name="mascota_edad" disabled>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">Nombre cliente</label>
                                <input type="text" class="form-control" value="<?php echo $cliente_nombre; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">Apellido</label>
                                <input type="text" class="form-control" value="<?php echo $cliente_apellido_paterno; ?>"  disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">Rut cliente</label>
                                <input type="text" class="form-control" value="<?php echo $cliente_rut; ?>"  disabled>
                            </div>
                        </div>
                    </div>

                    <hr class="border border-danger border-2 opacity-50">

                    <div class="col-md-12 row justify-content-center">
                        <div class="form-group item-center"> <!-- propio de bootstrap -->
                            <form action="<?php echo $URL ?>/app/controllers/mascotas_controllers/delete_mascota_controller.php" method="post">
                                <input type="number" value="<?php echo $mascota_id; ?>" name="mascota_id" hidden>
                                <a href="show_mascota.php" class="btn btn-secondary">Cancelar</a>
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