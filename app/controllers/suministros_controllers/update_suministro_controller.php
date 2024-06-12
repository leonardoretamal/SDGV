<?php

include('../../../app/config.php');

// Obtener las variables desde $_POST correctamente
$id = $_POST['id'];
$codigo = $_POST["codigo"];
$nombre = $_POST["nombre"];
$stock = $_POST["stock"];
$descripcion = $_POST["descripcion"];

// Preparar y ejecutar la actualización en la base de datos
$query = $pdo->prepare("UPDATE tb_suministros 
SET codigo=:codigo,
    nombre=:nombre,
    stock=:stock,
    descripcion=:descripcion,
    fyh_actualizacion=:fyh_actualizacion
    WHERE id = :id");
$query->bindParam('id', $id);
$query->bindParam('codigo', $codigo);
$query->bindParam('nombre', $nombre);
$query->bindParam('descripcion', $descripcion);
$query->bindParam('stock', $stock);
$query->bindParam('fyh_actualizacion', $fyh_actualizacion);

if ($query->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se actualizó correctamente";
    $_SESSION['icono'] = 'success';
    header('Location: '.$URL.'/admin/suministros/show_suministro.php');
} else {
    session_start();
    $_SESSION['mensaje'] = "No se pudo actualizar el suministro";
    $_SESSION['icono'] = 'error';
    header('Location: '.$URL.'/admin/suministros/show_suministro.php?id='.$id);
}
