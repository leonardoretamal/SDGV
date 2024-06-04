<?php
include("../../app/config.php"); //para tener conexion a base de datos.
include("../../admin/layout/parte1.php");

$id_producto = $_GET['id_producto'];
include('../../app/controllers/usuarios/datos_del_inventario.php');

?>
<div class="container-fluid">
    <h1>Datos del producto <?php echo $id_producto; ?></h1>
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
                                <label for="">Nombre producto: </label>
                                <input type="text" value="<?php echo $id_producto; ?>" name="id_producto" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">producto: </label>
                                <input type="email" value="<?php echo $producto; ?>" name="producto" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">stock</label>
                                <input type="text" class="form-control" value="<?php echo $stock; ?>" disabled>
                            </div>
                        </div>
                    </div>

                    <hr class="border border-danger border-2 opacity-50">

                    <div class="col-md-12 row justify-content-center">
                        <div class="form-group"> <!-- propio de bootstrap -->
                            <form action="<?php echo $URL?>/app/controllers/usuarios/deleteinventario2.php" method="post">
                                <input type="text" value="<?php echo $id_producto; ?>" name="id_producto" hidden>
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