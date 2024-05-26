<?php
include("../../app/config.php"); //para tener conexion a base de datos.
include("../../admin/layout/parte1.php");

$id_usuario = $_GET['id_usuario'];
include('../../app/controllers/usuarios/datos_del_usuario.php');
?>


<div class="container-fluid">
    <h1>Actualizacion del usuario <?php echo $nombre_completo; ?></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <p class="h3 text-center"><b>datos del usuario </b></p>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- se envia formulario a controlador -->
                    <form action="../../app/controllers/usuarios/update.php" method="post"> <!-- mas seguro -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">Nombre completo <b>*</b></label>
                                    <input type="text" name="nombre_completo" value="<?php echo $nombre_completo; ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Correo electronico <b>*</b></label>
                                    <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">Cargo</label>
                                    <select name="cargo" id="" class="form-control" required>
                                        <?php
                                        if ($cargo == "ADMINISTRADOR") { ?>
                                            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                            <option value="Cliente">Cliente</option>
                                            <option value="Recepcionista">Recepcionista</option>
                                            <option value="Veterinario">Veterinario</option>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if ($cargo == "Cliente") { ?>
                                            <option value="Cliente">Cliente</option>
                                            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                            <option value="Recepcionista">Recepcionista</option>
                                            <option value="Veterinario">Veterinario</option>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if ($cargo == "Recepcionista") { ?>
                                            <option value="Recepcionista">Recepcionista</option>
                                            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                            <option value="Cliente">Cliente</option>
                                            <option value="Veterinario">Veterinario</option>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if ($cargo == "Veterinario") { ?>
                                            <option value="Veterinario">Veterinario</option>
                                            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                            <option value="Cliente">Cliente</option>
                                            <option value="Recepcionista">Recepcionista</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"> <!-- propio de bootstrap -->
                                    <label for="">Contraseña <b>*</b></label>
                                    <input type="text" name="password" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Verifique contraseña <b>*</b></label>
                                    <input type="text" name="password_verify" class="form-control">
                                </div>
                            </div>
                        </div>
                        <input type="text" name="id_usuario" value="<?php echo $id_usuario; ?>" hidden>
                        <hr class="border-success">
                        <div class="row justify-content-center"> <!-- Alineación horizontal centrada -->
                            <div class="col-md-12 text-center"> <!-- Centrado horizontal -->
                                <a href="../../admin/usuarios/index.php" class="btn btn-secondary">Cancelar</a>
                                <input type="submit" class="btn btn-success" value="Actualizar usuario" required>
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