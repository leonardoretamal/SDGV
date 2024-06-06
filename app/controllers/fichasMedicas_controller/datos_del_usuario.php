<?php

$sql = "SELECT * FROM tb_usuarios WHERE id = '$id_usuario' "; //reconoce al id porque esta importado en la pagina show.
$query = $pdo->prepare($sql); //pdo sale de la conexion de la base de datos
$query->execute();

$usuarios = $query->fetchAll(PDO::FETCH_ASSOC); //la consulta la pasamos a un array

foreach ($usuarios as $usuario){
    $rut = $usuario['rut'];
    $nombre = $usuario['nombre'];
    $apellido_paterno = $usuario['apellido_paterno'];
    $apellido_materno = $usuario['apellido_materno'];
    $direccion = $usuario['direccion'];
    $telefono = $usuario['telefono'];
    $email = $usuario['email'];
    $rol = $usuario['rol'];
}

//consulta que nos trae el listado de usuarios a $usuarios