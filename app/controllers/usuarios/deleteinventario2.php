<?php

include ('../../../app/config.php');

$id_producto = $_POST['id_producto'];


$sentencia = $pdo->prepare("DELETE FROM inventario WHERE id_producto = '$id_producto' ");

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se elimino de la manera correcta en la base de datos";
    $_SESSION['icono'] = 'success';
    header('Location: '.$URL.'/admin/usuarios/showinventario.php');
}else{
    session_start();
    $_SESSION['mensaje'] = "error no se pudo eliminar en la base de datos";
    $_SESSION['icono'] = 'error';
    header('Location: '.$URL.'/admin/usuarios');
}