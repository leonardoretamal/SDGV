<?php
include("../../app/config.php"); //para tener conexion a base de datos.
include("../../admin/layout/parte1.php"); ?>
<div class="container-fluid">
    <h1>Creacion de nuevo usuario</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <p class="h3 text-center"><b>datos del usuario </b></p>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- se envia formulario a controlador -->
                    <form action="../../app/controllers/usuarios/crear.php" method="post"> <!-- mas seguro -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">Nombre completo <b>*</b></label>
                                    <input type="text" name="nombre_completo" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Correo electronico <b>*</b></label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">Cargo</label>
                                    <select name="cargo" id="" class="form-control" required>
                                        <option value=""> Seleccione Cargo:</option>
                                        <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                        <option value="Cliente">Cliente</option>
                                        <option value="Recepcionista">Recepcionista</option>
                                        <option value="Veterinario">Veterinario</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">Contraseña <b>*</b></label>
                                    <input type="text" name="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Verifique contraseña <b>*</b></label>
                                    <input type="text" name="password_verify" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row justify-content-center"> <!-- Alineación horizontal centrada -->
                            <div class="col-md-12 text-center"> <!-- Centrado horizontal -->
                                <a href="../../admin/usuarios/index.php" class="btn btn-secondary">Cancelar</a>
                                <input type="submit" class="btn btn-primary" value="Registrar usuario" required>
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

