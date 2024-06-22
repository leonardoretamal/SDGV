<?php

// Consulta SQL con INNER JOIN para obtener todos los datos completos de las fichas médicas, usuarios y mascotas con alias
$sql = "SELECT 
            fm.id AS ficha_id,
            fm.mascota_id AS ficha_mascota_id, 
            fm.diagnostico AS ficha_diagnostico, 
            fm.tratamiento AS ficha_tratamiento, 
            fm.fecha AS ficha_fecha, 
            fm.especialista_id AS ficha_especialista_id, 
            fm.fyf_creacion AS ficha_fyf_creacion, 
            fm.fyh_actualizacion AS ficha_fyh_actualizacion, 
            m.id AS mascota_id, 
            m.nombre AS mascota_nombre, 
            m.tipo AS mascota_tipo, 
            m.raza AS mascota_raza, 
            m.edad AS mascota_edad, 
            m.cliente_id AS mascota_cliente_id, 
            m.fyh_creacion AS mascota_fyh_creacion, 
            m.fyh_actualizacion AS mascota_fyh_actualizacion, 
            m.sexo AS mascota_sexo, 
            m.color AS mascota_color, 
            m.peso AS mascota_peso, 
            m.altura AS mascota_altura, 
            m.fecha_nacimiento AS mascota_fecha_nacimiento, 
            u.id AS usuario_id, 
            u.rut AS usuario_rut, 
            u.nombre AS usuario_nombre, 
            u.apellido_paterno AS usuario_apellido_paterno, 
            u.apellido_materno AS usuario_apellido_materno, 
            u.direccion AS usuario_direccion, 
            u.telefono AS usuario_telefono, 
            u.email AS usuario_email, 
            u.rol AS usuario_rol, 
            u.password AS usuario_password, 
            u.fyh_creacion AS usuario_fyh_creacion, 
            u.fyh_actualizacion AS usuario_fyh_actualizacion,
            c.nombre AS cliente_nombre, 
            c.apellido_paterno AS cliente_apellido_paterno,
            c.rut AS cliente_rut
        FROM 
            tb_fichamedica fm
        INNER JOIN 
            tb_mascotas m ON fm.mascota_id = m.id
        INNER JOIN 
            tb_usuarios u ON fm.especialista_id = u.id
        INNER JOIN 
            tb_usuarios c ON m.cliente_id = c.id";

$query = $pdo->prepare($sql);
$query->execute();

// Obtener todas las fichas médicas con información completa de mascotas y clientes como un array asociativo
$items = $query->fetchAll(PDO::FETCH_ASSOC);