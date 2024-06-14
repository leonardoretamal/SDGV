<?php

$sql = "SELECT tb_fichamedica.*, tb_mascotas.* 
FROM tb_fichamedica
INNER JOIN tb_mascotas ON tb_fichamedica.mascota_id = tb_mascotas.id
WHERE tb_fichamedica.id = :id";

$query = $pdo->prepare($sql); //pdo sale de la conexion de la base de datos
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();
$items = $query->fetchAll(PDO::FETCH_ASSOC); //la consulta la pasamos a un array

foreach ($items as $item) {
    $ficha_id = $id;
    $mascota_id = $item['mascota_id'];
    $diagnostico = $item['diagnostico'];
    $tratamiento = $item['tratamiento'];
    $fecha = $item['fecha'];
    $especialista_id = $item['especialista_id'];
    $fyf_creacion = $item['fyf_creacion'];


    $mascota_id = $item['mascota_id'];
    $mascota_nombre = $item['nombre'];
    $mascota_tipo = $item['tipo'];
    $mascota_raza = $item['raza'];
    $mascota_edad = $item['edad'];
    $mascota_sexo = $item['sexo'];
    $mascota_color = $item['color'];
    $mascota_peso = $item['peso'];
    $mascota_altura = $item['altura'];
    $mascota_fecha_nacimiento = $item['fecha_nacimiento'];
    $mascota_fyh_creacion = $item['fyh_creacion'];
    $mascota_fyh_actualizacion = $item['fyh_actualizacion'];

}

$sql2 = "SELECT tb_fichamedica.* , tb_usuarios.*
FROM tb_fichamedica
INNER JOIN tb_usuarios ON tb_fichamedica.especialista_id = tb_usuarios.id
WHERE tb_fichamedica.id = :id";

$query2 = $pdo->prepare($sql2); //pdo sale de la conexion de la base de datos
$query2 ->bindParam(':id', $id, PDO::PARAM_INT);
$query2->execute();
$items2 = $query2->fetchAll(PDO::FETCH_ASSOC);

foreach ($items2 as $i) {

    $cliente_nombre = $i['nombre'];
    $cliente_apellido_paterno = $i['apellido_paterno'];

}