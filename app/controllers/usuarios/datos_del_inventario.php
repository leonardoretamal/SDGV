<?php

$sql = "SELECT * FROM inventario WHERE id_producto = '$id_producto' "; //reconoce al id porque esta importado en la pagina show.
$query = $pdo->prepare($sql); //pdo sale de la conexion de la base de datos
$query->execute();

$items = $query->fetchAll(PDO::FETCH_ASSOC); //la consulta la pasamos a un array

foreach ($items as $item){
    $id_producto = $item['id_producto'];
    $producto = $item['producto'];
    $stock = $item['stock'];

}