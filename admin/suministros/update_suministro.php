<?php
include("../../app/config.php"); //para tener conexion a base de datos.
include("../../admin/layout/parte1.php");
$id = $_GET['id'];
include('../../app/controllers/suministros_controllers/datos_suministro_controller.php');
?>


<div class="container-fluid">
    <h1>Creacion de nuevo Suministro</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <p class="h3 text-center"><b>Datos del articulo </b></p>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- se envia formulario a controlador -->
                    <form action="<?php echo $URL; ?>/app/controllers/suministros_controllers/update_suministro_controller.php" method="post">
                        <div class="row">
                        <div class="col-md-4">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">ID del producto<b>*</b></label>
                                    <input type="number" name="id" value="<?php echo $id; ?>" class="form-control" required maxlength="10">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">Codigo del producto<b>*</b></label>
                                    <input type="number" name="codigo" value="<?php echo $codigo; ?>" class="form-control" required maxlength="10">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nombre<b>*</b></label>
                                    <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control" required maxlength="50">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">stock<b>*</b></label>
                                    <input type="number" name="stock" value="<?php echo $stock; ?>" class="form-control" required maxlength="10">
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">Descripcion</label>
                                    <input type="text" name="descripcion" value="<?php echo $descripcion; ?>" class="form-control" required maxlength="255">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row justify-content-center"> <!-- Alineación horizontal centrada -->
                            <div class="col-md-12 text-center"> <!-- Centrado horizontal -->
                                <a href="../../admin/suministros/show_suministro.php" class="btn btn-secondary">Cancelar</a>
                                <input type="submit" class="btn btn-primary" value="Guardar Cambios" required>
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