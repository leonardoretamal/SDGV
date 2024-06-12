<?php

$sql = "SELECT * FROM tb_suministros WHERE id = '$id' "; //reconoce al id porque esta importado en la pagina show.
$query = $pdo->prepare($sql); //pdo sale de la conexion de la base de datos
$query->execute();

$items = $query->fetchAll(PDO::FETCH_ASSOC); //la consulta la pasamos a un array

foreach ($items as $item){
    $descripcion = $item['descripcion'];
    $nombre = $item['nombre'];
    $stock = $item['stock'];
    $codigo = $item['codigo'];
    $fyh_creacion = $item['fyh_creacion'];
    $fyh_actualizacion = $item['fyh_actualizacion'];

}