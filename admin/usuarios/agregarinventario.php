<?php
include("../../app/config.php"); //para tener conexion a base de datos.
include("../../admin/layout/parte1.php");
include("../../app/controllers/usuarios/inventario.php");   ?>
<br>
<div class="container-fluid">
    <h1>Ingresar Suministros</h1>

  
</div>
<div class="hold-transition login-page">
    <div class="card">
        <div class="card-body login-card-body border border-info">
            
        
            <p class="login-box-msg">Ingresa Stock</p>

            <form action="<?php echo $URL; ?>/app/controllers/usuarios/ingresarstock.php" method="post">
                <label for="id">Ingresa id producto</label>
                <div class="input-group mb-3">
                    <input type="number" id="id" name="id" class="form-control" placeholder="Ingresa id producto.." required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <label for="descripcion">Descripcion</label>
                <div class="input-group mb-3">
                    <input type="text-area" id="descripcion" name="descripcion" class="form-control" placeholder="Ingresa Descripcion.." required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <label for="stock">Nombre</label>
                <div class="input-group mb-3">
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingresa Nombre.." required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                
                <label for="stock">Stock</label>
                <div class="input-group mb-3">
                    <input type="number" id="stock" name="stock" class="form-control" placeholder="Ingresa Stock.." required>
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
