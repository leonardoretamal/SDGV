<?php 

include('../../config.php');

$id_usuario = $_POST['id_usuario'];
$mascota_id = $_POST['mascota_id'];
$tipo_servicio = $_POST['tipo_servicio'];
$fecha_cita = $_POST['fecha_cita'];
$hora_cita = $_POST['hora_cita'];
$title = $tipo_servicio;
$start = $fecha_cita;
$end = $fecha_cita;
$color = "#16ADE3";
$nombre_mascota = $_POST['nombre_mascota'];

// Consulta para verificar si la mascota existe
$sql_verificar_mascota = "SELECT id FROM tb_mascotas WHERE id = :mascota_id AND nombre = :nombre_mascota";
$stmt_verificar = $pdo->prepare($sql_verificar_mascota);
$stmt_verificar->bindParam(':mascota_id', $mascota_id, PDO::PARAM_INT);
$stmt_verificar->bindParam(':nombre_mascota', $nombre_mascota, PDO::PARAM_STR);
$stmt_verificar->execute();
$mascota_existente = $stmt_verificar->fetch(PDO::FETCH_ASSOC);

if (!$mascota_existente) {
    session_start();
    $_SESSION['mensaje'] = "error macota no existe en la base de datos.";
    $_SESSION['icono'] = 'error';
    header('Location: '.$URL.'/admin/citas/index.php');
    exit; // Terminar el script para evitar la ejecución del resto del código
}

$sentencia = $pdo->prepare('INSERT INTO tb_citas
(id_usuario,mascota_id,tipo_servicio,fecha_cita,hora_cita,title,start,end,color,nombre_mascota,fyh_creacion)
VALUES ( :id_usuario,:mascota_id,:tipo_servicio,:fecha_cita,:hora_cita,:title,:start,:end,:color,:nombre_mascota,:fyh_creacion)');

$sentencia->bindParam(':id_usuario',$id_usuario);
$sentencia->bindParam(':mascota_id',$mascota_id);
$sentencia->bindParam(':tipo_servicio',$tipo_servicio);
$sentencia->bindParam(':fecha_cita',$fecha_cita);
$sentencia->bindParam(':hora_cita',$hora_cita);
$sentencia->bindParam(':title',$title);
$sentencia->bindParam(':start',$start);
$sentencia->bindParam(':end',$end);
$sentencia->bindParam(':color',$color);
$sentencia->bindParam(':nombre_mascota',$nombre_mascota);
$sentencia->bindParam('fyh_creacion',$fechaHora);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se registro la cita";
    $_SESSION['icono'] = 'success';
    header('Location: '.$URL.'/admin/citas/index.php');
}else{
    session_start();
    $_SESSION['mensaje'] = "Ha ocurrido un error al registrar la cita.";
    $_SESSION['icono'] = 'error';
    header('Location: '.$URL.'/admin/citas/index.php');
}