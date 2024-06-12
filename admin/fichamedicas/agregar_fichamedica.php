<?php
include("../../app/config.php"); //para tener conexion a base de datos.
include("../../admin/layout/parte1.php"); ?>
<div class="container-fluid">
    <h1>Ingreso de Ficha Medica</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <p class="h3 text-center"><b>Datos de la Atencion </b></p>
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
                                    <label for="">Diagmistico<b>*</b></label>
                                    <input type="text" name="diagnostico" id="diagnostico" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">Tratamiento<b>*</b></label>
                                    <input type="text" name="tratamiento" id="tratamiento" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">ID Especialista</label>
                                    <input type="number" name="especialista_id" id="especialista_id"class="form-control">
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