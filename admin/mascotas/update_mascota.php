<?php
include("../../app/config.php"); //para tener conexion a base de datos.
include("../../admin/layout/parte1.php");

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

$id = $_GET['id']; // Obtener el ID del suministro desde la URL
include('../../app/controllers/mascotas_controllers/datos_mascota_controller.php'); // Incluir el controlador de datos, pasando el ID
?>

<div class="container-fluid">
    <h1>Actualizar Mascota</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <p class="h3 text-center"><b>Datos de la Mascota </b></p>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- se envia formulario a controlador -->
                    <form action="<?php echo $URL; ?>/app/controllers/mascotas_controllers/update_mascota_controller.php" method="post">

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nombre Macota<b>*</b></label>
                                    <input type="text" name="mascota_nombre" value="<?php echo $mascota_nombre; ?>" class="form-control" required maxlength="50">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">Tipo<b>*</b></label>
                                    <input type="text" name="mascota_tipo" value="<?php echo $mascota_tipo; ?>" class="form-control" required maxlength="10">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">Raza</label>
                                    <input type="text" name="mascota_raza" value="<?php echo $mascota_raza; ?>" class="form-control">
                                    <input type="number" name="mascota_id" value="<?php echo $mascota_id; ?>" class="form-control" required hidden>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">Edad<b>*</b></label>
                                    <input type="number" name="mascota_edad" value="<?php echo $mascota_edad; ?>" class="form-control" max="99" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">ID Cliente<b>*</b></label>
                                    <input type="number" value="<?php echo $cliente_id; ?>" class="form-control" disabled>
                                    <input type="number" name="cliente_id" value="<?php echo $cliente_id; ?>" class="form-control" hidden>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">Sexo<b>*</b></label>
                                    <select name="mascota_sexo" id="sexo" class="form-control" required>
                                    <?php
                                        if ($mascota_sexo == "Macho") { ?>
                                            <option value="Macho">Macho</option>
                                            <option value="Hembra">Hembra</option>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if ($mascota_sexo == "Hembra") { ?>
                                            <option value="Hembra">Hembra</option>
                                            <option value="Macho">Macho</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">color<b>*</b></label>
                                    <input type="text" name="mascota_color" value="<?php echo $mascota_color; ?>" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">Peso<b>*</b></label>
                                    <input type="number" name="mascota_peso" value="<?php echo $mascota_peso; ?>" class="form-control" >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">Altura<b>*</b> </label>
                                    <input type="number" name="mascota_altura" value="<?php echo $mascota_altura; ?>" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">Fecha Nacimiento</label>
                                    <input type="date" name="mascota_fecha_nacimiento" value="<?php echo $mascota_fecha_nacimiento; ?>" class="form-control">
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row justify-content-center"> <!-- Alineación horizontal centrada -->
                            <div class="col-md-12 text-center"> <!-- Centrado horizontal -->
                                <a href="../../admin/mascotas/show_mascota.php" class="btn btn-secondary">Cancelar</a>
                                <input type="submit" class="btn btn-success" value="Actualizar Registro de Mascota" required>
                            </div>
                        </div>
                    </form>
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