<?php
include("../../../app/config.php"); // Conexión a la base de datos

// Obtener los datos del formulario
$mascota_id = $_POST["mascota_id"];
$diagnostico = $_POST["diagnostico"];
$tratamiento = $_POST["tratamiento"];
$fecha = $_POST["fecha"];
$especialista_id = $_POST["especialista_id"];

// Verificar si la mascota existe
$sql_check_mascota = "SELECT COUNT(*) FROM tb_mascotas WHERE id = :mascota_id";
$query_check_mascota = $pdo->prepare($sql_check_mascota);
$query_check_mascota->bindParam(':mascota_id', $mascota_id, PDO::PARAM_INT);
$query_check_mascota->execute();
$mascota_existe = $query_check_mascota->fetchColumn();

if (!$mascota_existe) {
    session_start();
    $_SESSION['mensaje'] = "Error: El ID de la mascota no existe.";
    $_SESSION['icono'] = 'error';
    header('Location: ' . $URL . '/admin/fichamedicas/agregar_fichamedica.php');
    exit();
}

// Verificar si el especialista existe
$sql_check_especialista = "SELECT COUNT(*) FROM tb_usuarios WHERE id = :especialista_id AND rol = 'Veterinario'";
$query_check_especialista = $pdo->prepare($sql_check_especialista);
$query_check_especialista->bindParam(':especialista_id', $especialista_id, PDO::PARAM_INT);
$query_check_especialista->execute();
$especialista_exists = $query_check_especialista->fetchColumn();

if (!$especialista_exists) {
    session_start();
    $_SESSION['mensaje'] = "Error: El ID del especialista no existe o no tiene el rol de Veterinario.";
    $_SESSION['icono'] = 'error';
    header('Location: ' . $URL . '/admin/fichamedicas/agregar_fichamedica.php');
    exit();
}



// Preparar y ejecutar la inserción en la base de datos
$sentencia = $pdo->prepare("INSERT INTO tb_fichamedica (mascota_id,diagnostico,tratamiento,fecha,especialista_id, fyf_creacion) 
                                    values (:id, :mascota_id,:diagnostico, :tratamiento, :fecha, :especialista_id ,:fyf_creacion)");

$sentencia->bindParam(':mascota_id', $mascota_id);
$sentencia->bindParam(':diagnostico', $diagnostico);
$sentencia->bindParam(':tratamiento', $tratamiento);
$sentencia->bindParam(':fecha', $fecha);
$sentencia->bindParam(':especialista_id', $especialista_id);
$sentencia->bindParam(':fyf_creacion', $fechaHora);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Ficha Medica registrada correctamente";
    $_SESSION['icono'] = 'success';
    header('Location: ' . $URL . '/admin/fichamedicas/showfichamedica.php');
    exit();
} else {
    session_start();
    $_SESSION['mensaje'] = "No se pudo registrar la ficha medica";
    $_SESSION['icono'] = 'error';
    header('Location: ' . $URL . '/admin/fichamedicas/agregar_fichamedica.php');
    exit();
}
