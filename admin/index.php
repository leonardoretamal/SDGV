<?php
include("../app/config.php"); //para tener conexion a base de datos.
include("../admin/layout/parte1.php");?> 
<h1>Hola <?php echo ucfirst($nombre); ?> <?php echo ucfirst($apellido_paterno); ?></h1>
<h2>Su ID es: <?php echo $id_usuario; ?></h2>
<?php include("../admin/layout/parte2.php"); 