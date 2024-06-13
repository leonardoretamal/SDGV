<?php

$sql = "SELECT tb_mascotas.*, tb_usuarios.* 
        FROM tb_mascotas
        INNER JOIN tb_usuarios ON tb_mascotas.cliente_id = tb_usuarios.id
        WHERE tb_mascotas.id = :id";

$query = $pdo->prepare($sql);
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();

$items = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($items as $item) {
    $mascota_id = $id;
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
    
    $cliente_id = $item['id']; // ID del cliente
    $cliente_rut = $item['rut'];
    $cliente_nombre = $item['nombre'];
    $cliente_apellido_paterno = $item['apellido_paterno'];
    $cliente_apellido_materno = $item['apellido_materno'];
    $cliente_direccion = $item['direccion'];
    $cliente_telefono = $item['telefono'];
    $cliente_email = $item['email'];
    $cliente_rol = $item['rol'];
    
}

// Ahora puedes usar las variables $mascota_id, $mascota_nombre, $mascota_tipo, $mascota_raza, $mascota_edad, $mascota_sexo, $mascota_color, $mascota_peso, $mascota_altura, $mascota_fecha_nacimiento, 
// $cliente_id, $cliente_rut, $cliente_nombre, $cliente_apellido_paterno, $cliente_apellido_materno, $cliente_direccion, $cliente_telefono, $cliente_email, $cliente_rol, $cliente_fyh_creacion, $cliente_fyh_actualizacion 
// para mostrar los datos en tu página.
