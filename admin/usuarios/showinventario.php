
<?php
include("../../app/config.php"); //para tener conexion a base de datos.
include("../../admin/layout/parte1.php");
include("../../app/controllers/usuarios/inventario.php");   ?>
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
                                <th>producto</th>
                                <th>stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contador = 0;
                            foreach ($items as $item) {
                                $contador++; 
                                $id_producto = $item['id_producto'];
                                ?>
                                <tr class="text-center">
                                    <td><?php echo $contador; ?></td>
                                    <td><?php echo $item['id_producto']; ?></td>
                                    <td><?php echo $item['producto']; ?></td>
                                    <td><?php echo $item['stock']; ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="show.php?id_usuario=<?php echo $id_producto; ?>" class="btn btn-info"><i class="bi bi-eye-fill"></i> Ver</a>
                                            <a href="update.php?id_usuario=<?php echo $id_producto; ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i> Editar</a>
                                            <a href="deleteinventario.php?id_producto=<?php echo $id_producto; ?>" type="button" class="btn btn-danger"><i class="bi bi-trash3-fill"></i> Eliminar</a>
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
<div class="hold-transition login-page">
    <div class="card">
        <div class="card-body login-card-body border border-info">
            
        
            <p class="login-box-msg">Ingresa Stock</p>

            <form action="<?php echo $URL; ?>/app/controllers/usuarios/ingresarstock.php" method="post">
                <label for="id_producto">Ingresa id producto</label>
                <div class="input-group mb-3">
                    <input type="number" id="id_producto" name="id_producto" class="form-control" placeholder="Ingresa id producto.." required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <label for="producto">Producto</label>
                <div class="input-group mb-3">
                    <input type="text" id="producto" name="producto" class="form-control" placeholder="Ingresa producto.." required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <label for="stock">Stock</label>
                <div class="input-group mb-3">
                    <input type="number" id="stock" name="stock" class="form-control" placeholder="Ingresa stock.." required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-outline-primary" style="width:100%">Ingresar</button>
            </form>
            <!-- /.login-card-body -->
        </div>
        </div>


</div>

<?php
include("../../admin/layout/parte2.php");
include("../../admin/layout/mensaje.php");
?>
