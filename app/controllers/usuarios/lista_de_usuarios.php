<?php

$sql = "SELECT * FROM tb_usuarios";
$query = $pdo->prepare($sql); //pdo sale de la conexion de la base de datos
$query->execute();

$usuarios = $query->fetchAll(PDO::FETCH_ASSOC); //la consulta la pasamos a un array

//consulta que nos trae el listado de usuarios a $usuarios