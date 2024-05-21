<?php

$sql = "SELECT * FROM tb_usuarios WHERE id_usuario = '$id_usuario' "; //reconoce al id porque esta importado en la pagina show.
$query = $pdo->prepare($sql); //pdo sale de la conexion de la base de datos
$query->execute();

$usuarios = $query->fetchAll(PDO::FETCH_ASSOC); //la consulta la pasamos a un array

foreach ($usuarios as $usuario){
    $nombre_completo = $usuario['nombre_completo'];
    $email = $usuario['email'];
    $cargo = $usuario['cargo'];

}

//consulta que nos trae el listado de usuarios a $usuarios