<?php
include("../../app/config.php"); //para tener conexion a base de datos.
include("../../admin/layout/parte1.php");

$id = $_GET['id'];
include('../../app/controllers/mascotas_controllers/datos_mascota_controller.php');

?>
<div class="container-fluid">
    <h1>Datos de la Mascota: <?php echo $id; ?></h1>
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
                                <label for="">id </label>
                                <input type="number" value="<?php echo $id; ?>" name="id" class="form-control" disabled>
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
                                <label for="">Tipo </label>
                                <input type="text" class="form-control" value="<?php echo $tipo; ?>" name="tipo" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">Edad </label>
                                <input type="number" class="form-control" value="<?php echo $edad; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">Cliente id</label>
                                <input type="number" class="form-control" value="<?php echo $cliente_id; ?>" disabled>
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