<?php

include ('../../../app/config.php');

// Obtener las variables desde $_POST correctamente
$id_usuario = $_POST['id_usuario'];
$rut = $_POST['rut'];
$nombre = $_POST['nombre'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$rol = $_POST['rol'];
$password = $_POST['password'];
$password_verify = $_POST['password_verify'];



if($password == ""){
    $sentencia = $pdo->prepare("UPDATE tb_usuarios 
SET rut=:rut,
    nombre=:nombre,
    apellido_paterno=:apellido_paterno,
    apellido_materno=:apellido_materno,
    direccion=:direccion,
    telefono=:telefono,
    email=:email,
    rol=:rol,
    fyh_actualizacion=:fyh_actualizacion
    WHERE id = :id_usuario AND rut = :rut");
    $sentencia->bindParam('rut', $rut);
    $sentencia->bindParam('nombre', $nombre);
    $sentencia->bindParam('apellido_paterno', $apellido_paterno);
    $sentencia->bindParam('apellido_materno', $apellido_materno);
    $sentencia->bindParam('direccion', $direccion);
    $sentencia->bindParam('telefono', $telefono);
    $sentencia->bindParam('email', $email);
    $sentencia->bindParam('rol', $rol);
    $sentencia->bindParam('fyh_actualizacion', $fechaHora);
    $sentencia->bindParam('id_usuario', $id_usuario);

    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Se actualizó correctamente";
        $_SESSION['icono'] = 'success';
        header('Location: '.$URL.'/admin/usuarios/');
    } else {
        session_start();
        $_SESSION['mensaje'] = "No se pudo actualizar al usuario";
        $_SESSION['icono'] = 'error';
        header('Location: '.$URL.'/admin/usuarios/update.php?id_usuario='.$id_usuario);
    }
}

if($password == $password_verify){
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    $sentencia = $pdo->prepare("UPDATE tb_usuarios 
    SET rut=:rut,
        nombre=:nombre,
        apellido_paterno=:apellido_paterno,
        apellido_materno=:apellido_materno,
        direccion=:direccion,
        telefono=:telefono,
        email=:email,
        rol=:rol,
        password=:password,
        fyh_actualizacion=:fyh_actualizacion
        WHERE id = :id_usuario AND rut = :rut");
    $sentencia->bindParam('rut', $rut);
    $sentencia->bindParam('nombre', $nombre);
    $sentencia->bindParam('apellido_paterno', $apellido_paterno);
    $sentencia->bindParam('apellido_materno', $apellido_materno);
    $sentencia->bindParam('direccion', $direccion);
    $sentencia->bindParam('telefono', $telefono);
    $sentencia->bindParam('email', $email);
    $sentencia->bindParam('rol', $rol);
    $sentencia->bindParam('password', $password_hashed);
    $sentencia->bindParam('fyh_actualizacion', $fechaHora);
    $sentencia->bindParam('id_usuario', $id_usuario);

    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Se actualizó correctamente";
        $_SESSION['icono'] = 'success';
        header('Location: '.$URL.'/admin/usuarios/');
    } else {
        session_start();
        $_SESSION['mensaje'] = "No se pudo actualizar al usuario";
        $_SESSION['icono'] = 'error';
        header('Location: '.$URL.'/admin/usuarios/update.php?id_usuario='.$id_usuario);
    }

} else {
    session_start();
    $_SESSION['mensaje'] = "Las contraseñas no coinciden";
    $_SESSION['icono'] = 'error';
    header('Location: '.$URL.'/admin/usuarios/update.php?id_usuario='.$id_usuario);
}
