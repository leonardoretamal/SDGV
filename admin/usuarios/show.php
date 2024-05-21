<?php
include("../../app/config.php"); //para tener conexion a base de datos.
include("../../admin/layout/parte1.php");

$id_usuario = $_GET['id_usuario'];
include('../../app/controllers/usuarios/datos_del_usuario.php');

?>
<div class="container-fluid">
    <h1>Datos del usuario id: <?php echo $id_usuario; ?></h1>
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
                        <div class="col-md-4">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">Nombre completo: </label>
                                <input type="text" value="<?php echo $nombre_completo; ?>" name="nombre_completo" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Correo electronico: </label>
                                <input type="email" value="<?php echo $email; ?>" name="email" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"> <!-- propio de bootstrap -->
                                <label for="">Cargo</label>
                                <input type="text" class="form-control" value="<?php echo $cargo; ?>" disabled>
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