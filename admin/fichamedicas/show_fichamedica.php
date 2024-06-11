<?php
include("../../app/config.php"); //para tener conexion a base de datos.
include("../../admin/layout/parte1.php");

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
                       
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">ID Mascota</label>
                                    <input type="number" name="mascota_id" id="mascota_id"class="form-control">
                                </div>
                            </div>
                        </div>
                        </div>
                      
                        <hr>
                        <div class="row justify-content-center"> <!-- Alineación horizontal centrada -->
                            <div class="col-md-12 text-center"> <!-- Centrado horizontal -->
                                <input type="submit" class="btn btn-primary" value="Buscar Registros" required>
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
