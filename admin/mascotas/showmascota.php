<?php
include("../../app/config.php"); //para tener conexión a la base de datos.
include("../../admin/layout/parte1.php");

$id = $_GET['id'];
include('../../app/controllers/mascotas_controllers/datos_mascota_controller.php');

?>

<div class="container-fluid">
    <h1 class="mb-4">Datos de la Mascota: <?php echo $mascota_id; ?></h1>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Datos Registrados</h3>
            <div class="card-tools">
                <button class="btn btn-info btn-sm" onclick="generarReporte()">Generar Reporte</button>

            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ID:</label>
                        <input type="text" class="form-control" value="<?php echo $mascota_id; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Nombre:</label>
                        <input type="text" class="form-control" value="<?php echo $mascota_nombre; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Tipo:</label>
                        <input type="text" class="form-control" value="<?php echo $mascota_tipo; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Raza:</label>
                        <input type="text" class="form-control" value="<?php echo $mascota_raza; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Edad:</label>
                        <input type="text" class="form-control" value="<?php echo $mascota_edad; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Sexo:</label>
                        <input type="text" class="form-control" value="<?php echo $mascota_sexo; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Color:</label>
                        <input type="text" class="form-control" value="<?php echo $mascota_color; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Peso:</label>
                        <input type="text" class="form-control" value="<?php echo $mascota_peso; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Altura:</label>
                        <input type="text" class="form-control" value="<?php echo $mascota_altura; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Fecha de Nacimiento:</label>
                        <input type="text" class="form-control" value="<?php echo $mascota_fecha_nacimiento; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Cliente ID:</label>
                        <input type="text" class="form-control" value="<?php echo $cliente_id; ?>" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>RUT del Cliente:</label>
                        <input type="text" class="form-control" value="<?php echo $cliente_rut; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Nombre del Cliente:</label>
                        <input type="text" class="form-control" value="<?php echo $cliente_nombre; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Apellido Paterno del Cliente:</label>
                        <input type="text" class="form-control" value="<?php echo $cliente_apellido_paterno; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Apellido Materno del Cliente:</label>
                        <input type="text" class="form-control" value="<?php echo $cliente_apellido_materno; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Dirección del Cliente:</label>
                        <input type="text" class="form-control" value="<?php echo $cliente_direccion; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Teléfono del Cliente:</label>
                        <input type="text" class="form-control" value="<?php echo $cliente_telefono; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Email del Cliente:</label>
                        <input type="email" class="form-control" value="<?php echo $cliente_email; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Rol del Cliente:</label>
                        <input type="text" class="form-control" value="<?php echo $cliente_rol; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Creación mascota:</label>
                        <input type="text" class="form-control" value="<?php echo $mascota_fyh_creacion; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Actualización mascota:</label>
                        <input type="text" class="form-control" value="<?php echo $mascota_fyh_actualizacion ?>" disabled>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- Div para mostrar el reporte -->
    <div id="reportePDF"></div>
</div>


<script>
    function generarReporte() {
        // Creamos un nuevo documento PDF
        var doc = new jsPDF();

        // Agregamos contenido al PDF
        doc.text("Reporte de Mascota", 10, 10);
        doc.text("ID: <?php echo $mascota_id; ?>", 10, 20);
        doc.text("Nombre: <?php echo $mascota_nombre; ?>", 10, 30);
        doc.text("Tipo: <?php echo $mascota_tipo; ?>", 10, 40);
        // Agrega más información si es necesario

        // Guardamos el PDF como un archivo descargable
        doc.save("reporte_mascota_<?php echo $mascota_id; ?>.pdf");
    }
</script>

<?php
include("../../admin/layout/parte2.php");
include("../../admin/layout/mensaje.php");
?>


<?php
include("../../admin/layout/parte2.php");
include("../../admin/layout/mensaje.php");
?>