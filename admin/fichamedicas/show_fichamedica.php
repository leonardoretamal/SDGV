<?php
include("../../app/config.php"); //para tener conexion a base de datos.
include("../../admin/layout/parte1.php");

$id = $_GET['id'];
include("../../app/controllers/fichamedica_controllers/datos_controller.php");   
?>
<br>
<div class="container-fluid">
    <h1>Buscar Ficha Medica</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Buscar Registros</b></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="<?php echo $URL; ?>/admin/fichamedicas/showfichamedica.php" method="post">
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
                                        <input type="text" class="form-cont" value="<?php echo $tratamiento; ?>" name="tratamiento" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"> <!-- propio de bootstrap -->
                                        <label for="">Fecha</label>
                                        <input type="text" class="form-cont" value="<?php echo $fecha; ?>" name="fecha" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"> <!-- propio de bootstrap -->
                                        <label for="">ID Especialista :</label>
                                        <input type="number" class="form-cont" value="<?php echo $especialista_id; ?>" name="especialista_id" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"> <!-- propio de bootstrap -->
                                        <label for="">Emitida</label>
                                        <input type="text" class="form-cont" value="<?php echo $fyf_creacion; ?>" name="fyf_creacion" disabled>
                                    </div>
                                </div>
                            </div>

                            <hr class="border border-danger border-2 opacity-50">

                            <div class="col-md-12 row justify-content-center">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <form action="<?php echo $URL?>/app/controllers/fichamedica_controllers/delete_fichamedica_controller.php" method="post">
                                        <input type="text" value="<?php echo $id; ?>" name="id" hidden>
                                        <a href="showfichamedica.php" class="btn btn-secondary">Volver</a>
                                        
                                    </form>
                                </div>
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