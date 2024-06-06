
<?php
include("../../app/config.php"); //para tener conexion a base de datos.
include("../../admin/layout/parte1.php");
include("../../app/controllers/suministros_controllers/suministros.php");   ?>
<br>
<div class="container-fluid">
    <h1>Lista de stock</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>productos Registrados</b></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered table-hover mb-4">
                        <thead>
                            <tr class="text-center">
                                <th>Nro</th>
                                <th>id producto</th>
                                <th>Codigo</th>
                                <th>descripcion</th>
                                <th>nombre</th>
                                <th>stock</th>
                                <th>Registrado</th>
                                <th>Actualizado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contador = 0;
                            foreach ($items as $item) {
                                $contador++; 
                                $id = $item['id'];
                                ?>
                                <tr class="text-center">
                                    <td><?php echo $contador; ?></td>
                                    <td><?php echo $item['id']; ?></td>
                                    <td><?php echo $item['codigo']; ?></td>
                                    <td><?php echo $item['descripcion']; ?></td>
                                    <td><?php echo $item['nombre']; ?></td> 
                                    <td><?php echo $item['stock']; ?></td>
                                    <td><?php echo $item['fyh_creacion']; ?></td>
                                    <td><?php echo $item['fyh_actualizacion']; ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="update.php?id=<?php echo $id_item; ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i> Editar</a>
                                            <a href="delete_suministro.php?id=<?php echo $id; ?>" type="button" class="btn btn-danger"><i class="bi bi-trash3-fill"></i> Eliminar</a>
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


<?php
include("../../admin/layout/parte2.php");
include("../../admin/layout/mensaje.php");
?>
