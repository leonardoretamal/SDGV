<?php
include("../../app/config.php"); //para tener conexión a la base de datos.
include("../../admin/layout/parte1.php");

// Verifica si el usuario tiene un rol permitido para acceder a esta página 
//siempre debajo de parte1.php porque la sesion esta inicia ahi 
$roles_permitidos = array(
    'ADMINISTRADOR',
    'Recepcionista',
    'Cliente'
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
include('../../app/controllers/facturas_controllers/datos_facturas_controller.php');

?>
<div class="container-fluid">
    <br>
    <h1>Datos de la Factura ID: <?php echo $factura_id; ?></h1>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title mt-1 fw">Datos Registrados</h3>
            <div class="card-tools">
                <!-- Puedes agregar botones u opciones adicionales según tu aplicación -->
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ID Factura:</label>
                        <input type="text" class="form-control" value="<?php echo $factura_id; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Fecha:</label>
                        <input type="text" class="form-control" value="<?php echo $factura_fecha; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Valor Consulta:</label>
                        <input type="text" class="form-control" value="<?php echo $factura_valor_consulta; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Operación:</label>
                        <input type="text" class="form-control" value="<?php echo $factura_operacion == 1 ? "Si": "No"; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Valor Operación:</label>
                        <input type="text" class="form-control" value="<?php echo $factura_valor_operacion; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Total a pagar:</label>
                        <input type="text" class="form-control" value="<?php echo $factura_total; ?>" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ID Cliente:</label>
                        <input type="text" class="form-control" value="<?php echo $cliente_id; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Nombre Cliente:</label>
                        <input type="text" class="form-control" value="<?php echo $cliente_nombre." ".$cliente_apellido_paterno; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>RUT Cliente:</label>
                        <input type="text" class="form-control" value="<?php echo $cliente_rut; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Dirección Cliente:</label>
                        <input type="text" class="form-control" value="<?php echo $cliente_direccion; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Teléfono Cliente:</label>
                        <input type="text" class="form-control" value="<?php echo $cliente_telefono; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Email Cliente:</label>
                        <input type="text" class="form-control" value="<?php echo $cliente_email; ?>" disabled>
                    </div>
                    <!-- Puedes mostrar más detalles del cliente si es necesario -->
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.container-fluid -->

<?php
include("../../admin/layout/parte2.php");
include("../../admin/layout/mensaje.php");
?>