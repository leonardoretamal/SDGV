<?php

include('../../../app/config.php');

// Obtener las variables desde $_POST correctamente
$mascota_id = $_POST['mascota_id'];
$mascota_nombre = $_POST["mascota_nombre"];
$mascota_tipo = $_POST["mascota_tipo"];
$mascota_edad = $_POST["mascota_edad"];
$cliente_id = $_POST["cliente_id"];
$mascota_sexo = $_POST["mascota_sexo"];
$mascota_color = $_POST["mascota_color"];
$mascota_peso = $_POST["mascota_peso"];
$mascota_altura = $_POST["mascota_altura"];
$fecha_nacimiento = $_POST["mascota_fecha_nacimiento"];

// Preparar y ejecutar la actualización en la base de datos
$query = $pdo->prepare("UPDATE tb_mascotas 
SET nombre=:nombre,
    tipo=:tipo,
    edad=:edad,
    cliente_id=:cliente_id,
    sexo=:sexo,
    color=:color,
    peso=:peso,
    altura=:altura,
    fecha_nacimiento=:fecha_nacimiento
    fyh_actualizacion=:fyh_actualizacion
    WHERE id = '$mascota_id'");
$fyh_actualizacion = date('Y-m-d H:i:s');
$query->bindParam('id', $mascota_id);
$query->bindParam('nombre', $mascota_nombre);
$query->bindParam('tipo', $mascota_tipo);
$query->bindParam('edad', $mascota_edad);
$query->bindParam('cliente_id', $cliente_id);
$query->bindParam('sexo', $mascota_sexo);
$query->bindParam('color', $mascota_color);
$query->bindParam('peso', $mascota_peso);
$query->bindParam('altura', $mascota_altura);
$query->bindParam('fecha_nacimiento', $fecha_nacimiento);
$query->bindParam('fyh_actualizacion', $fyh_actualizacion);

if ($query->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se actualizó correctamente";
    $_SESSION['icono'] = 'success';
    header('Location: '.$URL.'/admin/mascotas_controllers/show_mascota.php');
} else {
    session_start();
    $_SESSION['mensaje'] = "No se pudo actualizar el suministro";
    $_SESSION['icono'] = 'error';
    header('Location: '.$URL.'/admin/mascotas_controllers/show_mascota.php?id='.$mascota_id);
}