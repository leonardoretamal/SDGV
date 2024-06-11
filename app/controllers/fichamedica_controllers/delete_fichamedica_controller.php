<?php

include ('../../../app/config.php');

$id = $_POST['id'];


$sentencia = $pdo->prepare("DELETE FROM tb_fichamedica WHERE id = '$id' ");

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se elimino de la manera correcta en la base de datos";
    $_SESSION['icono'] = 'success';
    header('Location: '.$URL.'/admin/fichamedicas/show_fichamedica.php');
}else{
    session_start();
    $_SESSION['mensaje'] = "error no se pudo eliminar en la base de datos";
    $_SESSION['icono'] = 'error';
    header('Location: '.$URL.'/admin/fichamedicas/show_fichamedica.php');
}
