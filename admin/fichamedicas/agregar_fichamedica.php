<?php
include("../../app/config.php"); //para tener conexion a base de datos.
include("../../admin/layout/parte1.php");

// Verifica si el usuario tiene un rol permitido para acceder a esta página 
//siempre debajo de parte1.php porque la sesion esta iniciada ahi 
$roles_permitidos = array(
    'ADMINISTRADOR',
    'Recepcionista',
    'Veterinario',
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

// Consulta para obtener los especialistas con rol de veterinario
$sql2 = "SELECT id, nombre, apellido_paterno FROM tb_usuarios WHERE rol = 'Veterinario'";
$query2 = $pdo->prepare($sql2);
$query2->execute();
$especialistas = $query2->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="container-fluid">
    <p class="fs-1 fw-bold text-center p-2">Ingreso de Ficha Medica</p>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <p class="fs-3 text-center"><b>Datos de la Atencion </b></p>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- se envia formulario a controlador -->
                    <form action="<?php echo $URL; ?>/app/controllers/fichamedica_controllers/ingresar_fichamedica_controller.php" method="post">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">ID Mascota<b>*</b></label>
                                    <input type="number" name="mascota_id" id="mascota_id" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Diagnostico<b>*</b></label>
                                    <input type="text" name="diagnostico" id="diagnostico" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">Especialista</label>
                                    <select name="especialista_id" class="form-control" required> <!-- muestra solo los especialistas pero el value que envia es su id. -->
                                        <option value="">Seleccione un especialista</option>
                                        <?php foreach ($especialistas as $especialista) {
                                            $nombre = ucwords(strtolower($especialista['nombre']));
                                            $apellido_paterno = ucwords(strtolower($especialista['apellido_paterno'])); ?>
                                            <option value="<?php echo $especialista['id']; ?>">
                                                <?php echo $nombre . ' ' . $apellido_paterno; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">Fecha</label>
                                    <input type="date" name="fecha" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">Tratamiento<b>*</b></label>
                                    <textarea name="tratamiento" class="form-control" rows="3"></textarea>
                                </div>
                            </div>

                        </div>

                        <hr>
                        <div class="row justify-content-center"> <!-- Alineación horizontal centrada -->
                            <div class="col-md-12 text-center"> <!-- Centrado horizontal -->
                                <a href="../../admin/fichamedicas/showfichamedica.php" class="btn btn-secondary">Cancelar</a>
                                <input type="submit" class="btn btn-primary" value="Registrar Ficha Medica" required>
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