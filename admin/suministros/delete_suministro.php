<?php
include("../../app/config.php"); //para tener conexion a base de datos.
include("../../admin/layout/parte1.php");

$id = $_GET['id'];
include('../../app/controllers/suministros_controllers/datos_suministros_controller.php');

?>
<div class="container-fluid">
    <h1>Datos del producto <?php echo $nombre;?> <?php echo $stock;?></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <p class="h3 text-center"><b>¿Estas seguro de querer eliminar este Producto?</b></p>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- se envia formulario a controlador -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">id producto: </label>
                                <input type="number" value="<?php echo $id; ?>" name="id" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">descripcion: </label>
                                <input type="text" value="<?php echo $descripcion; ?>" name="descripcion" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">Nombre</label>
                                <input type="text" class="form-cont" value="<?php echo $nombre; ?>" name="nombre" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">Stock</label>
                                <input type="number" class="form-cont" value="<?php echo $stock; ?>" name="stock" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">Creacion</label>
                                <input type="text" class="form-cont" value="<?php echo $fyh_creacion; ?>" name="fyh_creacion" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">Actualizacion</label>
                                <input type="text" class="form-cont" value="<?php echo $fyh_actualizacion; ?>" name="fyh_actualizacion" disabled>
                            </div>
                        </div>
                    </div>

                    <hr class="border border-danger border-2 opacity-50">

                    <div class="col-md-12 row justify-content-center">
                        <div class="form-group"> <!-- propio de bootstrap -->
                            <form action="<?php echo $URL?>/app/controllers/suministros_controllers/delete_suministros_controller.php" method="post">
                                <input type="text" value="<?php echo $id; ?>" name="id" hidden>
                                <a href="index.php" class="btn btn-secondary">Cancelar</a>
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