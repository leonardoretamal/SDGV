<?php
include("../../../app/config.php"); // Conexión a la base de datos

// Obtener los datos del formulario
$mascota_id = $_POST["mascota_id"];
$diagnostico = $_POST["diagnostico"];
$tratamiento = $_POST["tratamiento"];
$especialista_id = $_POST["especialista_id"];


// Verificar si el suministro ya está registrado
$sql = "SELECT * FROM tb_fichamedica WHERE id = :id";
$query = $pdo->prepare($sql);
$query->bindParam(':id', $id);
$query->execute();
$items = $query->fetchAll(PDO::FETCH_ASSOC);

if (count($items) > 0) {
    session_start();
    $_SESSION['mensaje'] = "Este Ficha ya está Emitida en la base de datos: " .$id;
    $_SESSION['icono'] = 'error';
    header('Location: ' . $URL . '/admin/fichamedicas/agregar_fichamedica.php');
    exit();
} else {

        $fecha = date('Y-m-d H:i:s');
        $fyf_creacion = date('Y-m-d H:i:s');
   

        // Preparar y ejecutar la inserción en la base de datos
        $sentencia = $pdo->prepare("INSERT INTO tb_fichamedica (id, mascota_id,diagnostico,tratamiento,fecha,especialista_id, fyf_creacion) 
                                    values (:id, :mascota_id,:diagnostico, :tratamiento, :fecha, :especialista_id ,:fyf_creacion)");
                                    
        $sentencia->bindParam(':id', $id);
        $sentencia->bindParam(':mascota_id', $mascota_id);
        $sentencia->bindParam(':diagnostico', $diagnostico);
        $sentencia->bindParam(':tratamiento', $tratamiento);
        $sentencia->bindParam(':fecha', $fecha);
        $sentencia->bindParam(':especialista_id', $especialista_id);
        $sentencia->bindParam(':fyf_creacion', $fyf_creacion);

        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Ficha Medica registrado correctamente";
            $_SESSION['icono'] = 'success';
            header('Location: ' . $URL . '/admin/fichamedicas/showfichamedica.php');
            exit();
        } else {
            session_start();
            $_SESSION['mensaje'] = "ficha Medica no se pudo registrar";
            $_SESSION['icono'] = 'error';
            header('Location: ' . $URL . '/admin/fichamedicas/agregar_fichamedica.php');
            exit();
        }
}
