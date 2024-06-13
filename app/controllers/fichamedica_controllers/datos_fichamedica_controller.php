<?php


$sql = "SELECT tb_fichamedica.*, 
               tb_mascotas.nombre AS nombre_mascota,
               tb_mascotas.tipo AS tipo_mascota
        FROM tb_fichamedica
        inner join tb_mascotas on tb_fichamedica.mascota_id = tb_mascotas.id";
        
$query = $pdo->prepare($sql); //pdo sale de la conexion de la base de datos
$query->execute();

$items = $query->fetchAll(PDO::FETCH_ASSOC); //la consulta la pasamos a un array

//consulta que nos trae el listado de fichamedica a $items
foreach ($items as $item) {
    $id = $item['id'];
    $mascota_id = $item['mascota_id'];
    $diagnostico = $item['diagnostico'];
    $tratamiento = $item['tratamiento'];
    $fecha = $item['fecha'];
    $especialista_id = $item['especialista_id'];
    $fyf_creacion = $item['fyf_creacion'];

    $mascota_nombre = $item['nombre_mascota'];
    $mascota_tipo = $item['tipo_mascota'];
}