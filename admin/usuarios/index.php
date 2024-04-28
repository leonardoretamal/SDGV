<?php
include("../../app/config.php"); //para tener conexion a base de datos.
include("../../admin/layout/parte1.php");
include("../../app/controllers/usuarios/lista_de_usuarios.php");   ?>
<br>
<div class="container-fluid">
    <h1>Lista de Usuarios</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Usuarios Registrados</b></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-responsive table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Nombre completo</th>
                                <th>Email</th>
                                <th>Cargo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($usuarios as $usuario) { ?>
                                <tr>
                                    <td><?php echo $usuario['id_usuario']; ?></td>
                                    <td><?php echo $usuario['nombre_completo']; ?></td>
                                    <td><?php echo $usuario['email']; ?></td>
                                    <td><?php echo $usuario['cargo']; ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-info">Ver</button>
                                            <button type="button" class="btn btn-success">Editar</button>
                                            <button type="button" class="btn btn-danger">Eliminar</button>
                                        </div>
                                    </td>

                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
<?php include("../../admin/layout/parte2.php");
