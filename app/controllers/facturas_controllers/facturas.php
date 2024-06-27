<?php

// La consulta SQL con INNER JOIN para unir las tablas tb_facturas y tb_usuarios con alias "cliente"
$sql = "SELECT 
            tb_facturas.*, 
            tb_usuarios.id AS cliente_id, 
            tb_usuarios.nombre AS cliente_nombre, 
            tb_usuarios.apellido_paterno AS cliente_apellido, 
            tb_usuarios.direccion AS cliente_direccion,
            tb_usuarios.telefono AS cliente_telefono,
            tb_usuarios.email AS cliente_email,
            tb_usuarios.rut AS cliente_rut,
            tb_usuarios.fyh_creacion AS cliente_fyh_creacion,
            tb_usuarios.fyh_actualizacion AS cliente_fyh_actualizacion
        FROM tb_facturas
        INNER JOIN tb_usuarios ON tb_facturas.cliente_id = tb_usuarios.id";

$query = $pdo->prepare($sql); // PDO sale de la conexión de la base de datos
$query->execute();

$items = $query->fetchAll(PDO::FETCH_ASSOC); // La consulta se pasa a un array