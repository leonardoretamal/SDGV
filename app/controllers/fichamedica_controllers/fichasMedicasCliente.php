<?php

$id_usuario = isset($_SESSION['id']) ? $_SESSION['id'] : 'No se encontraron datos';

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
            e.id AS especialista_id, 
            e.rut AS especialista_rut, 
            e.nombre AS especialista_nombre, 
            e.apellido_paterno AS especialista_apellido_paterno, 
            e.apellido_materno AS especialista_apellido_materno, 
            e.direccion AS especialista_direccion, 
            e.telefono AS especialista_telefono, 
            e.email AS especialista_email, 
            e.rol AS especialista_rol, 
            e.password AS especialista_password, 
            e.fyh_creacion AS especialista_fyh_creacion, 
            e.fyh_actualizacion AS especialista_fyh_actualizacion,
            c.id AS cliente_id,
            c.nombre AS cliente_nombre, 
            c.apellido_paterno AS cliente_apellido_paterno,
            c.rut AS cliente_rut
        FROM 
            tb_fichamedica fm
        INNER JOIN 
            tb_mascotas m ON fm.mascota_id = m.id
        INNER JOIN 
            tb_usuarios e ON fm.especialista_id = e.id
        INNER JOIN 
            tb_usuarios c ON m.cliente_id = c.id
        WHERE 
            c.id = :id_usuario";

$query = $pdo->prepare($sql);
$query->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
$query->execute();
$fichas_medicas = $query->fetchAll(PDO::FETCH_ASSOC);
