<?php
include("../../../app/config.php"); // Conexión a la base de datos

// Obtener los datos del formulario

$nombre = $_POST["nombre"];
$tipo = $_POST["tipo"];
$raza = $_POST["raza"];
$edad = $_POST["edad"];
$cliente_id = $_POST["cliente_id"];




// Verificar si el suministro ya está registrado
$sql = "SELECT * FROM tb_mascotas WHERE nombre = :nombre and cliente_id = :cliente_id";
$query = $pdo->prepare($sql);
$query->bindParam(':cliente_id', $cliente_id);
$query->bindParam(':nombre', $nombre);
$query->execute();
$items = $query->fetchAll(PDO::FETCH_ASSOC);

if (count($items) > 0) {
    session_start();
    $_SESSION['mensaje'] = "Este producto ya está registrado en la base de datos: " .$nombre."-". $cliente_id2;
    $_SESSION['icono'] = 'error';
    header('Location: ' . $URL . '/admin/mascotas/show_mascota.php');
    exit();
} else {
    
        $fyh_creacion = date('Y-m-d H:i:s');
   

        // Preparar y ejecutar la inserción en la base de datos
        $sentencia = $pdo->prepare("INSERT INTO tb_mascotas (id, nombre,tipo,raza,edad,cliente_id, fyh_creacion) 
                                    values (:id, :nombre,:tipo, :raza, :edad, :cliente_id ,:fyh_creacion)");
                                    
        $sentencia->bindParam(':id', $id);
        $sentencia->bindParam(':nombre', $nombre);
        $sentencia->bindParam(':tipo', $tipo);
        $sentencia->bindParam(':raza', $raza);
        $sentencia->bindParam(':edad', $edad);
        $sentencia->bindParam(':cliente_id', $cliente_id);
        $sentencia->bindParam(':fyh_creacion', $fyh_creacion);
        
        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Mascota registrado correctamente";
            $_SESSION['icono'] = 'success';
            header('Location: ' . $URL . '/admin/mascotas/show_mascota.php');
            exit();
        } else {
            session_start();
            $_SESSION['mensaje'] = "El producto no se pudo registrar";
            $_SESSION['icono'] = 'error';
            header('Location: ' . $URL . '/admin/mascotas/show_mascota.php');
            exit();
        }
}
