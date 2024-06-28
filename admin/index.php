<?php
include("../app/config.php"); //para tener conexion a base de datos.
include("../admin/layout/parte1.php");?> 



<p class="fs-1 text-center text-primary">Bienvenido al Sistema <?php echo ucfirst($nombre); ?> <?php echo ucfirst($apellido_paterno); ?></p>
<p class="fs-1 text-center text-primary">ID usuario: <?php echo $id_usuario; ?></p>
<br>

<?php include("../admin/layout/parte2.php"); 