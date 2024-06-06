<?php
include("../../../app/config.php"); // Conexión a la base de datos

// Obtener los datos del formulario
$codigo = $_POST["codigo"];
$descripcion = $_POST["descripcion"];
$nombre = $_POST["nombre"];
$stock = $_POST["stock"];




// Verificar si el suministro ya está registrado
$sql = "SELECT * FROM tb_suministros WHERE nombre = :nombre OR codigo = :codigo";
$query = $pdo->prepare($sql);
$query->bindParam(':codigo', $codigo);
$query->bindParam(':nombre', $nombre);
$query->execute();
$items = $query->fetchAll(PDO::FETCH_ASSOC);

if (count($items) > 0) {
    session_start();
    $_SESSION['mensaje'] = "Este producto ya está registrado en la base de datos: " .$nombre."-". $codigo;
    $_SESSION['icono'] = 'error';
    header('Location: ' . $URL . '/admin/suministros/show_suministro.php');
    exit();
} else {
    
        $fyh_creacion = date('Y-m-d H:i:s');
   

        // Preparar y ejecutar la inserción en la base de datos
        $sentencia = $pdo->prepare("INSERT INTO tb_suministros (id, nombre,descripcion,stock, fyh_creacion,codigo) 
                                    values (:id, :nombre, :descripcion, :stock, :fyh_creacion, :codigo)");
                                    
        $sentencia->bindParam(':id', $id);
        $sentencia->bindParam(':descripcion', $descripcion);
        $sentencia->bindParam(':nombre', $nombre);
        $sentencia->bindParam(':stock', $stock);
        $sentencia->bindParam(':fyh_creacion', $fyh_creacion);
        $sentencia->bindParam(':codigo', $codigo);
       
        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Producto registrado correctamente";
            $_SESSION['icono'] = 'success';
            header('Location: ' . $URL . '/admin/suministros/show_suministro.php');
            exit();
        } else {
            session_start();
            $_SESSION['mensaje'] = "El producto no se pudo registrar";
            $_SESSION['icono'] = 'error';
            header('Location: ' . $URL . '/admin/suministros/show_suministro.php');
            exit();
        }
}
