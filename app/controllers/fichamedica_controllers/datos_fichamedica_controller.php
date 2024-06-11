<?php


$sql = "SELECT * FROM tb_fichamedica where mascota_id = '$id' ";
$query = $pdo->prepare($sql); //pdo sale de la conexion de la base de datos
$query->execute();

$items = $query->fetchAll(PDO::FETCH_ASSOC); //la consulta la pasamos a un array

//consulta que nos trae el listado de fichamedica a $items
