<?php
$sql = "SELECT * FROM inventario";
$query = $pdo->prepare($sql); //pdo sale de la conexion de la base de datos
$query->execute();

$items = $query->fetchAll(PDO::FETCH_ASSOC); //la consulta la pasamos a un array


