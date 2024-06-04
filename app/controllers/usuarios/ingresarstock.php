<?php
include("../../../app/config.php"); // Conexión a la base de datos

// Obtener los datos del formulario
$id_producto = $_POST["id_producto"];
$producto = $_POST["producto"];
$stock = $_POST["stock"];



// Verificar si el usuario ya está registrado
$sql = "SELECT * FROM inventario WHERE id_producto = :id_producto OR producto = :producto";
$query = $pdo->prepare($sql);
$query->bindParam(':id_producto', $id_producto);
$query->bindParam(':producto', $producto);
$query->execute();
$items = $query->fetchAll(PDO::FETCH_ASSOC);

if (count($items) > 0) {
    session_start();
    $_SESSION['mensaje'] = "Este producto ya está registrado en la base de datos: " . $id_producto;
    $_SESSION['icono'] = 'error';
    header('Location: ' . $URL . '/admin/usuarios/showinventario.php');
    exit();
} else {
   

        // Preparar y ejecutar la inserción en la base de datos
        $sentencia = $pdo->prepare("INSERT INTO inventario (id_producto, producto, stock) 
                                     VALUES (:id_producto, :producto, :stock)");
        $sentencia->bindParam(':id_producto', $id_producto);
        $sentencia->bindParam(':producto', $producto);
        $sentencia->bindParam(':stock', $stock);
       
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
