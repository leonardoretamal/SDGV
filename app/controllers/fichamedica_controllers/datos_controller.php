<?php


$sql = "SELECT * FROM tb_fichamedica";
$query = $pdo->prepare($sql); //pdo sale de la conexion de la base de datos
$query->execute();

$items = $query->fetchAll(PDO::FETCH_ASSOC); //la consulta la pasamos a un array

foreach ($items as $item) {
    $id = $item['id'];
    $mascota_id = $item['mascota_id'];
    $diagnostico = $item['diagnostico'];
    $tratamiento = $item['tratamiento'];
    $fecha = $item['fecha'];
    $especialista_id = $item['especialista_id'];
    $fyf_creacion = $item['fyf_creacion'];
}
//consulta que nos trae el listado de fichamedica a $items
