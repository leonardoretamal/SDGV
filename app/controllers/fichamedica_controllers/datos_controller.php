<?php

// Consulta SQL que une las tablas tb_fichamedica, tb_mascotas y tb_usuarios
$sql = "
SELECT 
    fm.*, 
    m.nombre AS mascota_nombre, 
    m.tipo AS mascota_tipo, 
    m.raza AS mascota_raza, 
    m.edad AS mascota_edad, 
    m.sexo AS mascota_sexo, 
    m.color AS mascota_color, 
    m.peso AS mascota_peso, 
    m.altura AS mascota_altura, 
    m.fecha_nacimiento AS mascota_fecha_nacimiento, 
    m.fyh_creacion AS mascota_fyh_creacion, 
    m.fyh_actualizacion AS mascota_fyh_actualizacion,
    u.nombre AS especialista_nombre,
    u.apellido_paterno AS especialista_apellido_paterno,
    u.apellido_materno AS especialista_apellido_materno,
    u.direccion AS especialista_direccion,
    u.telefono AS especialista_telefono,
    u.email AS especialista_email,
    u.rol AS especialista_rol,
    u.fyh_creacion AS especialista_fyh_creacion,
    u.fyh_actualizacion AS especialista_fyh_actualizacion
FROM 
    tb_fichamedica fm
INNER JOIN 
    tb_mascotas m ON fm.mascota_id = m.id
INNER JOIN 
    tb_usuarios u ON fm.especialista_id = u.id
WHERE 
    fm.id = :id
";

$query = $pdo->prepare($sql);
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();
$items = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($items as $item) {
    $ficha_id = $item['id'];
    $mascota_id = $item['mascota_id'];
    $diagnostico = $item['diagnostico'];
    $tratamiento = $item['tratamiento'];
    $fecha = $item['fecha'];
    $especialista_id = $item['especialista_id'];
    $fyf_creacion = $item['fyf_creacion'];
    
    // Datos de la mascota
    $mascota_nombre = $item['mascota_nombre'];
    $mascota_tipo = $item['mascota_tipo'];
    $mascota_raza = $item['mascota_raza'];
    $mascota_edad = $item['mascota_edad'];
    $mascota_sexo = $item['mascota_sexo'];
    $mascota_color = $item['mascota_color'];
    $mascota_peso = $item['mascota_peso'];
    $mascota_altura = $item['mascota_altura'];
    $mascota_fecha_nacimiento = $item['mascota_fecha_nacimiento'];
    $mascota_fyh_creacion = $item['mascota_fyh_creacion'];
    $mascota_fyh_actualizacion = $item['mascota_fyh_actualizacion'];
    
    // Datos del especialista
    $especialista_nombre = ucfirst($item['especialista_nombre']);
    $especialista_apellido_paterno = ucfirst($item['especialista_apellido_paterno']);
    $especialista_apellido_materno = ucfirst($item['especialista_apellido_materno']);
    $especialista_direccion = $item['especialista_direccion'];
    $especialista_telefono = $item['especialista_telefono'];
    $especialista_email = $item['especialista_email'];
    $especialista_rol = $item['especialista_rol'];
    $especialista_fyh_creacion = $item['especialista_fyh_creacion'];
    $especialista_fyh_actualizacion = $item['especialista_fyh_actualizacion'];
}
