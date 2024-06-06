<?php
include("../../app/config.php"); //para tener conexion a base de datos.
include("../../admin/layout/parte1.php");
/* include("../../app/controllers/suministros_controllers/suministros.php");  */  ?>
<br>
<div class="container-fluid">
    <h1>Ingresar Suministros</h1>

  
</div>
<div class="hold-transition login-page">
    <div class="card">
        <div class="card-body login-card-body border border-info">
            
        
            <p class="login-box-msg">Ingresa Stock</p>

            <form action="<?php echo $URL; ?>/app/controllers/suministros_controllers/ingresar_suministros_controller.php" method="post">
                <label for="id">Codigo del producto <b>*</b></label>
                <div class="input-group mb-3">
                    <input type="number" id="codigo" name="codigo" class="form-control" placeholder="Ingresa id producto.." required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <label for="stock">Nombre <b>*</b></label>
                <div class="input-group mb-3">
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingresa Nombre.." required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
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

                <label for="stock">Stock <b>*</b></label>
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
