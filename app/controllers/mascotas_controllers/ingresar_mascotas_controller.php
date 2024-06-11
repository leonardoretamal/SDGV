<?php
include("../../../app/config.php"); // Conexión a la base de datos

// Obtener los datos del formulario

$nombre = $_POST["nombre"];
$tipo = $_POST["tipo"];
$raza = $_POST["raza"];
$edad = $_POST["edad"];
$cliente_id = $_POST["cliente_id"];
$sexo = $_POST["sexo"];
$color = $_POST["color"];
$peso = $_POST["peso"];
$altura = $_POST["altura"];
$fecha_nacimiento = $_POST["fecha_nacimiento"];




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
        $sentencia = $pdo->prepare("INSERT INTO tb_mascotas (id, nombre,tipo,raza,edad,cliente_id, fyh_creacion,sexo,color,peso,altura,fecha_nacimiento) 
                                    values (:id, :nombre,:tipo, :raza, :edad, :cliente_id ,:fyh_creacion,:sexo,:color,:peso,:altura,:fecha_nacimiento)");
                                    
        $sentencia->bindParam(':id', $id);
        $sentencia->bindParam(':nombre', $nombre);
        $sentencia->bindParam(':tipo', $tipo);
        $sentencia->bindParam(':raza', $raza);
        $sentencia->bindParam(':edad', $edad);
        $sentencia->bindParam(':cliente_id', $cliente_id);
        $sentencia->bindParam(':fyh_creacion', $fyh_creacion);
        $sentencia->bindParam(':sexo', $sexo);
        $sentencia->bindParam(':color', $color);
        $sentencia->bindParam(':peso', $peso);
        $sentencia->bindParam(':altura', $altura);
        $sentencia->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        
        
        
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
