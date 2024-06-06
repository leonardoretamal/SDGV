<?php

$sql = "SELECT * FROM tb_mascota WHERE id = '$id' "; //reconoce al id porque esta importado en la pagina show.
$query = $pdo->prepare($sql); //pdo sale de la conexion de la base de datos
$query->execute();

$items = $query->fetchAll(PDO::FETCH_ASSOC); //la consulta la pasamos a un array

foreach ($items as $item){
    $nombre = $item['nombre'];
    $tipo = $item['tipo'];
    $raza = $item['raza'];
    $edad = $item['edad'];
    $cliente_id = $item['cliente_id'];
    $fyh_creacion = $item['fyh_creacion'];
    $fyh_actualizacion = $item['fyh_actualizacion'];
}