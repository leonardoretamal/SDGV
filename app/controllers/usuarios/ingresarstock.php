<?php
include("../../../app/config.php"); // Conexión a la base de datos

// Obtener los datos del formulario
$id = $_POST["id"];
$descripcion = $_POST["descripcion"];
$nombre = $_POST["nombre"];
$stock = $_POST["stock"];




// Verificar si el usuario ya está registrado
$sql = "SELECT * FROM tb_suministros WHERE id = :id OR nombre = :nombre";
$query = $pdo->prepare($sql);
$query->bindParam(':id', $id);
$query->bindParam(':nombre', $nombre);
$query->execute();
$items = $query->fetchAll(PDO::FETCH_ASSOC);

if (count($items) > 0) {
    session_start();
    $_SESSION['mensaje'] = "Este producto ya está registrado en la base de datos: " . $id;
    $_SESSION['icono'] = 'error';
    header('Location: ' . $URL . '/admin/usuarios/showinventario.php');
    exit();
} else {
    
        $fyh_creacion = date('Y-m-d H:i:s');
        $fyh_actualizacion = date('Y-m-d H:i:s');
   

        // Preparar y ejecutar la inserción en la base de datos
        $sentencia = $pdo->prepare("INSERT INTO tb_suministros (id, nombre,descripcion,stock, fyh_creacion, fyh_actualizacion) 
                                    values (:id, :nombre, :descripcion, :stock, :fyh_creacion, :fyh_actualizacion)");
                                    
        $sentencia->bindParam(':id', $id);
        $sentencia->bindParam(':descripcion', $descripcion);
        $sentencia->bindParam(':nombre', $nombre);
        $sentencia->bindParam(':stock', $stock);
        $sentencia->bindParam(':fyh_creacion', $fyh_creacion);
        $sentencia->bindParam(':fyh_actualizacion', $fyh_actualizacion);
       
        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "El producto registrado correctamente";
            $_SESSION['icono'] = 'success';
            header('Location: ' . $URL . '/admin/usuarios/showinventario.php');
            exit();
        } else {
            session_start();
            $_SESSION['mensaje'] = "El producto no se pudo registrar";
            $_SESSION['icono'] = 'error';
            header('Location: ' . $URL . '/admin/usuarios/showinventario.php');
            exit();
        }
}
